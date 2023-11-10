@extends('auth.layouts')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Test</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tests.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> <br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tests.update',$test->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name of test subject:</strong>
                    <input type="text" name="subject_name" value="{{ $test->subject_name }}" class="form-control" placeholder="Subject Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date of the test:</strong>
                    <input type="text" name="test_date" value="{{ $test->test_date }}" class="form-control" placeholder="2023-11-08">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Location of the test:</strong>
                    <input type="text" name="location" value="{{ $test->location }}" class="form-control" placeholder="Location">
                </div>
            </div>
            @if ( Auth::user()->permission == 2 && $test->manager == Auth::user()->id )
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Assessment:</strong>
                        <input type="number" name="assessment" value="{{ $test->assessment }}" class="form-control" placeholder="60">
                    </div>
                </div>
                {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Evaluation-based criterion:</strong>
                        <input type="number" name="criterion" value="{{ $test->criterion }}" class="form-control" placeholder="100">
                    </div>
                </div> --}}
            @endif
            @if ( Auth::user()->permission == 1 )
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Responsible manager:</strong>
                        <select name="manager" class="form-control">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $user->id == $test->manager? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
