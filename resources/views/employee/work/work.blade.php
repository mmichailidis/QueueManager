@extends('layouts.app')
@section('title' , '| Eπικοινωνία')
@section('content')

    <br><br>
    <h2 style="margin-left:70px;">'Ωρα για δουλειά!</h2>
    <div class="container text-center">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 center">
                <div class="jumbotron">
                    <div class="col-md-6 col-xs-push-3 center" id="formTemplJump">

                        <br><br>
                        <input type="text" id="currentNumber" class="form-control input-lg"/>

                        <br>
                        <input type="text" id="timer" class="form-control input-lg"/>
                        <br>
                        <input type="text" id="name" class="form-control input-lg"/>
                        <br><br>
                        <div>
                            <input type=button class="btn btn-primary" id="arrived" value="arrived"/>
                            <input type="button" class="btn btn-primary" id="neverArrived" value="Never Arrived"/>
                            <input type="button" class="btn btn-primary" id="done" value="done" disabled/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection

@section('extraScript')
    <script>
        function refreshData() {
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