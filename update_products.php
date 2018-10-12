<?php include("header.php");?>
<?php include("slide.php");?> 
<?php
	if(isset($_REQUEST['productID']))
	{
		$sql="select * from products where productID=".$_REQUEST['productID'];
		$query=mysql_query($sql);
		$row=mysql_fetch_assoc($query);
	}
?>
<div id="container"> 
<div id="details">
	<div id="flyimage"><img src="images/products/<?php echo $row['photo'];?>" width="150" height="150"/></div>
    <h3>تعديل منتج</h3>
    <form action="" method="post" enctype="multipart/form-data">
    <table width="78%" border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td width="12%">رقم المنتج</td>
        <td width="88%"><input name="productID" type="text" disabled="disabled" id="productID" value="<?php echo $row['productID'];?>" />
        <input type="hidden" name="productID" value="<?php echo $row['productID'];?>" /></td>
      </tr>
      <tr>
        <td>اسم المنتج</td>
        <td><input type="text" name="productName" id="productName" value="<?php echo $row['productName'];?>" /></td>
      </tr>
      <tr>
        <td>سعر المنتج</td>
        <td><input type="text" name="price"  id="price" value="<?php echo $row['price'];?>"/></td>
      </tr>
      <tr>
        <td>صورة المنتج</td>
        <td><input type="file" name="photo" id="photo" /></td>
      </tr>
      <tr>
        <td>تصنيف المنتج</td>
        <td><select name="categoryID" id="categoryID">
          <option value="0">اختر التصنيف</option>
          <?php
		  	$sql0="select * from categoryproduct ";
			$query0=mysql_query($sql0);
			while($row0=mysql_fetch_assoc($query0))
			{
				echo ' <option value="'.$row0['categoryID'].'"';
					if($row['categoryID']==$row0['categoryID']) echo 'selected="selected"';
				echo '>'.$row0['categoryName'].'</option>';	
			}
		  ?>
        </select></td>
      </tr>
      
      <tr>
        <td colspan="2"><div id="msg"></div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="Update" id="Update" value="تعديل" />
          <input type="reset" name="Reset" id="Reset" value="الغاء" /></td>
      </tr>
    </table>
    </form>
    <?php 
		if(isset($_REQUEST['Update']))
		{
			$file_name=$_FILES["photo"]["name"];
			$file_tmp=$_FILES["photo"]["tmp_name"];
			
			if($file_name=="")
			{
				$sql="update products set productName='".$_REQUEST['productName']."',
												price=".$_REQUEST['price'].",
												categoryID=".$_REQUEST['categoryID']." 
					where productID=".$_REQUEST['productID'];
			}
			else
			{
				move_uploaded_file($file_tmp,"images/products/".$file_name);
				$sql="update products set productName='".$_REQUEST['productName']."',
												price=".$_REQUEST['price'].",
												categoryID=".$_REQUEST['categoryID'].",
												photo='".$file_name."' 
					where productID=".$_REQUEST['productID'];
			}
			
			$query=mysql_query($sql);
			header("Location:show_products_admin.php");

		}
	?>
</div>
</div>

<?php include("footer.php");?>

<script type="text/javascript">
	$(document).ready(function(e) {
        $("#Update").click(function(){
			if($("#productName").val()=="")
			{
				$("#msg").html("ادخل اسم المنتج").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if(!isNaN($("#productName").val()))
			{
				$("#msg").html("ادخل قيمة نصية للمنتج").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if($("#price").val()=="")
			{
				$("#msg").html("ادخل سعر المنتج").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if($("#categoryID").val()==0)
			{
				$("#msg").html("اختر تصنيف المنتج").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
		});
    });
</script>
