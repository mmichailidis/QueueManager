@extends('layouts.app')
@section('title' , '| Eπικοινωνία')
@section('content')

    <br>
    <br>
    <br>
    <br>
    <input type="text" id="currentNumber"/>
    <input type="text" id="timer"/>
    <input type="text" id="name"/>
    <input type="button" id="arrived" value="arrived"/>
    <input type="button" id="neverArrived" value="Never Arrived"/>
    <input type="button" id="done" value="done" disabled/>


@endsection

@section('extraScript')
    <script>
        function refreshData(){
            $.ajax({
                '_token': '{{Session::token()}}',
                type: "POST",
                url: "{{ route('employee.getNumber') }}",
                success: function (response) {
                    document.getElementById("currentNumber").value = response['number'];
                    document.getElementById("timer").value = response['timer'];
                    document.getElementById("name").value = response['name'];
                },
                error: function (a, b, c) {
                    console.log('fail');
                }
            });
        }

        window.onload = refreshData();

        document.getElementById("arrived").addEventListener("click", function () {
            document.getElementById("done").removeAttribute("disabled");
            document.getElementById("arrived").disabled = true;
            document.getElementById("neverArrived").disabled = true;
            $.ajax({
                '_token': '{{Session::token()}}',
                type: "POST",
                url: "{{ route('employee.memberArrived') }}",
                success: function (response) {
                    console.log('success');
                },
                error: function (a, b, c) {
                    console.log('fail');
                }
            });
        });

        document.getElementById("done").addEventListener("click", function () {
            document.getElementById("arrived").removeAttribute("disabled");
            document.getElementById("neverArrived").removeAttribute("disabled");
            document.getElementById("done").disabled = true;
            $.ajax({
                '_token': '{{Session::token()}}',
                type: "POST",
                url: "{{ route('employee.workDone') }}",
                success: function (response) {
                    console.log('success');
                    refreshData();
                },
                error: function (a, b, c) {
                    console.log('fail');
                }
            });
        });

        document.getElementById("neverArrived").addEventListener("click", function () {
            var json = {
                "status": "false"
            };

            $.ajax({
                '_token': '{{Session::token()}}',
                type: "POST",
                url: "{{ route('employee.workDone') }}",
                data: json,
                success: function (response) {
                    console.log('success');
                    refreshData();
                },
                error: function (a, b, c) {
                    console.log('fail');
                }
            });
        });

    </script>
@endsection