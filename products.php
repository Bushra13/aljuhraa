<?php include("header.php");?>
<?php include("slide.php");?>
<?php
		$query = mysql_query("SHOW TABLE STATUS WHERE name='products'"); 
		$row	= mysql_fetch_array($query); 
		 $newID 	= $row["Auto_increment"]; 
	?> 
<div id="container"> 
<div id="details">
    <h3>اضافة منتج</h3>
    <form action="" method="post" enctype="multipart/form-data">
    <table width="78%" border="0" cellspacing="3" cellpadding="0">
      
        <td width="12%">رقم المنتج</td>
        <td width="88%"><input name="productID" type="text" disabled="disabled" id="productID" value="<?php echo $newID;?>" /></td>
      </tr>
      <tr>
        <td>اسم المنتج</td>
        <td><input type="text" name="productName" id="productName" /></td>
      </tr>
      <tr>
        <td>سعر المنتج</td>
        <td><input type="text" name="price"  id="price"/></td>
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
				echo ' <option value="'.$row0['categoryID'].'">'.$row0['categoryName'].'</option>';	
			}
		  ?>
        </select></td>
      </tr>
      
      <tr>
        <td colspan="2"><div id="msg"></div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="Add" id="Add" value="أضافة" />
          <input type="reset" name="Reset" id="Reset" value="الغاء" /></td>
      </tr>
    </table>
    </form>
    <?php 
		if(isset($_REQUEST['Add']))
		{
			$file_name=$_FILES["photo"]["name"];
			$file_tmp=$_FILES["photo"]["tmp_name"];
			move_uploaded_file($file_tmp,"images/products/".$file_name);

			$sql="insert into products(productName,price,categoryID,photo)values('".$_REQUEST['productName']."',".$_REQUEST['price'].",".$_REQUEST['categoryID'].",'".$file_name."')";
		
			$query=mysql_query($sql);
				?>
				<script type="text/javascript">
					$("#msg").css("background","#663");				
                	$("#msg").html("تم إضافة المنتج بنجاح ").slideDown(1000).delay(3000).slideUp(1000);
                </script>
			<?php
			

		}
	?>
</div>
</div>

<?php include("footer.php");?>

<script type="text/javascript">
	$(document).ready(function(e) {
        $("#Add").click(function(){
			if($("#productName").val()=="")
			{
				$("#msg").html("ادخل اسم المنتج").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}
			if(!isNaN($("#productName").val()))
			{
				$("#msg").html("ادخل قيمة نصيف للمنتج").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if($("#price").val()=="")
			{
				$("#msg").html("ادخل سعر المنتج").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if(isNaN($("#price").val()))
			{
				$("#msg").html("سعر المنتج لا بد ان يكون قيمة عددية").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if($("#categoryID").val()==0)
			{
				$("#msg").html("اختر تصنيف المنتج").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if($("#photo").val()=="")
			{
				$("#msg").html("اختر صورة للمنتج").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
		});
    });
</script>