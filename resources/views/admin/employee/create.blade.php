@extends('layouts.app')

@section('title', '| Δημιουργία Νέου Εργαζομένου')

@section('content')
    <br><br>
    <h2 style="margin-left:70px;">Δημιουργία νέου εργαζόμενου</h2>
    <div class="container text-center">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 center">
                <div class="jumbotron">
                    <div class="col-md-6 col-xs-push-3 center" id="formTemplJump">
                        {!! Form::open(['route' => 'admin.employee.store', 'class' => 'form']) !!}
                        <br>
                        {{ Form::label('name', 'Όνομα: ') }}
                        {{ Form::text('name', null, ['class' => 'form-control input-sm']) }}
                        <br>
                        {{ Form::label('email', 'Email: ') }}
                        {{ Form::text('email', null, ['class' => 'form-control input-sm']) }}
                        <br>
                        {{ Form::label('password', 'Κωδικός πρόσβασης: ') }}
                        {{ Form::password('password', ['class' => 'form-control input-sm']) }}
                        <br>
                        {{ Form::label('JobId', 'Θέση εργασίας: ') }}
                        <select name="JobId" title="JobId" class=" form-control input-sm">
                            @foreach($jobs as $job)
                                <option value="{{ $job->Id }}">{{ $job->Name }}</option>
                            @endforeach
                        </select>
                        <br> <br>
                        {{ Form::submit('Δημιουργία', ['class' => 'btn btn-block btn-success']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
