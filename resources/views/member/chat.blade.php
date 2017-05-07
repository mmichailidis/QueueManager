@extends('layouts.app')
@section('title' , '| Chat')
@section('content')



    <input type="text" id="message">
    <input type="button" id="post" value="Send"/>
    <input type="button" id="getOut" value="Logout"/>


    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="panel panel-primary">
                    <div class="panel-heading" id="accordion">
                        <span class="glyphicon glyphicon-comment"></span> Chat
                        <div class="btn-group pull-right">
                            <a type="button" class="btn btn-default btn-xs" data-toggle="collapse"
                               data-parent="#accordion" href="#collapseOne">
                                <span class="glyphicon glyphicon-chevron-down"></span>
                            </a>
                        </div>
                    </div>
                    <div class="panel-collapse collapse" id="collapseOne">
                        <div class="panel-body">

                            {{--MIX--}}
                            <div class="form-group">
                                <label for="comment">ChatRoom:</label>
                                <textarea class="form-control" rows="10" cols="1" id="chatRoom"></textarea>
                            </div>

                        </div>
                        <div class="panel-footer">
                            <div class="input-group">
                                <!--MIX-->
                                <input type="text" id="message">
                                <input type="button" id="post" value="Send"/>
                                <input type="button" id="getOut" value="Logout"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection

@section('extraScript')
    <script>
        $(function () {
            $(".chatRoom").keydown(false);
        });

        window.onload = function () {
            var json = {
                "clean": true
            };

            $.ajax({
                '_token': '{{Session::token()}}',
                type: "GET",
                data: json,
                url: "{{ route('member.chat.feed') }}",
                success: function (response) {
                    var data = response['data'];
                    var memberName = response['memberName'];
                    var employeeName = response['employeeName'];
                    data.forEach(function (line) {
                        appendToChatRoom(line['Body'], line['From'] === "member" ? memberName : employeeName);
                    });
                    console.log("login success");
                },
                error: function (a, b, c) {
                    console.log('fail');
                }
            });
        };

        document.getElementById("post").addEventListener("click", function () {
            var json = {
                "body": document.getElementById("message").value
            };

            $.ajax({
                '_token': '{{Session::token()}}',
                type: "POST",
                url: "{{ route('member.chat.post') }}",
                data: json,
                success: function (response) {
                    appendToChatRoom(document.getElementById("message").value,  '{{\App\Http\Controllers\Member\MemberHelper::myName()}}');
                    document.getElementById("message").value = "";
                    console.log("post success");
                },
                error: function (a, b, c) {
                    console.log('fail');
                }
            });
        });

        document.getElementById("getOut").addEventListener("click", function () {
            $.ajax({
                '_token': '{{Session::token()}}',
                type: "DELETE",
                url: "{{ route('member.chat.logout') }}",
                success: function (response) {
                    console.log("post success");
                    window.location.href = "{{route('categories.index')}}";
                },
                error: function (a, b, c) {
                    console.log('fail');
                }
            });
        });

        function updateRoom(isClean) {
            var json = {
                "clean": isClean
            };

            $.ajax({
                '_token': '{{Session::token()}}',
                type: "GET",
                data: json,
                url: "{{ route('member.chat.feed') }}",
                success: function (response) {
                    var data = response['data'];
                    var memberName = response['memberName'];
                    var employeeName = response['employeeName'];
                    data.forEach(function (line) {
                        appendToChatRoom(line['Body'], line['From'] === "member" ? memberName : employeeName);
                    });

                },
                error: function (a, b, c) {
                    console.log('fail');
                }
            });
        }

        function appendToChatRoom(data, sender) {
            document.getElementById("chatRoom").value = document.getElementById("chatRoom").value + "\n" + sender + "\n" + data + "\n";
            textarea = document.getElementById("chatRoom");
            textarea.scrollTop = textarea.scrollHeight;
        }

        function clearChatRoom() {
            document.getElementById("chatRoom").value = "";
        }

        setInterval(updateRoom(false), 1000);
    </script>
@endsection