<div id="sidebar">
    <!-- begin sponsors -->
    <h2>Quảng cáo</h2>
    <div class="break"></div>
    <?php
    $sql1="SELECT * FROM advertise  ";
    $chay1=$mysqli->query($sql1);
    while ($arQc=mysqli_fetch_array($chay1)) {
        $id_ad = $arQc['id_ad'];
        $name = $arQc['name'];
        $picture = $arQc['picture'];

        ?>
        <a class="sponsors"  href="https://www.facebook.com/henemngaydohn"><img style="width: 125px; height: 125px" src="files/<?=$picture?>" alt=""/></a>
        <?php
    }
    ?>
    <!-- end sponsors -->
    <!-- begin search -->
    <form action="timkiem.php">
        <input type="text" name="tim" id="tim" value="" placeholder="Nhập nội dung cần tìm..."/>
        <button type="submit">Tìm kiếm</button>
    </form>
    <!-- end search -->
    <!-- begin popular posts -->
    <!-- begin popular posts -->
    <!-- begin flickr photos -->
    <div class="flickrs">
        <h2>Tin HOT</h2>
        <div class="break"></div>
        <p class="flick"> <a href="http://all-free-download.com/free-website-templates/"><img src="files/thumb05.jpg" alt="" /></a> <a href="http://all-free-download.com/free-website-templates/"><img src="files/thumb06.jpg" alt="" /></a> <a href="http://all-free-download.com/free-website-templates/"><img src="files/thumb07.jpg" alt="" /></a> <a href="http://all-free-download.com/free-website-templates/"><img src="files/thumb08.jpg" alt="" /></a> <a href="http://all-free-download.com/free-website-templates/"><img src="files/thumb09.jpg" alt="" /></a> <a href="http://all-free-download.com/free-website-templates/"><img src="files/thumb10.jpg" alt="" /></a> </p>
    </div>
    <!-- end flickr photos -->
    <!-- begin featured video -->
    <div class="video">
        <h2> Video</h2>
        <div class="break"></div>
        <?php
        $que="SELECT * FROM videos";
        $kq=$mysqli->query($que);
        $arV=mysqli_fetch_array($kq);
        $vcode=$arV['vcode'];
        ?>
        <iframe width="290" height="225"  style="padding-left: 10px" src="<?=$vcode?>" frameborder="0" allowfullscreen></iframe>


    </div>
    <!-- end featured video -->
    <!-- begin categories -->
    <div class="category">
        <h2>Thể loại</h2>
        <div class="break"></div>
        <ul>
            <?php
            $sql='SELECT * FROM category';
            $chay=$mysqli->query($sql);
            while ($arCat=mysqli_fetch_array($chay)) {
                $id_cati = $arCat['id_cat'];
                $name = $arCat['name'];
                $new_name=convertUtf8ToLatin($name);
                $url='/'.$new_name.'-'.$id_cati;
                ?>
                <li><a href="<?=$url?>"><?php echo $name?></a></li>
                <?php
            }
            ?>
        </ul>
        <div class="break"></div>
    </div>
    <!-- end categories -->
    <div class="break"></div>
    <!-- begin archives -->
    <!-- end archives -->
    <div class="break"></div>
    <div class="break"></div>
    <!-- begin meta -->
    <div class="meta">
        <h2>Admin</h2>
        <div class="break"></div>
        <ul>
            <li><a href="/admin/login.php">Đăng nhập</a></li>
            <li><a href=""</a></li>
        </ul>
        <div class="break"></div>
    </div>
    <div class="meta">
        <h2>Chat box</h2>
        <div class="break"></div>
        <ul>
            <li><a href="/chat.php">Chat với admin</a></li>
            <li><a href=""</a></li>
        </ul>
        <div class="break"></div>
    </div>
    <!-- end meta -->
    <div class="break"></div>
</div>
<!-- END sidebar -->
<div class="break"></div>