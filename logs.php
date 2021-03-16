<?php
$mysqli=new mysqli("mysql.hostinger.vn","u913894724_root","123123","u913894724_bnews");
$mysqli->set_charset("utf8");
if(mysqli_connect_errno())
{
    echo "Co loi roi kia".mysqli_connect_error();
}
$query2="SELECT * FROM logs ORDER BY id DESC ";
$result=$mysqli->query($query2);
while ($extract=mysqli_fetch_array($result))
{
    echo "<span class='uname'>".$extract['username']."</span>:<span class='msg'>".$extract["msg"]."</span><br>";
}


?>