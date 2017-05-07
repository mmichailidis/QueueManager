@extends('layouts.app')
@section('title' , '| Eργαζόμενοι')
@section('content')

    {{--{{ dd($data, $jobs) }}--}}
    {{--IsOnline, Se poio job einai (apo JobId), CurrentNumber, NumberStatus--}}
    <br><br>
    <h2 style="margin-left:70px;">Εργαζόμενοι</h2>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 table-responsive">
                <table class="table table-bordered table-hover table-sortable" id="tab_logic">
                    <thead>
                    <tr>
                        <th class="text-center">
                            Θέση εργασίας
                        </th>
                        <th class="text-center">
                            Απαιτείται επαλήθευση
                        </th>
                        <th class="text-center">
                            Τρεχούμενος αριθμός εξυπηρέτησης
                        </th>
                        <th class="text-center">
                            Έιδος εργασίας
                        </th>
                        <th class="text-center">
                            Μέσος χρόνος αναμονής
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($jobs as $job)
                        <tr id='addr0' data-id="0" >
                            <td data-name="name">
                                {{$job->Name}}
                            </td>
                            <td data-name="mail">
                                {{\App\Service\Translator::forAll($job->IsByName)}}
                            </td>
                            <td data-name="desc">
                                {{$job->LastNumber}}
                            </td>
                            <td data-name="sel">
                                {{$job->TypeOfJob}}
                            </td>
                            <td data-name="sel">
                                {{$job->AverageWaitingTime}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
