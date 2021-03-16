<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/public/inc/header.php';?>
  <!-- BEGIN body -->
  <div id="body">
    <!-- BEGIN content -->
    <div id="content">
      <!-- begin featured-posts -->
      <h2>Tin Mói</h2>
      <div class="break"></div>
      <div class="featured-img">
        <div id="featured">
          <div class="featured">
            <ul class="photo">
              <li class="first"><a href="http://all-free-download.com/free-website-templates/"><img src="files/featured.jpg" alt="" /></a></li>
              <li><a href="http://all-free-download.com/free-website-templates/"><img src="files/thumb01.jpg" alt="" /></a></li>
              <li><a href="http://all-free-download.com/free-website-templates/"><img src="files/thumb02.jpg" alt="" /></a></li>
            </ul>
            <ul class="text">
              <li class="first">
                <h2><a href="http://all-free-download.com/free-website-templates/">Art Gallery and Fashion Showroom 1</a></h2>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse interdum. Donec tristique dolor nec nisi. Ut faucibus metus non orci. Etiam posuere netus, libero condimentum eu. Aenean a ut. Elit aliquet porttitor. Donec tristique dolor nec nisi. Ut faucibus metus non orci.</p>
                <a class="next" href="http://all-free-download.com/free-website-templates/">Read Full Story</a> </li>
              <li>
                <h2><a href="http://all-free-download.com/free-website-templates/">Art Gallery and Fashion Showroom 2</a></h2>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse interdum. Donec tristique dolor nec nisi. Ut faucibus metus non orci. Etiam posuere netus, libero condimentum eu. Aenean a ut. Elit aliquet porttitor. Donec tristique dolor nec nisi. Ut faucibus metus non orci.</p>
                <a class="next" href="http://all-free-download.com/free-website-templates/">Read Full Story</a> </li>
              <li>
                <h2><a href="http://all-free-download.com/free-website-templates/">Art Gallery and Fashion Showroom 3</a></h2>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse interdum. Donec tristique dolor nec nisi. Ut faucibus metus non orci. Etiam posuere netus, libero condimentum eu. Aenean a ut. Elit aliquet porttitor. Donec tristique dolor nec nisi. Ut faucibus metus non orci.</p>
                <a class="next" href="http://all-free-download.com/free-website-templates/">Read Full Story</a> </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- end featured-posts -->
      <!-- begin post -->
        <?php
        $tim=$_GET['tim'];
        $sql="SELECT * FROM news WHERE name LIKE '%".$tim."%' OR preview_text LIKE '%".$tim."%'  ORDER BY id_news DESC";
        //echo $sql;die();
        $chay=$mysqli->query($sql);
        while ($arDM=mysqli_fetch_array($chay)) {
        $detail_text=$arDM['detail_text'];
        $preview_text=$arDM['preview_text'];
        $name=$arDM['name'];
        $picture=$arDM['picture'];
        $id_news=$arDM['id_news'];
        ?>
      <div class="post"> <a href="about.php?idnews=<?=$id_news?>"><img src="files/<?=$picture?>" alt=""/></a>
        <h1><a href="about.php?idnews=<?=$id_news?>"><?=$name?></a></h1>
        <p> <?=$preview_text?></p>
        <p class="date">04.23.09 &nbsp;&nbsp;| <a href="about.php">Advertising</a> |&nbsp; CHIQ MONTES</p>
        <a class="comment">11 Comments</a>
          <div class="break"></div>
      </div>
            <?php
        }
        ?>
      <!-- end post -->
    </div>

    <!-- END content -->
    <!-- BEGIN sidebar -->
      <?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/public/inc/left_bar.php';?>
  </div>
  <!-- END body -->
  <!-- BEGIN footer -->
  <?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/public/inc/footer.php';?>
