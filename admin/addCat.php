
<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/admin/inc/header.php';?><!-- Form elements -->
<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/functions/checkUser.php';
?>
<div class="grid_12">

	<div class="module">
		 <h2><span>Thêm danh mục tin</span></h2>
		 <div class="module-body">
			 <?php
			 	if(isset($_POST["them"]))
				{
					$name=$_POST["name"];
					$query="INSERT INTO category(name) VALUE ('$name')";
					$result=$mysqli->query($query);
					if($result)
					{
						header("location:indexCat.php?msg=Thêm thành công");
					}
					else
					{
						echo "có lỗi khi thêm";
						die();
					}
				}
			 ?>
			<form action=""method="post" id="indexAdd">
				<p>
					<label>Tên dan mục tin</label>
					<input type="text" name="name" value="" class="input-medium" />
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
                        name: {
                            required: true,
                        },
                    },
                    messages: {
                        name: {
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