<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/admin/inc/header.php';?>
<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/functions/checkUser.php';
?>
<div class="bottom-spacing">
	  <!-- Button -->
	  <div class="float-left">
		  <a href="addQuangcao.php" class="button">
			<span>Thêm tin <img src="/templates/admin/images/plus-small.gif" alt="Thêm tin"></span>
		  </a>
	  </div>
	  <div class="clear"></div>
</div>

<div class="grid_12">
	<!-- Example table -->
	<div class="module">
		<h2><span>Danh sách quảng cáo</span></h2>
		
		<div class="module-table-body">
			<form action="">
			<table id="myTable" class="tablesorter">
				<thead>
					<tr>
						<th style="width:4%; text-align: center;">ID</th>
						<th>Tên</th>
						<th style="width:16%; text-align: center;">Hình ảnh</th>
						<th style="width:11%; text-align: center;">Chức năng</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$query="SELECT * FROM 	advertise
							ORDER BY id_ad DESC ";
					$result=$mysqli->query($query);
					while ($arItem=mysqli_fetch_array($result)) {
							$id_news=$arItem["id_ad"];
							$name=$arItem["name"];
							$picture=$arItem["picture"];
						?>
						<tr>
							<td class="align-center"><?= $id_news?></td>
							<td><a href=""><?= $name?></a></td>
							<td align="center">
								<?php
								if($picture=='') {
									echo "Khong co hinh";
								}
								else{
								?>
								<img src="/files/<?=$picture?>" class="hoa"/></td>
							<?php
							}
									?>
							<td align="center">
								<a href="editQuangcao.php?id=<?=$id_news?>">Sửa <img src="/templates/admin/images/pencil.gif" alt="edit"/></a>
								<a href="delQuangcao.php?id=<?=$id_news?>">Xóa <img src="/templates/admin/images/bin.gif" width="16" height="16"
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
				<a href="">1</a> 
				<span>|</span>>
			</div> 
			<div style="clear: both;"></div> 
		 </div>
	
</div> <!-- End .grid_12 -->
<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/admin/inc/footer.php';?>