@extends('auth.layouts')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Test List</h2>
            </div>
            @if ( Auth::user()->permission == 3 )
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('tests.create') }}"> Create New test</a>
                </div>
            @endif
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name of test subject</th>
            <th>Date of the test</th>
            <th>Location of the test</th>
            <th>Assessment</th>
            <th>Evaluation-based criterion</th>
            <th>Responsible manager</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($tests as $test)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $test->subject_name }}</td>
            <td>{{ $test->test_date }}</td>
            <td>{{ $test->location }}</td>
            <td>{{ $test->assessment > 0 ? $test->assessment : '' }}</td>
            <td>
                @if ( $test->assessment >= 100  )
                    500
                @elseif ( $test->assessment >= 91  )
                    300
                @elseif ( $test->assessment >= 80  )
                    200
                @elseif ( $test->assessment >= 60  )
                    100
                @endif
            </td>
            <td>
                @foreach ($users as $user)
                    @if ( $user->id == $test->manager )
                        {{ $user->name }}
                    @endif
                @endforeach
            </td>
            <td>
                <form action="{{ route('tests.destroy',$test->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('tests.show',$test->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('tests.edit',$test->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $tests->links() !!}

@endsection
