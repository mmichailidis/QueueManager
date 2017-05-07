@extends('layouts.app')
@section('title' , '| Εταιρία')
@section('content')

    <br><br>
    <h2 style="margin-left:70px;">Εταιρίες</h2>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 table-responsive">
                <table class="table table-bordered table-hover table-sortable" id="tab_logic">
                    <thead>
                    <tr>
                        <th class="text-center">
                            Όνομα Δουλειάς
                        </th>
                        <th class="text-center">
                            Απαιτείται επαλήθευση
                        </th>
                        <th class="text-center">
                            Τελευταίος αριθμός
                        </th>
                        <th class="text-center">
                            Τύπος δουλειάς
                        </th>
                        <th class="text-center">
                            Μέσος χρόνος αναμονής
                        </th>
                        <th class="text-center">

                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($jobs as $job)
                        <tr id='addr0' data-id="0">
                            <td data-name="name">
                                {{$job->Name}}
                            </td>
                            <td data-name="desc">
                                {{\App\Service\Translator::forAll($job->VerificationRequired)}}
                            </td>
                            <td data-name="sel">
                                {{$job->LastNumber}}
                            </td>
                            <td data-name="sel">
                                {{$job->TypeOfJob}}
                            </td>
                            <td data-name="sel">
                                {{$job->AverageWaitingTime}}
                            </td>
                            @if(Auth::check() && App\Http\Controllers\Helpers::isMember())
                                {!! Form::open(['route' => ['member.request.number'], 'method' => 'POST']) !!}
                                <td data-name="sel">
                                    {{ Form::hidden('jobId',$job->Id,[ 'id' => 'jobId'])  }}
                                    {{ Form::submit('Πάρε νούμερο τώρα',  [ 'class'=>"btn btn-default btn-lg active" ] ) }}
                                </td>
                                {!! Form::close() !!}
                            @else
                                <td>
                                    <button title="Για να πάρεις το νούμερο σου θα πρέπει να συνδεθείς" type="button" class="btn btn-default btn-lg" disabled="disabled">Πάρε
                                        νούμερο τώρα
                                    </button>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    <!-- mporoume na baloume kai fwto-->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('extraScript')
    <script>
        $(function () {
            $(".locked").keydown(false);
        })
    </script>
@endsection

{{--show ! {{ dd($company) }}--}}