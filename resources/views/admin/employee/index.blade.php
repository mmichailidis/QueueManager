@extends('layouts.app')
@section('title' , '| Eργαζόμενοι')
@section('content')

{{--{{ dd($data, $jobs) }}--}}
{{--IsOnline, Se poio job einai (apo JobId), CurrentNumber, NumberStatus--}}
<br><br>
<h2 style="margin-left:70px;">Εργαζόμενοι</h2>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-3 col-md-offset-9" style="margin-bottom: 10px">
            <a href="{{ route('admin.employee.create') }}" class="btn btn-block btn-success">
                <span style="font-family: 'Open Sans', sans-serif;">Δημιουργία Νέου Εργαζομένου</span></a>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-12 table-responsive">
            <table class="table table-bordered table-hover table-sortable" id="tab_logic">
                <thead>
                <tr>
                    <th class="text-center">
                        Κατάσταση
                    </th>
                    <th class="text-center">
                        Θέση εργασίας
                    </th>
                    <th class="text-center">
                        Τρέχων αριθμός εξυπηρέτησης
                    </th>
                    <th class="text-center">
                        Κατάσταση αριθμού
                    </th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach( $data as $single)
                    <tr id='addr0' data-id="0" >
                        <td data-name="name">
                            @if(($single['Employee']->IsOnline) == 1)
                                <div class="led-green"></div>
                            @else
                                <div class="led-red"></div>
                            @endif
                        </td>
                        <td data-name="mail">
                            {{$jobs[$single['Employee']->JobId]->Name}}
                        </td>
                        <td data-name="desc">
                            {{$single['Employee']->CurrentNumber}}
                        </td>
                        <td data-name="sel">
                            {{$single['Employee']->NumberStatus}}
                        </td>
                        <td>
                            <a href="{{ route('admin.employee.show', $single['Employee']->Id) }}"><span class="glyphicon glyphicon-user"></span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('extraScript')
    <script>
        $(function() {
            $(".locked").keydown(false);
        })
    </script>
@endsection