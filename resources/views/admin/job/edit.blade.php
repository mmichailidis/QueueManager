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

                    {{ Form::label('Name', 'Θέση εργασίας:') }}
                    {{ Form::text('Name', null, ["class" => 'form-control input-lg']) }}
                    <br>
                    {{ Form::label('IsByName', 'Απαιτείται επαλήθευση:') }}
                    <select name="IsByName" title="IsByName" class="form-control input-lg">
                        <option value="1" {{ $job->IsByName == 0 ? 'selected' : '' }}>Όχι</option>
                        <option value="2" {{ $job->IsByName == 1 ? 'selected' : '' }}>Ναι</option>
                    </select>
                    <br>
                    {{ Form::label('TypeOfJob', 'Είδος εργασίας:') }}
                    <select name="TypeOfJob" title="TypeOfJob" class="form-control input-lg">
                        <option value="1" {{ $job->TypeOfJob == 1 ? 'selected' : '' }}>Προσωπική Διεπαφή</option>
                        <option value="2" {{ $job->TypeOfJob == 2 ? 'selected' : '' }}>Ηλεκτρονική Βοήθεια</option>
                    </select>
                    <br>
                    {{ Form::submit('Αποθήκευση', ['class' => 'btn btn-success btn-block btn-lg']) }}

                    {!! Form::close() !!}
                    <a href="{{ route('admin.job.index') }}" class="btn btn-primary btn-block btn-md" style="margin-top: 10px;"><span class="glyphicon glyphicon-arrow-left">Πίσω</span></a>
                    <div class="row">
                        <div class="col-md-12 center" style="margin-top: 10px;">
                            {!! Form::open(['route' => ['admin.job.destroy', $job->Id], 'method' => 'DELETE']) !!}
                                {{ Form::submit('Διαγραφη', ['class' => 'btn btn-danger btn-block']) }}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

