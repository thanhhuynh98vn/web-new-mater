
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
                $pass=$_POST["pass"];
                $pass=md5($pass);
                $fullname=$_POST["fullname"];
                $query="INSERT INTO users (username,password,fullname) VALUE ('".$name."','".$pass."','".$fullname."')";
                $result=$mysqli->query($query);
                if($result)
                {header("location:indexAdmin.php?msg=Thêm thành công");

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
                    <label>User name</label>
                    <input type="text" name="name" value="" class="input-medium" />
                </p>
                <p>
                    <label>Password</label>
                    <input type="password" name="pass" value="<?php md5($pass)?>" class="input-medium" />
                </p>
                <p>
                    <label>Họ và tên</label>
                    <input type="text" name="fullname" value="" class="input-medium" />
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
                            minlength: 5,
                            maxlength: 100,
                        },
                        pass: {
                            required: true,
                            minlength: 5,
                            maxlength: 100,
                        },
                        fullname: {
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
                        pass: {
                            required: "Vui lòng nhập vào đây",
                            minlength: "Vui lòng nhập tối thiểu 5 ký tự",
                            maxlength: "Vui lòng nhập tối đa 100 ký tự",
                        },
                        fullname: {
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