@extends('layouts.app')
@section('title' , '| Eργαζόμενοι')
@section('content')
    <br><br>
    <div><br><br></div>

    <div class="row">
        <div class="col-md-6" style="margin-left: 40%">
            <img src="{{ asset("images/sorry.gif") }}" class="img-responsive" alt="Emoji"/>
            <div class="card-info"><h2 class="card-title">Συγνώμη . . .</h2></div>
            <br><br>

        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Το νούμερο που ζητάτε δεν υπάρχει ή δεν έχετε άδεια να βγάλετε νούμερο!</h2>
        </div>
    </div>

@endsection

