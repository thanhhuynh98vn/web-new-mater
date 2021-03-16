<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/admin/inc/header.php';?>
<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/functions/checkUser.php';
?>
<div class="bottom-spacing">
	  <!-- Button -->
	  <div class="float-left">
		  <a href="addCat.php" class="button">
			<span>Thêm danh muc tin <img src="/templates/admin/images/plus-small.gif" alt="Thêm tin"></span>
		  </a>
	  </div>
	  <div class="clear"></div>
</div>

<div class="grid_12">
	<!-- Example table -->
	<div class="module">
		<h2><span>Danh sách danh mục tin</span></h2>
		<?php
		if(isset($_GET["msg"]))
		{
			echo $_GET["msg"];
		};
		?>
		<div class="module-table-body">
			<form action="">
			<table id="myTable" class="tablesorter">
				<thead>
					<tr>
						<th style="width:4%; text-align: center;">ID</th>
						<th>Tên</th>
						<th style="width:11%; text-align: center;">Chức năng</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$query="SELECT * FROM 	category";
					$result= $mysqli->query($query);
					while ($arItem=mysqli_fetch_array($result))
					{
						$id_cat=$arItem["id_cat"];
						$name=$arItem["name"];
				?>
					<tr>
						<td class="align-center"><?php echo $id_cat?></td>
						<td><a href=""><?php echo $name?></a></td>
						<td align="center">
							<a href="editCat.php?id=<?php echo $id_cat; ?>"> Sửa <img src="/templates/admin/images/pencil.gif" alt="edit"/></a>
							<a href="delCat.php?id=<?php echo $id_cat; ?>" onclick=" return confirm('Bạn có muốn xóa không?');">Xóa <img src="/templates/admin/images/bin.gif" width="16" height="16" alt="delete"/></a>
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
				<span>|</span> 
				<a href="">2</a> 
				<span>|</span> 
				<span class="current">3</span> 
				<span>|</span> 
				<a href="">4</a> 
				<span>|</span> 
				<a href="">5</a> 
				<span>|</span> 
				<a href="">6</a> 
				<span>|</span> 
				<a href="">7</a>
				<span>|</span> 
				<a href="">8</a> 
				<span>|</span> 
				<a href="">9</a>
				<span>|</span> 
				<a href="">10</a>   
			</div> 
			<div style="clear: both;"></div> 
		 </div>
	
</div> <!-- End .grid_12 -->
<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/admin/inc/footer.php';?>