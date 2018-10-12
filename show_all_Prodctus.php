<?php include("header.php");?>
<?php include("slide.php");?>
<?php 
	if(isset($_REQUEST['categoryID']))
	{
		$sql="select p.productID,p.productName,p.price,p.photo,p.categoryID,c.categoryName from products p
			  left join categoryproduct c on(p.categoryID=c.categoryID)
		 where p.categoryID=".$_REQUEST['categoryID'];
		$query=mysql_query($sql);
		
	}
?>
<div id="container">
	<?php
		if(isset($_REQUEST['categoryID']))
		{
			$sql2="select * from categoryproduct where categoryID=".$_REQUEST['categoryID'];
			$query2=mysql_query($sql2);
			$row2=mysql_fetch_assoc($query2);
		}
	?>
	<div id="details">
    	<h3><?php echo $row2['categoryName'];?></h3>
        	
        	<?php 
				while($row=mysql_fetch_assoc($query))
				{
					echo '
							<div class="productphoto">
								<img src="images/products/'.$row['photo'].'" width="220" height="220" />
								<div style="text-align:center;" class="price">'.$row['price'].'&nbsp;&nbsp;  ر.س</div>	
							</div>
						';	
				}
			?>
        	
    </div>
</div>
<?php include("footer.php");?>