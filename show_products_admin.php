<?php include("header.php");?>
<?php include("slide.php");?> 
<div id="container"> 
<div id="details">
    <h3>عرض المنتجات المضافه</h3>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="sohwDetails">
      <tr>
        <th>رقم</th>
        <th>اسم المنتج </th>
        <th>تصنيف المنتج</th>
        <th>سعر المنتج</th>
        <th>التحديث</th>
        <th>الحذف</th>
      </tr>
      <?php 
		$sql="select p.productID,p.productName,p.price,p.photo,c.categoryName categoryName from products p
		left join categoryproduct c on (p.categoryID=c.categoryID)";
		$query=mysql_query($sql);
		$i=1;
		while($row=mysql_fetch_assoc($query))
		{
			echo '
				<tr>
					<td>'.$i.'</td>
					<td>'.$row['productName'].'</td>
					<td>'.$row['categoryName'].'</td>
					<td>'.$row['price'].'</td>
					<td><a href="update_products.php?productID='.$row['productID'].'"><img src="images/update.png" width="23" height="23" /></a></td>
					<td><a href="delete_products.php?productID='.$row['productID'].'"><img src="images/delete.png" width="23" height="23" /></a></td>
				  </tr>
			';	
			$i++;
		}
	?>
      
      
    </table>
</div>
</div>

<?php include("footer.php");?>

<script type="text/javascript">
	$(document).ready(function(e) {
        $("#Add").click(function(){
			if($("#cityName").val()=="")
			{
				$("#msg").html("ادخل اسم المدينة").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
		});
    });
</script>