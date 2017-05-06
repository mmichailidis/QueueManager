@extends('layouts.app')

@section('title', '| Δημιουργία Νέου Εργαζομένου')

@section('content')
    {{--{{ dd($employees, $jobs) }}--}}
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                {!! Form::open(['route' => 'admin.employee.store', 'class' => 'form']) !!}
                    {{ Form::label('name', 'Name: ') }}
                    {{ Form::text('name', null, ['class' => 'form-control input-sm']) }}

                    {{ Form::label('email', 'Email: ') }}
                    {{ Form::text('email', null, ['class' => 'form-control input-sm']) }}

                    {{ Form::label('password', 'Password: ') }}
                    {{ Form::password('password', ['class' => 'form-control input-sm']) }}

                    {{ Form::label('JobId', 'Job: ') }}
                    <select name="JobId" title="JobId" class=" form-control input-sm">
                        @foreach($jobs as $job)
                            <option value="{{ $job->Id }}">{{ $job->Name }}</option>
                        @endforeach
                    </select>

                    {{ Form::submit('Δημιουργία', ['class' => 'btn btn-block btn-success']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
