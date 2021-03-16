
<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/admin/inc/header.php';?><!-- Form elements -->
<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/functions/checkUser.php';
?>
<?php
	$id_cat=$_GET["id"];
	$sql="SELECT * FROM category WHERE id_cat= {$id_cat} ";
	$kq=$mysqli->query($sql);
	$arCat=mysqli_fetch_array($kq);
?>
<div class="grid_12">

	<div class="module">
		<h2><span>Sửa danh mục tin</span></h2>
		<div class="module-body">
			<?php
			if(isset($_POST["sua"]))
			{
				$name=$_POST["name"];
				$query="UPDATE category SET name ='{$name}' WHERE id_cat={$id_cat}";
				$result=$mysqli->query($query);
				if($result)
				{
					header("location:indexCat.php?msg=Sửa thành công");
				}
				else
				{
					echo "có lỗi khi sửa";
					die();
				}
			}
			?>
			<form id="indexAdd" action=""method="post">
				<p>
					<label>Tên danh mục tin</label>
					<input type="text" name="name" id="name" value="<?php echo $arCat['name']?>" class="input-medium" />
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
                        name: {
                            required: true,
                            minlength: 5,
                            maxlength: 100,
                        },
                    },
                    messages: {
                        name: {
                            required: "Vui lòng nhập vào đây",
                            minlength: "Vui lòng nhập tối thiểu 5 ký tự",
                            maxlength: "Vui lòng nhập tối đa 100 ký tự",
                        },
                    },
                });
            });
        </script>
	</div>  <!-- End .module -->
	<div style="clear:both;"></div>
</div> <!-- End .grid_12 -->
<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/admin/inc/footer.php';?>