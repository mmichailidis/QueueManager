@extends('layouts.app')
@section('title' , '| Eργαζόμενοι')
@section('content')

    {{--{{ dd($data, $jobs) }}--}}
    {{--IsOnline, Se poio job einai (apo JobId), CurrentNumber, NumberStatus--}}
    <br><br>
    <h2 style="margin-left:70px;">Το προφίλ μου</h2>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 table-responsive">
                <table class="table table-bordered table-hover table-sortable" id="tab_logic">
                    <thead>
                    <tr>
                        <th class="text-center">
                            Συνολικές κρατήσεις
                        </th>
                        <th class="text-center">
                            Απουσίες από τις κρατησεις
                        </th>
                        <th class="text-center">
                            Όνομα
                        </th>
                        <th class="text-center">
                            Email
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr id='addr0' data-id="0">

                        {{--<td data-name="name">--}}
                        {{--{{$tickets['name']}}--}}
                        {{--</td>--}}
                        <td data-name="mail">
                            {{$member['TotalReservations']}}
                        </td>
                        <td data-name="mail">
                            {{$member['UnattendedReservations']}}
                        </td>
                        <td data-name="mail">
                            {{$name}}
                        </td>
                        <td data-name="mail">
                            {{$email}}
                        </td>

                    </tr>
                    </tbody>
                </table>
                <a href="{{route('member.edit')}}" class="btn btn-success btn-md" style="margin-left: 1026px;">
                    <span class="glyphicon glyphicon-wrench"></span> Επεξεργασία
                </a>

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
                            Προβολή
                        </th>
                        <th class="text-center">
                           Διαγραφή
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tickets as $ticket)
                        <tr>
                            <td data-name="Number">
                                {{$ticket->Number}}
                            </td>
                            <td data-name="Time">
                                {{$ticket->Time}}
                            </td>
                            <td data-name="Go">
                                <a href="{{route('member.ticket.show' , $ticket->Id)}}" class="btn btn-info btn-md">
                                    <span class="glyphicon glyphicon-new-window"></span> Προβολή
                                </a>
                            </td>
                            <td data-name="Del">
                                <a href="{{route('member.ticket.destroy' , $ticket->Id)}}" class="btn btn-info btn-md">
                                    <span class="glyphicon glyphicon-trash"></span> Διαγραφή
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

