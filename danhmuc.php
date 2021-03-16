<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/public/inc/header.php';?>
<?php
// đếm số dòng dữ liệu trong csdl
$idcat=$_GET['id_cat'];
$query="SELECT COUNT(id_news) as tongsodong FROM news WHERE id_cat={$idcat}";
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
$query1="SELECT * FROM category WHERE id_cat={$idcat}";
$result1=$mysqli->query($query1);
$arT=mysqli_fetch_array($result1);
$name_cat=$arT['name'];
$new_nameCat=convertUtf8ToLatin($name_cat);
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
        $idcat=$_GET['id_cat'];
        $sql="SELECT * FROM news WHERE id_cat=$idcat ORDER BY id_news DESC LIMIT $offset,$row_count ";
        $chay=$mysqli->query($sql);
        while ($arDM=mysqli_fetch_array($chay)) {
        $detail_text=$arDM['detail_text'];
        $preview_text=$arDM['preview_text'];
        $name=$arDM['name'];
        $picture=$arDM['picture'];
        $id_news=$arDM['id_news'];
        $new_name=convertUtf8ToLatin($name);
        $url='/'.$new_name.'-'.$id_news.'.html';
        $ulr3='/'.$new_name.'-'.$id_news.'.html';
        ?>
      <div class="post"> <a href="<?=$ulr3?>"><img src="files/<?=$picture?>" alt=""/></a>
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
            $url2='/'.$new_nameCat.'-'.$idcat.'-page'.$i;
            ?>
            <a href="<?=$url2?>" <?=$activepage?>> Trang<?=$i?>
                <?php
                }
                ?>
                <a href="">Next</a>
        </div>
    </div>
    <!-- END content -->
    <!-- BEGIN sidebar -->

      <?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/public/inc/left_bar.php';?>
  </div>
  <!-- END body -->
  <!-- BEGIN footer -->
  <?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/public/inc/footer.php';?>
