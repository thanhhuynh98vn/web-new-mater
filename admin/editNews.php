<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/admin/inc/header.php';?><!-- Form elements -->
<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/functions/checkUser.php';
?>
<div class="grid_12">
	<?php
	$id=$_GET['id'];
	$query="SELECT * FROM news WHERE id_news={$id}";
	$chay=$mysqli->query($query);
	$arNews=mysqli_fetch_array($chay);
	?>
	<div class="module">
		 <h2><span>Sửa tin tức</span></h2>
			
		 <div class="module-body">
			 <?php
			 if (isset($_POST['sua']))
			 {
				 $tentin=$_POST['tentin'];
				 $danhmuc=$_POST['danhmuc'];
				 $hinhanh=$_FILES['hinhanh']['name'];
				 $mota=$_POST['mota'];
				 $chitiet=$_POST['chitiet'];
				 if ($hinhanh=='')
				 {
					 $query_nopic="UPDATE news 
                    SET name='{$tentin}', id_cat='{$danhmuc}', preview_text='{$mota}', detail_text='{$chitiet}'
					 WHERE id_news='{$id}'";
					 $result_nopic=$mysqli->query($query_nopic);
					 if ($result_nopic)
					 {
						 header("location:indexNews.php?msg= sua thanh cong");
					 }
					 else
					 {
						 echo "co loi khi sua";
						 die();
					 }
				 }
				 else
				 {
					 //up hinh
					 $tpm_name=$_FILES['hinhanh']['tmp_name'];
					 // doi ten hinh
					 $tmp=explode('.',$hinhanh);
					 $duoifile=end($tmp);
					 $newfile='VNE-'.time().'.'.$duoifile;

					 $padupload=$_SERVER['DOCUMENT_ROOT'].'/files/'.$newfile;
					 $result_pic= move_uploaded_file($tpm_name,$padupload);
					 if($result_pic)
					 {
						 // viet query
						 $query="UPDATE news 
						 SET name='{$tentin}', id_cat='{$danhmuc}', preview_text='{$mota}', detail_text='{$chitiet}', picture='{$newfile}'
						 WHERE id_news='{$id}'";
						 $result=$mysqli->query($query);
						 if($result)
						 {
							 header('location:indexNews.php?msg= them thanh cong');
						 }
						 else
						 {
							 echo "co loi khi them hinh";
							 die();
						 }
					 }
					 // tin cu khong co hinh
					 if($arNews["picture"]!='')
					 {
						 unlink($_SERVER['DOCUMENT_ROOT'].'/files/'.$arNews['picture']);

					 }
					 $query_pic="
						 UPDATE news 
						 SET name='{$tentin}', id_cat='{$danhmuc}', preview_text='{$mota}', detail_text='{$chitiet}', picture='{$newfile}'
						 WHERE id_news='{$id}'";
					 $result_pic=$mysqli->query($query_pic);
					 if($result_pic)
					 {
						 header('location:indexNews.php?msg= sua thanh cong');
					 }else
					 {
						 echo 'co loi khi sua';
						 die();
					 }

				 }
			 }
			 ?>
			<form action="" id="indexAdd" enctype="multipart/form-data" method="post">
				<p>
					<label>Tên tin</label>
					<input type="text" name="tentin" value="<?=$arNews['name']?>" class="input-medium" />
				</p>
				<p>
					<label>Danh mục tin</label>
					<select  name="danhmuc" class="input-short">
						<?php
						$sql="SELECT * FROM category";
						$kq=$mysqli->query($sql);
						while ($arCat=mysqli_fetch_array($kq)) {
							$id_cat=$arCat['id_cat'];
							$name=$arCat['name'];
							$selected='';
							if ($id_cat==$arNews['id_cat'])
							{
								$selected='selected="selected"';
							}
							?>
							<option value="<?=$id_cat?>" <?=$selected?>><?=$name?></option>
							<?php
						}
						?>
					</select>
				</p>
				<?php
				if($arNews['picture']!='') {
					?>
					<p>
						<label>Hình ảnh cũ</label>
						<img src="/files/<?= $arNews['picture']?>">
					</p>
					<?php
				}
				?>
				<p>
					<label>Hình ảnh</label>
					<input type="file"  name="hinhanh" value="" />
				</p>
				<p>
					<label>Mô tả</label>
					<textarea name="mota" value="" rows="7" cols="90" class="input-medium"><?=$arNews['preview_text']?></textarea>
				</p>
				<p>
					<label>Chi tiết</label>
					<textarea  name="chitiet" value="" rows="7" cols="90" class="input-long ckeditor"><?=$arNews['detail_text']?></textarea>
				</p>
				<fieldset>
					<input class="submit-green" name="sua" type="submit" value="Sửa" />
					<input class="submit-gray" name="reset" type="reset" value="Nhập lại" />
				</fieldset>
			</form>
		 </div> <!-- End .module-body -->

	</div>  <!-- End .module -->
	<div style="clear:both;"></div>

</div> <!-- End .grid_12 -->
<script>
    $( document ).ready( function () {

        $( "#indexAdd" ).validate( {
            ignore: [],
            debug: false,
            rules: {
                tentin: {
                    required: true,
                    minlength: 5,
                    maxlength: 100,
                },
                chitiet: {
                    required: function(){
                        CKEDITOR.instances.chitiet.updateElement();
                    },
                    minlength: 5,
                },
                mota:{
                    required:true,
                    minlength: 5,
                }
            },
            messages: {
                tentin: {
                    required: "Vui lòng nhập vào đây",
                    minlength: "Vui lòng nhập tối thiểu 5 ký tự",
                    maxlength: "Vui lòng nhập tối đa 100 ký tự",
                },
                chitiet: {
                    required: "Vui lòng nhập vào đây",
                    minlength: "Vui lòng nhập tối thiểu 5 ký tự",
                },
                mota:{
                    required: "Vui lòng nhập vào đây",
                    minlength: "Vui lòng nhập tối thiểu 5 ký tự",
                }
            },
        });
    });
</script>
<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/admin/inc/footer.php';?>