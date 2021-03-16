<?php
// khởi tạo db
$mysqli=new mysqli("localhost","root","","bnews");
$mysqli->set_charset("utf8");
if(mysqli_connect_errno())
{
    echo "Co loi roi kia".mysqli_connect_error();
}
?>