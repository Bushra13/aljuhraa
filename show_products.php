<?php include("header.php");?>
<?php include("slide.php");?> 
<div id="container"> 
<div id="details">
	<h3>اصناف المنتجات</h3>
    <?php 
		$sql="select * from categoryproduct";
		$query=mysql_query($sql);
		while($row=mysql_fetch_assoc($query))
		{
			echo '
			<div class="cat"><a href="show_all_Prodctus.php?categoryID='.$row['categoryID'].'"><img src="images/category/'.$row['photo'].'" width="181" height="173" /></a></div>
			';	
		}
	?>
    
</div>
</div>

<?php include("footer.php");?>
