<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/admin/inc/header.php';?>
<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/functions/checkUser.php';
?>
<?php
    $id_cat=$_GET["id"];
    $query="DELETE FROM contact WHERE id_contact={$id_cat}";
    $chay=$mysqli->query($query);
    if($chay)
    {
        header("location:lienhe.php?msg=Xóa thành công");

    }
    else
    {
        echo "có lỗi rồi kìa";
        die();
    }
?>
<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/admin/inc/footer.php';?>
