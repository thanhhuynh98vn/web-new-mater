<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/public/inc/header.php';?>
  <!-- BEGIN body -->
  <div id="body">
    <!-- BEGIN content -->
    <div id="content">
      <div class="single">
        <h2>Chi tiết</h2>
        <div class="break"></div>
            <?php
            $idN=$_GET['idnews'];
            $sql="SELECT * FROM news WHERE id_news={$idN}";
            $chay=$mysqli->query($sql);
            $arCT=mysqli_fetch_array($chay);
            // nếu k có id chuển về index
            if (count($arCT)==0){
                header("location:/");
            }

                $detail_text = $arCT['detail_text'];
                $preview_text = $arCT['preview_text'];
                $name = $arCT['name'];
                $picture = $arCT['picture'];
                $id_news = $arCT['id_news'];
                $new_name=convertUtf8ToLatin($name);
                $url='/'.$new_name.'-'.$idN.'.html';
                ?>
                <img src="files/<?=$picture?>">
                <p><?=$detail_text?></p>

          
      </div>
    </div>
    <!-- END content -->
    <!-- BEGIN sidebar -->
      <?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/public/inc/left_bar.php';?>
  </div>
  <!-- END body -->
  <!-- BEGIN footer -->
<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/public/inc/footer.php';?>