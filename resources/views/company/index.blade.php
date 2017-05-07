@extends('layouts.app')
@section('title' , '| Eργαζόμενοι')
@section('content')

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
                            Όνομα εταιρίας
                        </th>
                        <th class="text-center">
                            Αυτόματη συνέχεια γραμμής
                        </th>
                        <th class="text-center">
                            Τρεχούμενος αριθμός εξυπηρέτησης
                        </th>
                        <th class="text-center">
                            Απαιτήτε έλενχος
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr id='addr0' data-id="0">
                        <td data-name="name">
                            {{$company->Name}}
                        </td>
                        <td data-name="desc">
                            {{$company->AutoProceedActivated}}
                        </td>
                        <td data-name="sel">
                            {{$company->AutoProceedTime}}
                        </td>
                        <td data-name="sel">
                            {{\App\Service\Translator::forAll($company->VerificationRequired)}}
                        </td>
                    </tr>

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