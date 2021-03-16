<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/public/inc/header.php';?>
<?php
// đếm số dòng dữ liệu trong csdl
    $query="SELECT COUNT(id_news) as tongsodong FROM news";
    $resultTSD=$mysqli->query($query);
    $arTSD=mysqli_fetch_array($resultTSD);
    $tongsodong=$arTSD['tongsodong'];
    // so dong tren 1 trang
    $row_count=ROW_COUNT;
    //tong so trang
    $sotrang=ceil($tongsodong/$row_count);
    // lay trang hien tai
    $current_page=1;
    if (isset($_GET['page']))
    {
        $current_page=$_GET['page'];
    }
    $offset=($current_page-1)*$row_count;
?>
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
              <li class="first"><a href=""><img src="files/featured.jpg" alt="" /></a></li>
              <li><a href=""><img src="files/thumb01.jpg" alt="" /></a></li>
              <li><a href=""><img src="files/thumb02.jpg" alt="" /></a></li>
            </ul>
            <ul class="text">
              <li class="first">
                <h2><a href="">Triển làm căn phòng thân thiện</a></h2>
                <p>Trước tiên, bạn hãy xem xét căn nhà của mình cả bên trong và bên ngoài. Hãy chọn vị trí nào mà căn phòng mở rộng tạo cho bạn cảm giác có sự kết nối mật thiết với căn nhà, và đảm bảo rằng bạn có thể dễ dàng tới đó, cho dù về mặt vật lý kiến trúc nó có thể gắn liền hay không với ngôi nhà.</p>
                <a class="next" href="">Read Full Story</a> </li>
              <li>
                <h2><a href="">Art Gallery and Fashion Showroom 2</a></h2>
                <p> dolor nec nisi. Ut faucibus metus non orci.</p>
                <a class="next" href="">Read Full Story</a> </li>
              <li>
                <h2><a href="">Art Gallery and Fashion Showroom 3</a></h2>
                <p>olor nec nisi. Ut faucibus metus non orci.</p>
                <a class="next" href="">Read Full Story</a> </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- end featured-posts -->
      <!-- begin post -->
        <?php
        $sql="SELECT * FROM news ORDER BY id_news DESC LIMIT $offset,$row_count ";
        //echo $sql;die();
        $chay=$mysqli->query($sql);
        while ($arDM=mysqli_fetch_array($chay)) {
        $detail_text=$arDM['detail_text'];
        $preview_text=$arDM['preview_text'];
        $name=$arDM['name'];
        $nn='index';
        $picture=$arDM['picture'];
        $id_news=$arDM['id_news'];
        $new_name=convertUtf8ToLatin($nn);
        $new_name1=convertUtf8ToLatin($name);
        $url='/'.$new_name1.'-'.$id_news.'.html';
        ?>
      <div class="post"> <a href="<?=$url?>"><img src="files/<?=$picture?>" alt=""/></a>
        <h1><a href="<?=$url?>"><?=$name?></a></h1>
        <p> <?=$preview_text?></p>
        <p class="date">04.23.09 &nbsp;&nbsp;| <a href="about.php">Advertising</a> |&nbsp; CHIQ MONTES</p>
        <a class="comment">11 Comments</a>
          <div class="break"></div>
      </div>
            <?php
        }
        ?>
      <!-- end post -->
      <div class="navigation">
          <ul>
          <?php
          for ($i=1;$i<=$sotrang;$i++)
          {
          if ($i==$current_page)
          {
              $activepage="class='active'";

          }else
          {
              $activepage= null;
          }
              $url2='/'.$new_name.'-page'.$i;
          ?>
              <a href="<?=$url2?>" <?=$activepage?>> Trang<?=$i?></a>

              <?php
              }
              ?>

                <a href="<?=$url2?>">Trang cuối</a>
          </ul>
      </div>
    </div>
    <!-- END content -->
    <!-- BEGIN sidebar -->
      <?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/public/inc/left_bar.php';?>
  </div>
  <!-- END body -->
  <!-- BEGIN footer -->
  <?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/public/inc/footer.php';?>
