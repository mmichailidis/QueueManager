@extends('layouts.app')

@section('title', '| Εργαζόμενοι')

{{--@section('content')--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<label>Name:</label> {{ $employee['name'] }}--}}
                {{--<label>Email:</label> {{ $employee['email'] }}--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endsection--}}

@extends('layouts.app')
@section('title' , '| Eργαζόμενοι')
@section('content')

    {{--{{ dd($data, $jobs) }}--}}
    {{--IsOnline, Se poio job einai (apo JobId), CurrentNumber, NumberStatus--}}
    <br><br>
    <h2 style="margin-left:70px;">Εργαζόμενοι</h2>
    {{--<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>--}}
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
                            NumberStatus
                        </th>
                        <th class="text-center">
                            CurrentNumber
                        </th>

                        <th class="text-center">
                            Job
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr id='addr0' data-id="0" >
                            <td data-name="name">
                                {{ $data['name'] }}
                            </td>
                            <td data-name="mail">
                                {{ $data['email'] }}
                            </td>
                            <td data-name="desc">
                                {{$employee->NumberStatus}}
                            </td>
                            <td data-name="sel">
                                {{$employee->CurrentNumber}}
                            </td>
                            <td data-name="sel">
                                {{$jobs[$employee->JobId]->Name}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
