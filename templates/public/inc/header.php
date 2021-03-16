<?php
ob_start();
require_once $_SERVER["DOCUMENT_ROOT"].'/functions/connectdb.php';
require_once $_SERVER["DOCUMENT_ROOT"].'/functions/defines.php';
require_once $_SERVER["DOCUMENT_ROOT"].'/functions/re.php';
require_once $_SERVER["DOCUMENT_ROOT"].'/libaries/libraryString.php';

?>
<?php
header("HTTP/1.0 404 Not Found");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>BlogStarter</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="/templates/public/css/style.css" />
    <!--[if lte IE 6]>
    <link rel="stylesheet" type="text/css" href="/templates/public/css/ie6.css"/>
    <script type="text/javascript" src="libaries/js/unitpngfix.js"></script>
    <![endif]-->
    <script type="text/javascript" src="javascript.js"></script>
    <script type="text/javascript" src="libaries/js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="libaries/js/jquery.cycle.all.min.js"></script>
    <script type="text/javascript" src="libaries/js/scripts.js"></script>
    <script type="text/javascript" src="/libaries/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="/libaries/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/libaries/ckeditor/ckeditor.js"></script>
</head>
<body>
<!-- BEGIN wrapper -->
<div id="wrapper">
    <p class="rss"> <a href="https://www.facebook.com/henemngaydohn">Posts</a> | <a href="https://www.facebook.com/henemngaydohn">Comments</a> | <a href="https://www.facebook.com/henemngaydohn">Email</a> </p>
    <!-- BEGIN header -->
    <div id="header">
        <h1><a href="">The New York Time</a></h1>
        <?php
        $query="SELECT * FROM advertise  ORDER BY id_ad DESC LIMIT 1";
        $kq=$mysqli->query($query);
        $arQC=mysqli_fetch_array($kq);
        $picture=$arQC['picture'];
        ?>
        <div class="ad"> <a href=""><img style="width: 468px; height: 60px" src="files/<?=$picture?>" alt="" /></a> </div>
        <div class="break"></div>
        <ul>
            <li><a href="/">Trang Chủ</a></li>
            <?php
            $sql='SELECT * FROM category';
            $chay=$mysqli->query($sql);
            while ($arCat=mysqli_fetch_array($chay)) {
            $id_catc=$arCat['id_cat'];
            $name=$arCat['name'];
                $new_name=convertUtf8ToLatin($name);
                $url='/'.$new_name.'-'.$id_catc;
            ?>
            <li><a href="<?=$url?>"><?=$name?></a></li>
                <?php
            }
            ?>

            <li><a href="lien-he">Liên Hệ</a></li>
        </ul>
    </div>
    <!-- END header -->