<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/admin/inc/header.php';?>
<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/functions/checkUser.php';
?>
<?php
$id_cat=$_GET["id"];
$query="SELECT picture FROM advertise WHERE id_ad={$id_cat}";
$chay=$mysqli->query($query);
$arNews=mysqli_fetch_array($chay);
$picture=$arNews['picture'];
unlink($_SERVER['DOCUMENT_ROOT'].'/files/'.$picture);
$sql="DELETE FROM advertise WHERE id_ad={$id_cat}";
$kq=$mysqli->query($sql);
if($kq)
{
    header("location:indexQuangcao.php?msg=xoa tin thanh cong");
}
else
{
    echo "co loi khi xoa";
    die();
}
?>
<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/admin/inc/footer.php';?>
