<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/admin/inc/header.php';?><!-- Form elements -->
<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/functions/checkUser.php';
require_once $_SERVER['DOCUMENT_ROOT']."/libaries/libraryFile.php";
?>
<div class="grid_12">

	<div class="module">
		 <h2><span>Thêm tin tức</span></h2>
			
		 <div class="module-body">
			 <?php
			 if (isset($_POST['them']))
			 {
				 $tentin=$_POST['tentin'];
				 $danhmuc=$_POST['danhmuc'];
				 $hinhanh=$_FILES['hinhanh']['name'];
				 $mota=$_POST['mota'];
				 $chitiet=$_POST['chitiet'];
				 if ($hinhanh=='')
				 {
					 $query_nopic="INSERT INTO news(name,preview_text,detail_text,id_cat) VALUES ('".$tentin."','".$mota."','".$chitiet."','".$danhmuc."')";
					 $result_nopuc=$mysqli->query($query_nopic);
					 if ($result_nopuc)
					 {
						 header('location:indexNews.php?msg=them thanh cong');
					 }
					 else
					 {
						 echo "co loi khi them hinh";
						 die();
					 }
				 }
				 else{
					 //up hinh
                     $object= new LibraryFile();
                     $result_pic=$object->upfile($hinhanh);
					 if($result_pic)
					 {
						 // viet query
						 $query="INSERT INTO news(name,preview_text,detail_text,id_cat,picture) VALUES ('".$tentin."','".$mota."','".$chitiet."','".$danhmuc."','".$result_pic."')";
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
					 else
					 {
						 echo "co loi khi up hinh";
						 die();
					 }
				 }

			 }
			 ?>
			<form action="" id="indexAdd" enctype="multipart/form-data" method="post">
				<p>
					<label>Tên tin(*)</label>
					<input type="text" name="tentin" value="" class="input-medium" />
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
							?>
							<option value="<?=$id_cat?>"><?=$name?></option>
							<?php
						}
						?>
					</select>
				</p>
				<p>
					<label>Hình ảnh</label>
					<input type="file"  name="hinhanh" value="" />
				</p>
				<p>
					<label>Mô tả(&)</label>
					<textarea name="mota" value="" rows="7" cols="90" class="input-medium"></textarea>
				</p>
				<p>
					<label>Chi tiết(*)</label>
					<textarea  name="chitiet" value="" rows="7" cols="90" class="ckeditor"></textarea>
				</p>
				<fieldset>
					<input class="submit-green" name="them" type="submit" value="Thêm" /> 
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