@extends('auth.layouts')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Test</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tests.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name of test subject:</strong>
                {{ $test->subject_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date of the test:</strong>
                {{ $test->test_date }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Location of the test:</strong>
                {{ $test->location }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Assessment:</strong>
                {{ $test->assessment > 0 ? $test->assessment : '' }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Evaluation-based criterion:</strong>
                @if ( $test->assessment >= 100  )
                    500
                @elseif ( $test->assessment >= 91  )
                    300
                @elseif ( $test->assessment >= 80  )
                    200
                @elseif ( $test->assessment >= 60  )
                    100
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Responsible manager:</strong>
                @foreach ($users as $user)
                    @if ( $user->id == $test->manager )
                        {{ $user->name }}
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
