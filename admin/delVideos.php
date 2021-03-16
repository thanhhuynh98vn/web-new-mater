<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/admin/inc/header.php';?>
<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/functions/checkUser.php';
?>
<?php
$idg=$_GET['id'];
$sql="DELETE FROM videos WHERE  id='{$idg}'";
$result=$mysqli->query($sql);
if($result)
{
    header("location:videos.php?msg=Xóa thành công");

}
else
{
    echo "có lỗi rồi kìa";
    die();
}
?>
<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/admin/inc/footer.php';?>
