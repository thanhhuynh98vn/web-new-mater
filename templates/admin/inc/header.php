<?php
 ob_start();
 session_start();
require_once $_SERVER["DOCUMENT_ROOT"].'/functions/connectdb.php';
require_once $_SERVER["DOCUMENT_ROOT"].'/functions/defines.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>VinaEnter EDU - Admin template</title>
        <link rel="stylesheet" type="text/css" href="/templates/admin/css/styles.css" media="screen" />

        <script type="text/javascript" src="/libaries/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="/libaries/jquery.validate.min.js"></script>
        <script type="text/javascript" src="/libaries/ckeditor/ckeditor.js"></script>
	</head>
	<body>
    	<!-- Header -->
        <div id="header">
            <!-- Header. Status part -->
            <div id="header-status">
                <div class="container_12">
                    <div class="grid_4">
                    	<ul class="user-pro">
							<li><a href="logout.php">Logout</a></li>
                            <li>Chào, <a href="profile.php"><?php
                            if (isset($_SESSION['arUser']))
                            {
                                echo $_SESSION['arUser']['fullname'];
                            }
                                    ?></a></li>
                    	</ul>
                    </div>
                </div>
                <div style="clear:both;"></div>
            </div> <!-- End #header-status -->
            
            <!-- Header. Main part -->
            <div id="header-main">
                <div class="container_12">
                    <div class="grid_12">
                        <div id="logo">
                            <ul id="nav">
                                <li id="current"><a href="index.php">Quản trị</a></li>
                                <li><a href="profile.php">Tài khoản</a></li>
                            </ul>
                        </div><!-- End. #Logo -->
                    </div><!-- End. .grid_12-->
                    <div style="clear: both;"></div>
                </div><!-- End. .container_12 -->
            </div> <!-- End #header-main -->
            <div style="clear: both;"></div>
            <!-- Sub navigation -->
            <div id="subnav">
                <div class="container_12">
                    <div class="grid_12">
                        <ul><li><a href="lienhe.php">Liên hệ</a></li>
                            <li><a href="videos.php">Videos</a></li>
                            <li><a href="indexQuangcao.php">Quảng cáo</a></li>
                            <li><a href="indexNews.php">Tin tức</a></li>
                            <li><a href="indexCat.php">Danh mục</a></li>
                            <li><a href="indexAdmin.php">User</a></li>
                            <li><a href="chat.php">Chat</a></li>
                        </ul>
                        
                    </div><!-- End. .grid_12-->
                </div><!-- End. .container_12 -->
                <div style="clear: both;"></div>
            </div> <!-- End #subnav -->
        </div> <!-- End #header -->
        
		<div class="container_12">