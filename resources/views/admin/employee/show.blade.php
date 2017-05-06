@extends('layouts.app')

@section('title', '| Εργαζόμενοι')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <label>Name:</label> {{ $employee['name'] }}
                <label>Email:</label> {{ $employee['email'] }}
            </div>
        </div>
    </div>
@endsection