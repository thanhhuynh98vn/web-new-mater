<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/admin/inc/header.php';?><!-- Form elements -->
<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/functions/checkUser.php';
?>
<div class="grid_12">
	<?php
	$id=$_GET['id'];
	$query="SELECT * FROM advertise WHERE id_ad={$id}";
	$chay=$mysqli->query($query);
	$arNews=mysqli_fetch_array($chay);
	?>
	<div class="module">
		 <h2><span>Sửa quảng cáo</span></h2>
			
		 <div class="module-body">
			 <?php
			 if (isset($_POST['sua']))
			 {
				 $tentin=$_POST['tentin'];
				 $hinhanh=$_FILES['hinhanh']['name'];
				 if ($hinhanh=='')
				 {
					 $query_nopic="UPDATE advertise 
                    SET name='{$tentin}'
					 WHERE id_ad='{$id}'";
					 $result_nopic=$mysqli->query($query_nopic);
					 if ($result_nopic)
					 {
						 header("location:indexQuangcao.php?msg= sua thanh cong");
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
						 $query="UPDATE advertise 
						 SET name='{$tentin}', picture='{$newfile}'
						 WHERE id_ad='{$id}'";
						 $result=$mysqli->query($query);
						 if($result)
						 {
							 header('location:indexQuangcao.php?msg= them thanh cong');
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
						 UPDATE advertise 
						 SET name='{$tentin}', picture='{$newfile}'
						 WHERE id_ad='{$id}'";
					 $result_pic=$mysqli->query($query_pic);
					 if($result_pic)
					 {
						 header('location:indexQuangcao.php?msg= sua thanh cong');
					 }else
					 {
						 echo 'co loi khi sua';
						 die();
					 }

				 }
			 }
			 ?>
			<form action="" enctype="multipart/form-data" method="post" id="indexAdd">
				<p>
					<label>Tên quảng cáo</label>
					<input type="text" name="tentin" value="<?=$arNews['name']?>" class="input-medium" />
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
				<fieldset>
					<input class="submit-green" name="sua" type="submit" value="Sửa" />
					<input class="submit-gray" name="reset" type="reset" value="Nhập lại" />
				</fieldset>
			</form>
		 </div> <!-- End .module-body -->
        <script>
            $( document ).ready( function () {
                $( "#indexAdd" ).validate( {
                    ignore: [],
                    debug: false,
                    rules: {
                        tentin: {
                            required: true,
                        },
                    },
                    messages: {
                        tentin: {
                            required: "Vui lòng nhập vào đây",
                        },
                    },
                });
            });
        </script>
	</div>  <!-- End .module -->
	<div style="clear:both;"></div>
</div> <!-- End .grid_12 -->
<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/admin/inc/footer.php';?>