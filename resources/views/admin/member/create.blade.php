{!! Form::open(['route' => 'admin.member.store']) !!}
    {{ Form::label('MemberId', 'Κωδικός Μέλους: ') }}
    {{ Form::text('MemberId', null, ['class' => 'kati']) }}

    {{ Form::submit('Δημιουργία', ['class' => 'kati']) }}
{!! Form::close() !!}
