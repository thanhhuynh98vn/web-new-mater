<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/admin/inc/header.php';?>
<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/functions/checkUser.php';
?>
<?php
// đếm số dòng dữ liệu trong csdl
$query="SELECT COUNT(id_contact) as tongsodong FROM contact";
$resultTSD=$mysqli->query($query);
$arTSD=mysqli_fetch_array($resultTSD);
$tongsodong=$arTSD['tongsodong'];
// so dong tren 1 trang
$row_count=ROW_COUNT;
//tong so trang
$sotrang=ceil($tongsodong/$row_count);
// lay trang hien tai
$current_page=1;
if (isset($_GET['page']))
{
    $current_page=$_GET['page'];
}
$offset=($current_page-1)*$row_count;
?>
    <div class="bottom-spacing">
        <!-- Button -->
        <div class="float-left">
            <a href="addNews.php" class="button">
                <span>Thêm tin <img src="/templates/admin/images/plus-small.gif" alt="Thêm tin"></span>
            </a>
        </div>
        <div class="clear"></div>
    </div>

    <div class="grid_12">
        <!-- Example table -->
        <div class="module">
            <h2><span>Danh sách tin</span></h2>

            <div class="module-table-body">
                <form action="">
                    <table id="myTable" class="tablesorter">
                        <thead>
                        <tr>
                            <th style="width:4%; text-align: center;">ID</th>
                            <th>Tên</th>
                            <th style="width:20%">Email</th>
                            <th style="width:16%; text-align: center;">Tin nhắn</th>
                            <th style="width:16%; text-align: center;">Phone</th>
                            <th style="width:11%; text-align: center;">Chức năng</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query="SELECT * FROM contact 
							ORDER BY id_contact DESC 
							LIMIT $offset,$row_count";
                        $result=$mysqli->query($query);
                        while ($arItem=mysqli_fetch_array($result)) {
                            $id_news=$arItem["id_contact"];
                            $name=$arItem["name"];
                            $cname=$arItem["email"];
                            $ph=$arItem["phone"];
                            $tinnhan=$arItem['content'];
                            ?>
                            <tr>
                                <td class="align-center"><?= $id_news?></td>
                                <td><a href=""><?= $name?></a></td>
                                <td><?= $cname?></td>
                                <td><?=$tinnhan?></td>
                                <td><?=$ph?></td>
                                <td align="center">
                                    <a href="dellienhe.php?id=<?=$id_news?>">Xóa <img src="/templates/admin/images/bin.gif" width="16" height="16"
                                                                                    alt="delete"/></a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>


                        </tbody>
                    </table>
                </form>
            </div> <!-- End .module-table-body -->
        </div> <!-- End .module -->
        <div class="pagination">
            <div class="numbers">
                <span>Trang:</span>
                <?php
                for ($i=1;$i<=$sotrang;$i++)
                {
                    if ($i==$current_page)
                    {
                        $activepage="class='active'";

                    }else
                    {
                        $activepage= null;
                    }
                    ?>
                    <a href="lienhe.php?page=<?=$i?>"<?=$activepage?>><?=$i?></a>
                    <span>|</span>
                    <?php
                }
                ?>
            </div>
            <div style="clear: both;"></div>
        </div>

    </div> <!-- End .grid_12 -->
<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/admin/inc/footer.php';?>