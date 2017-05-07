{{--
{{ $member['name'] }}
{{ $member['email'] }}
{{ $member['TotalReservations'] }}
{{ $member['UnattendedReservations'] }}
--}}

@extends('layouts.app')
@section('title' , '| Eργαζόμενοι')
@section('content')
    <br><br>
    <h2 style="margin-left:70px;">Μέλη</h2>
    <div class="container">
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
                            Κρατήσεις που δεν υπάρχε εμφάνιση
                        </th>
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
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection