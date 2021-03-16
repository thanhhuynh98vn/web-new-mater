
<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/admin/inc/header.php';?><!-- Form elements -->
<?php
    if (isset($_SESSION['arUser']))
    {
        header("location:index.php");
    }
?>
<div class="grid_12">

    <div class="module">
        <h2><span>Đăng nhập</span></h2>
        <div class="module-body">
            <?php
            if(isset($_POST["them"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $password=md5($password);
                $query="SELECT * FROM users  WHERE username='{$username}' AND password='{$password}' LIMIT 1";
                $result=$mysqli->query($query);
                $arUser=mysqli_fetch_array($result);
                if ($arUser== NULL)
                {
                    echo "Sai username hoặc password";
                }
                else
                {
                    $_SESSION['arUser']=$arUser;
                    header('location:index.php');
                }
            }
            ?>
            <form action=""method="post">
                <p>
                    <label>User name</label>
                    <input type="text" name="username" value="" class="input-medium" />
                </p>
                <p>
                    <label>Password</label>
                    <input type="password" name="password" value="" class="input-medium" />
                </p>

                <fieldset>
                    <input class="submit-green" name="them" type="submit" value="Đăng nhập" />
                </fieldset>
            </form>
        </div> <!-- End .module-body -->

    </div>  <!-- End .module -->
    <div style="clear:both;"></div>
</div> <!-- End .grid_12 -->
<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/admin/inc/footer.php';?>