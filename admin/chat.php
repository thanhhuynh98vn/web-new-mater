<?php

?>
<html>
    <head>
        <title>Chat</title>
        <link rel="stylesheet" type="text/css" href="../templates/public/css/chat.css">
        <script src="../libaries/jquery-3.1.1.min.js"></script>
        <meta charset="utf-8">
    </head>
    <script>
        function submitChat() {
            if (form1.uname.value ==''||form1.msg.value =='')
            {
                alert("ALL Filds");
                return;
            }
            form1.uname.readOnly=true;
            form1.uname.style.border='none';
            var uname=form1.uname.value;
            var msg=form1.msg.value;
            var xmlhttp= new XMLHttpRequest();
            xmlhttp.onreadystatechange =function () {
                if (xmlhttp.readyState==4&&xmlhttp.status==200){
                    document.getElementById('chatlogs').innerHTML=xmlhttp.responseText;
                }
                
            }
            xmlhttp.open('GET','insert.php?uname='+uname+'&msg='+msg,true);
            xmlhttp.send();
        }
        $(document).ready(function (e) {
           $.ajaxSetup({ache:false});
           setInterval(function () {$('#chatlogs').load('logs.php');},2000);
        });
    </script>
<body>
<form name="form1">
    <label class="la">Nhập tên:</label> <input type="text" class="uname" name="uname"> <br>
    <label class="la">Tin nhắn:</label><br>
    <textarea name="msg" class="msg"></textarea><br>
    <a href="#" onclick="submitChat()">Sent</a><br><br>
    <div id="chatlogs">
        Đang tải vui lòng chờ trong giây lát...
    </div>
</form>
</body>
</html>
