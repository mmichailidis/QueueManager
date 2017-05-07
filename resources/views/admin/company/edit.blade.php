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

            {!! Form::model($company, ['route' => ['admin.update', $company->Id], 'method' => 'PUT']) !!}

            {{ Form::label('Name', 'Όνομα:') }}
            {{ Form::text('Name', null, ["class" => 'form-control input-lg']) }}
            <br>
            {{ Form::label('AutoProceedActivated', 'Αυτόματη κίνηση γραμμής:') }}
            {{ Form::text('AutoProceedActivated', null, ["class" => 'form-control input-lg']) }}
            <br>
            {{ Form::label('AutoProceedTime', 'Αυτόματη συνέχεια χρόνου:') }}
            {{ Form::text('AutoProceedTime', null, ["class" => 'form-control input-lg']) }}
            <br>
            {{ Form::label('VerificationRequired', 'Απαιτείται επαλήθευση:') }}
            {{ Form::text('VerificationRequired', null, ["class" => 'form-control input-lg']) }}
            <br>
            {{ Form::submit('Αποθήκευση', ['class' => 'btn btn-primary btn-block']) }}

            {!! Form::close() !!}
            </div>
            </div>
        </div>
    </div>
</div>
@endsection