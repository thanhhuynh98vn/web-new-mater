<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/admin/inc/header.php';?><!-- Form elements -->
<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/functions/checkUser.php';
?>
<div class="grid_12">

	<div class="module">
		 <h2><span>Thêm Videos</span></h2>
        <?php
        if (isset($_POST['them']))
        {
            $ten=$_POST['tentin'];
            $code=$_POST['code'];
            $date=$_POST['date'];
            $query="INSERT INTO videos(vname,vcode,date_create ) VALUE ('".$ten."','".$code."','".$date."')";
            $kq=$mysqli->query($query);
            if ($kq){

                    header('location:videos.php?msg=them thanh cong');
                }
                else
                {
                    echo "co loi khi them hinh";

                }
            }

        ?>
			<form action="" enctype="multipart/form-data" id="indexAdd" method="post">
				<p>
					<label>Tên tin</label>
					<input type="text" name="tentin" value="" class="input-medium" />
				</p>
                <p>
                    <label>Code</label>
                    <input type="text" name="code" value="" class="input-medium" />
                </p>
                <p>
                    <label>Date</label>
                    <input type="text" name="date" value="" class="input-medium" />
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