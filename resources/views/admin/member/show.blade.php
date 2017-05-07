{{--
{{ $member['name'] }}
{{ $member['email'] }}
{{ $member['TotalReservations'] }}
{{ $member['UnattendedReservations'] }}
--}}

@extends('layouts.app')
@section('title' , '| Προφίλ Πελάτη')
@section('content')
    <br><br>
    <h2 style="margin-left:70px;">Προφίλ Πελάτη</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-9" style="margin-bottom: 10px">
                <a href="{{ route('admin.member.index') }}" class="btn btn-block btn-primary"><span class="glyphicon glyphicon-arrow-left"> Πίσω</span></a>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12 table-responsive">
                <table class="table table-bordered table-hover table-sortable" id="tab_logic">
                    <thead>
                    <tr>
                        <th class="text-center">
                            Όνομα
                        </th>
                        <th class="text-center">
                            E-mail
                        </th>
                        <th class="text-center">
                            Συνολικές κρατήσεις
                        </th>
                        <th class="text-center">
                            Ακυρωμένες Κρατήσεις
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr id='addr0' data-id="0" >
                        <td data-name="name">
                            {{ $member['name'] }}
                        </td>
                        <td data-name="mail">
                            {{ $member['email'] }}
                        </td>
                        <td data-name="desc">
                            {{ $member['TotalReservations'] }}
                        </td>
                        <td data-name="sel">
                            {{ $member['UnattendedReservations'] }}
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-4">
                                    {!! Form::open(['route' => ['admin.member.destroy', $member['MemberId']], 'method' => 'DELETE']) !!}
                                        {{ Form::submit('Διαγραφη', ['class' => 'btn btn-danger btn-block']) }}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection