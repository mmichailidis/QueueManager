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
                        <br><br><br>
                        {!! Form::open(['route' => 'admin.member.store']) !!}
                        <br>
                        {{ Form::label('MemberId', 'Κωδικός Μέλους: ') }}
                        {{ Form::text('MemberId', null, ['class' => 'kati']) }}
                        <br> <br>
                        <br> <br> <br> <br>
                        {{ Form::submit('Δημιουργία', ['class' => 'btn btn-block btn-success']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection