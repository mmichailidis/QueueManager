@extends('layouts.app')
@section('title' , '| Eργαζόμενοι')
@section('content')
    <br><br>
    <h2 style="margin-left:70px;">Εργασίες</h2>
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
                            Απαιτείται επαλήθευση
                        </th>
                        <th class="text-center">
                            Κατάσταση αριθμού
                        </th>
                        <th class="text-center">
                            Τρέχων αριθμός
                        </th>

                        <th class="text-center">
                            Είδος εργασίας
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
                            {{$job->VarificationRequired}}
                        </td>
                        <td data-name="sel">
                            {{$job->TypeOfJob}}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection