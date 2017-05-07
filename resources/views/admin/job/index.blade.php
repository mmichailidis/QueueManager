@extends('layouts.app')
@section('title' , '| Eργασίες')
@section('content')

    {{--{{ dd($data, $jobs) }}--}}
    {{--IsOnline, Se poio job einai (apo JobId), CurrentNumber, NumberStatus--}}
    <br><br>
    <h2 style="margin-left:70px;">Εργασίες</h2>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <div class="container">
        <div class="col-md-3 col-md-offset-9" style="margin-bottom: 10px;">
            <a href="{{ route('admin.job.create') }}" class="btn btn-block btn-success">
                <span style="font-family: 'Open Sans', sans-serif;">Δημιουργία Νέας Θέσης Εργασίας</span></a>
        </div>
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
                            Τρέχων αριθμός εξυπηρέτησης
                        </th>
                        <th class="text-center">
                            Έιδος εργασίας
                        </th>
                        <th class="text-center">
                            Μέσος χρόνος αναμονής
                        </th>
                        <th></th>
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
                                {{\App\Service\ToS::translateToGreek($job->TypeOfJob)}}
                            </td>
                            <td data-name="sel">
                                {{$job->AverageWaitingTime}}
                            </td>
                            <td>
                                <a href="{{ route('admin.job.show', $job->Id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-user"></span></a>
                                <a href="{{ route('admin.job.edit', $job->Id) }}" class="btn btn-success btn-xs" style="margin-bottom: -15px;"><span class="glyphicon glyphicon-edit"></span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
