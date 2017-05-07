@extends('layouts.app')
@section('title' , '| Chat')
@section('content')
    <br><br>

    <div class="form-group">
        <label for="comment">ChatRoom:</label>
        <textarea class="form-control" rows="10" cols="1" id="chatRoom"></textarea>
    </div>

    <input type="text" id="message">
    <input type="button" id="post" value="Send"/>


@endsection

@section('extraScript')
    <script>
        $(function () {
            $(".chatRoom").keydown(false);
        });

        window.onload = updateRoom(true);

        document.getElementById("post").addEventListener("click", function(){
            var json = {
                "body" : document.getElementById("message").value
            };

            $.ajax({
                '_token': '{{Session::token()}}',
                type: "POST",
                url: "{{ route('employee.post') }}",
                data: json,
                success: function (response) {
                    appendToChatRoom(document.getElementById("message").value,'{{\App\Http\Controllers\Employee\EmployeeHelper::getEmployeeInfo()["name"]}}');
                    document.getElementById("message").value = "";
                    console.log("post success");
                },
                error: function (a, b, c) {
                    console.log('fail');
                }
            });
        });

        function updateRoom(isClean){
            var json = {
                "clean" : isClean
            };

            $.ajax({
                '_token': '{{Session::token()}}',
                type: "GET",
                data: json,
                url: "{{ route('employee.getChat') }}",
                success: function (response) {
                    var data = response['data'];
                    var memberName = response['memberName'];
                    var employeeName = response['employeeName'];
                    data.forEach(function(line) {
                        appendToChatRoom(line['Body'], line['From'] === "member" ? memberName : employeeName);
                    });

                },
                error: function (a, b, c) {
                    console.log('fail');
                }
            });
        }

        function appendToChatRoom(data,sender){
            document.getElementById("chatRoom").value =  document.getElementById("chatRoom").value + "\n" + sender + "\n" + data + "\n";
            textarea = document.getElementById("chatRoom");
            textarea.scrollTop = textarea.scrollHeight;
        }

        function clearChatRoom(){
            document.getElementById("chatRoom").value = "";
        }

        setInterval(updateRoom(false),1000);
    </script>
@endsection