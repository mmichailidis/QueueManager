@extends('layouts.app')
@section('title' , '| Εταιρίες')
@section('content')

    {{--{{ dd($data, $jobs) }}--}}
    {{--IsOnline, Se poio job einai (apo JobId), CurrentNumber, NumberStatus--}}
    <br><br>
    <h2 style="margin-left:70px;">{{$categoryName}}</h2>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
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
                            Αυτόματη κίνηση της γραμμής
                        </th>
                        <th class="text-center">
                            Αυτόματη συνέχεια χρόνου
                        </th>
                        <th class="text-center">
                            Απαιτείται επαλήθευση
                        </th>
                        <th class="text-center">
                            Πάρε το εισητήριο σου τώρα!
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($companies as $company)
                        <tr id='addr0' data-id="0" >
                            <td data-name="name">
                                {{$company->Name}}
                            </td>
                            <td data-name="mail">
                                {{\App\Service\Translator::forAll($company->AutoProceedActivated)}}
                            </td>
                            <td data-name="desc">
                                {{$company->AutoProceedTime}}
                            </td>
                            <td data-name="sel">
                                {{\App\Service\Translator::forAll($company->VerificationRequired)}}
                            </td>
                            <td data-name="sel">
                                <a href="{{route('company.index' ,[$categoryName , $company->Name] )}}">Πάρε εισητήριο</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection