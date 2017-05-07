@extends('layouts.app')
@section('title' , '| Στοιχεία Eργαζομένου')
@section('content')

    {{--{{ dd($data, $jobs) }}--}}
    {{--IsOnline, Se poio job einai (apo JobId), CurrentNumber, NumberStatus--}}
    <br><br>
    <h2 style="margin-left:70px;">Στοιχεία Eργαζομένου</h2>
    {{--<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>--}}
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-9" style="margin-bottom: 10px">
                <a href="{{ route('admin.employee.index') }}" class="btn btn-block btn-primary"><span class="glyphicon glyphicon-arrow-left"> Πίσω</span></a>
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
                            Κατάσταση αριθμού
                        </th>
                        <th class="text-center">
                            Τρέχων αριθμός εξυπηρέτησης
                        </th>

                        <th class="text-center">
                            Θέση Εργασίας
                        </th>
                        <th></th>
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
                            <td>
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-4">
                                        {!! Form::open(['route' => ['admin.employee.destroy', $employee->Id], 'method' => 'DELETE']) !!}
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
