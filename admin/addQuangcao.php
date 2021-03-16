<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/admin/inc/header.php';?><!-- Form elements -->
<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/functions/checkUser.php';
?>
<div class="grid_12">

	<div class="module">
		 <h2><span>Thêm tin tức</span></h2>
			
		 <div class="module-body">
			 <?php
			 if (isset($_POST['them']))
			 {
				 $tentin=$_POST['tentin'];
				 $hinhanh=$_FILES['hinhanh']['name'];
				 if ($hinhanh=='')
				 {
					 $query_nopic="INSERT INTO advertise(name) VALUES ('".$tentin."')";
					 $result_nopuc=$mysqli->query($query_nopic);
					 if ($result_nopuc)
					 {
						 header('location:indexQuangcao.php?msg=them thanh cong');
					 }
					 else
					 {
						 echo "co loi khi them hinh";
						 die();
					 }
				 }
				 else{
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
						 $query="INSERT INTO advertise(name,picture) VALUES ('".$tentin."','".$newfile."')";
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
					 else
					 {
						 echo "co loi khi up hinh";
						 die();
					 }
				 }

			 }
			 ?>
			<form action="" enctype="multipart/form-data" id="indexAdd" method="post">
				<p>
					<label>Tên tin</label>
					<input type="text" name="tentin" value="" class="input-medium" />
				</p>
				<p>
					<label>Hình ảnh</label>
					<input type="file"  name="hinhanh" value="" />
				</p>
				<fieldset>
					<input class="submit-green" name="them" type="submit" value="Thêm" /> 
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