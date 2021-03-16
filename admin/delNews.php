<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/admin/inc/header.php';?>
<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/functions/checkUser.php';
require_once $_SERVER["DOCUMENT_ROOT"].'/libaries/libraryFile.php';
?>
<?php
$id_cat=$_GET["id"];
$query="SELECT picture FROM news WHERE id_news={$id_cat}";
$chay=$mysqli->query($query);
$arNews=mysqli_fetch_array($chay);
$picture=$arNews['picture'];
$object = new libraryFile();
$object->deleteFile($picture);
$sql="DELETE FROM news WHERE id_news={$id_cat}";
$kq=$mysqli->query($sql);
if($kq)
{
    header("location:indexNews.php?msg=xoa tin thanh cong");
}
else
{
    echo "co loi khi xoa";
    die();
}
?>
<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/admin/inc/footer.php';?>
