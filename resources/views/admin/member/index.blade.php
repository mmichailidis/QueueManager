@extends('layouts.app')
@section('title' , '| Επικυρωμένοι Πελάτες')
@section('content')

    {{--{{ dd($data, $jobs) }}--}}
    {{--IsOnline, Se poio job einai (apo JobId), CurrentNumber, NumberStatus--}}
    <br><br>
    <h2 style="margin-left:70px;">Επικυρωμένοι Πελάτες</h2>
    <div class="container">
        <div class="col-md-3 col-md-offset-9" style="margin-bottom: 10px">
            <a href="{{ route('admin.member.create') }}" class="btn btn-block btn-warning"><span>Δημιουργία Νέου Πελάτη</span></a>
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
                    @foreach($members as $member)
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
                                <a href="{{ route('admin.member.show', $member['MemberId']) }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-user"></span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection