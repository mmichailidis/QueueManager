@extends('layouts.app')
@section('title' , '| Επεξεργασία στοιχείων')
@section('content')

    <br><br>
    <h2 style="margin-left:70px;">Επεξεργασία στοιχείων</h2>
    <div class="container text-center">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 center">
                <div class="jumbotron">
                    <div class="col-md-6 col-xs-push-3 center" id="formTemplJump">

                        {!! Form::model($member, ['route' => ['member.update'], 'method' => 'PUT']) !!}

                        {{ Form::label('name', 'Όνομα:') }}
                        {{ Form::text('name', $name, ["class" => 'form-control input-lg']) }}
                        <br>
                        {{ Form::label('email', 'Email:') }}
                        {{ Form::text('email', $email, ["class" => 'form-control input-lg']) }}
                        <br>
                        {{ Form::submit('Αποθήκευση', ['class' => 'btn btn-primary btn-block']) }}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
