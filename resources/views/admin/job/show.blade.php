@extends('layouts.app')
@section('title' , '| Eργασία Εργαζομένου')
@section('content')
    <br><br>
    <h2 style="margin-left:70px;">Eργασία Εργαζομένου</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-9" style="margin-bottom: 10px">
                <a href="{{ route('admin.job.index') }}" class="btn btn-block btn-primary"><span class="glyphicon glyphicon-arrow-left"> Πίσω</span></a>
            </div>
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
                    </tr>
                    </thead>
                    <tbody>
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
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection