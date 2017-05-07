@extends('layouts.app')
@section('title' , '| Eργαζόμενοι')
@section('content')
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 table-responsive">
                <table class="table table-bordered table-hover table-sortable" id="tab_logic">
                    <thead>
                    <tr>
                        <th class="text-center">
                            Νούμερο
                        </th>
                        <th class="text-center">
                            Ώρα
                        </th>
                        <th class="text-center">
                            Μέσος χρόνος αναμονής
                        </th>
                        <th class="text-center">
                            Αριθμός που εξυπηρετήτε τώρα
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td data-name="Number">
                            {{$ticket->Number}}
                        </td>
                        <td data-name="Time">
                            {{\App\Service\TimeConverter::fromUnix($ticket->Time)}}
                        </td>
                        <td data-name="Go">
                            {{$jobAverageTime}}
                        </td>
                        <td data-name="Del">
                            {{$jobCurrentNumber}}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

