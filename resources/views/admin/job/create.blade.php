@extends('layouts.app')

@section('title', '| Δημιουργία νέας εργασίας')

@section('content')
    <br><br>
    <h2 style="margin-left:70px;">Δημιουργία νέας εργασίας</h2>
    <div class="container text-center">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 center">
                <div class="jumbotron">
                    <div class="col-md-6 col-xs-push-3 center" id="formTemplJump">
                        <br>
                        {!! Form::open(['route' => 'admin.job.store']) !!}
                        <br>
                        {{ Form::label('Name', '\'Oνομα: ') }}
                        {{ Form::text('Νame', null, ['class' => 'form-control']) }}
                        <br> <br>
                        {{ Form::label('IsByName', 'Χρειάζεται Επαλήθευση;  ') }}
                        <select name="IsByName" title="IsByName" class="form-control">
                            <option value="1">Ναι</option>
                            <option value="0">Οχι</option>
                        </select>
                        <br> <br>
                        {{ Form::label('TypeOfJob', 'Τρόπος Εξυπηρέτησης: ') }}
                        <select name="TypeOfJob" title="TypeOfJobs" class="form-control">
                            <option value="1">Ηλεκτρονική Βοήθεια</option>
                            <option value="2">Προσωπική Διεπαφή</option>
                        </select>
                        <br> <br>
                        {{ Form::submit('Δημιουργία', ['class' => 'btn btn-block btn-success']) }}
                        {!! Form::close() !!}
                        <a href="{{ route('admin.job.index') }}" class="btn btn-block btn-danger" style="margin-top: 10px;"><span class="glyphicon glyphicon-arrow-left"> Πίσω</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection