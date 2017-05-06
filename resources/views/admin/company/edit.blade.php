{!! Form::model($company, ['route' => ['admin.update', $company->Id], 'method' => 'PUT']) !!}

{{ Form::label('Name', 'Name:') }}
{{ Form::text('Name', null, ["class" => 'form-control input-lg']) }}

{{ Form::label('AutoProceedActivated', 'AutoProceedActivated:') }}
{{ Form::text('AutoProceedActivated', null, ["class" => 'form-control input-lg']) }}

{{ Form::label('AutoProceedTime', 'AutoProceedTime:') }}
{{ Form::text('AutoProceedTime', null, ["class" => 'form-control input-lg']) }}

{{ Form::label('VerificationRequired', 'VerificationRequired:') }}
{{ Form::text('VerificationRequired', null, ["class" => 'form-control input-lg']) }}

{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}

{!! Form::close() !!}