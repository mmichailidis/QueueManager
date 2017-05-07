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

                    {!! Form::model($job, ['route' => ['admin.job.update', $job->Id], 'method' => 'PUT']) !!}

                    {{ Form::label('Name', 'Όνομα:') }}
                    {{ Form::text('Name', null, ["class" => 'form-control input-lg']) }}
                    <br>
                    {{ Form::label('IsByName', 'IsByName:') }}
                    {{ Form::text('IsByName', null, ["class" => 'form-control input-lg']) }}
                    <br>
                    {{ Form::label('LastNumber', 'Τελευταίος αριθμός:') }}
                    {{ Form::text('LastNumber', null, ["class" => 'form-control input-lg']) }}
                    <br>
                    {{ Form::label('TypeOfJob', 'Είδος εργασίας:') }}
                    {{ Form::text('TypeOfJob', null, ["class" => 'form-control input-lg']) }}
                    <br>
                    {{ Form::label('AverageWaitingTime', 'Μέσος αριθμός αναμονής:') }}
                    {{ Form::text('AverageWaitingTime', null, ["class" => 'form-control input-lg']) }}
                    <br>
                    {{ Form::submit('Αποθήκευση', ['class' => 'btn btn-success btn-block']) }}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
{{--=======

{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}

{!! Form::close() !!}
>>>>>>> 068de03a21dd60c1c8f346188a480b9c6e389338--}}
