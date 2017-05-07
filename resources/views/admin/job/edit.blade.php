{!! Form::model($job, ['route' => ['admin.job.update', $job->Id], 'method' => 'PUT']) !!}

{{ Form::label('Name', 'Name:') }}
{{ Form::text('Name', null, ["class" => 'form-control input-lg']) }}

{{ Form::label('IsByName', 'IsByName:') }}
{{ Form::text('IsByName', null, ["class" => 'form-control input-lg']) }}

{{ Form::label('TypeOfJob', 'TypeOfJob:') }}
{{ Form::text('TypeOfJob', null, ["class" => 'form-control input-lg']) }}

{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}

{!! Form::close() !!}