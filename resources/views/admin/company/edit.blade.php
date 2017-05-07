@extends('layouts.app')
@section('title' , '| Επεξεργασία στοιχείων Εταιρείας')
@section('content')

<br><br>
<h2 style="margin-left:70px;">Επεξεργασία Στοιχείων Εταιρείας</h2>
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
            <select name="AutoProceedActivated" title="AutoProceedActivated" class="form-control input-lg">
                <option value="0" {{ $company->AutoProceedActivated == 0 ? 'selected' : ''}}>Όχι</option>
                <option value="1" {{ $company->AutoProceedActivated == 1 ? 'selected' : ''}}>Ναι</option>
            </select>
            <br>
            {{ Form::label('AutoProceedTime', 'Αυτόματη συνέχεια χρόνου:') }}
            {{ Form::text('AutoProceedTime', null, ["class" => 'form-control input-lg']) }}
            <br>
            {{ Form::label('VerificationRequired', 'Απαιτείται επαλήθευση:') }}
            <select name="AutoProceedActivated" title="AutoProceedActivated" class="form-control input-lg">
                <option value="0" {{ $company->VerificationRequired == 0 ? 'selected' : ''}}>Όχι</option>
                <option value="1" {{ $company->VerificationRequired == 1 ? 'selected' : ''}}>Ναι</option>
            </select>
            <br>
            {{ Form::submit('Αποθήκευση', ['class' => 'btn btn-primary btn-block']) }}

            {!! Form::close() !!}
                <a href="{{ route('admin.show') }}" class="btn btn-block btn-danger" style="margin-top: 10px;"><span class="glyphicon glyphicon-arrow-left"> Πίσω</span></a>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection