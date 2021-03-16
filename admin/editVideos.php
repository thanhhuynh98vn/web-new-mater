<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/admin/inc/header.php';?><!-- Form elements -->
<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/functions/checkUser.php';
?>
<?php
$idg=$_GET['id'];
$sql="SELECT * FROM videos WHERE id='{$idg}'";
$kq=$mysqli->query($sql);
$arCat=mysqli_fetch_array($kq);
?>
<div class="grid_12">

	<div class="module">
		 <h2><span>Sửa videos</span></h2>
        <?php
            $idg=$_GET['id'];
        if (isset($_POST['them'])) {
            $ten = $_POST['tentin'];
            $code = $_POST['code'];
            $date = $_POST['date'];
            $sql = "UPDATE videos SET  vname='{$vname}', vcode='{$code}', date_create='{$date}' WHERE id='{$idg}'";
            $result = $mysqli->query($sql);
            if ($result) {
                header("location:videos.php?msg=sửa video thành công");
            } else {
                echo "có lỗi khi thêm video";
                die();
            }
        }
        ?>
			<form action="" enctype="multipart/form-data" id="indexAdd" method="post">
				<p>
					<label>Tên tin</label>
					<input type="text" name="tentin" value="<?=$arCat['vname']?>" class="input-medium" />
				</p>
                <p>
                    <label>Code</label>
                    <input type="text" name="code" value="<?=$arCat['vcode']?>" class="input-medium" />
                </p>
                <p>
                    <label>Date</label>
                    <input type="text" name="date" value="<?=$arCat['date_create']?>" class="input-medium" />
                </p>
				<fieldset>
					<input class="submit-green" name="them" type="submit" value="Sửa" />
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
                        code: {
                            required: true,
                        },
                        date: {
                            required: true,
                        },
                    },
                    messages: {
                        tentin: {
                            required: "Vui lòng nhập vào đây",
                        },
                        code: {
                            required: "Vui lòng nhập vào đây",
                        },
                        date: {
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