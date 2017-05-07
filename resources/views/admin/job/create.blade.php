{!! Form::open(['route' => 'admin.job.store']) !!}
    {{ Form::label('Name', '\'Oνομα: ') }}
    {{ Form::text('Name', null, ['class' => 'kati']) }}

    {{ Form::label('IsByName', 'Χρειάζεται Επαλήθευση?: ') }}
    <select name="IsByName" title="IsByName" class="">
        <option value="1">Ναι</option>
        <option value="0">Οχι</option>
    </select>

    {{ Form::label('TypeOfJob', 'Τρόπος Εξυπηρέτησης: ') }}
    <select name="TypeOfJob" title="TypeOfJobs" class="">
        <option value="1">Τσατ</option>
        <option value="2">Προσωπική Διεπαφή</option>
    </select>

    {{ Form::submit('Δημιουργία', ['class' => 'kati']) }}
{!! Form::close() !!}