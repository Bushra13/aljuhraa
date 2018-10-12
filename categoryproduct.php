<?php include("header.php");?>
<?php include("slide.php");?> 
<?php
		$query = mysql_query("SHOW TABLE STATUS WHERE name='categoryproduct'"); 
		$row	= mysql_fetch_array($query); 
		 $newID 	= $row["Auto_increment"]; 
	?>
<div id="container"> 
<div id="details">
    <h3>اضافة فئات المنتجات</h3>
    <form action="" method="post" enctype="multipart/form-data">
    <table width="61%" border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td width="26%">رقم الفئة</td>
        <td width="74%"><input name="cityID" type="text" disabled="disabled" id="categoryID" value="<?php echo $newID;?>"/></td>
      </tr>
      <tr>
        <td>اسم الفئة</td>
        <td><input type="text" name="categoryName" id="categoryName" /></td>
      </tr>
      <tr>
        <td>صورة الفئة</td>
        <td><input type="file" name="photo" id="photo" /></td>
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
			move_uploaded_file($file_tmp,"images/category/".$file_name);
			$sql="insert into categoryproduct(categoryName,photo)values('".$_REQUEST['categoryName']."','".$file_name."')";
		
			$query=mysql_query($sql);
				?>
				<script type="text/javascript">
					$("#msg").css("background","#663");				
                	$("#msg").html("تم إضافة الفئة بنجاح ").slideDown(1000).delay(3000).slideUp(1000);
                </script>
			<?php
			
		;
		}
	?>
</div>
</div>

<?php include("footer.php");?>

<script type="text/javascript">
	$(document).ready(function(e) {
        $("#Add").click(function(){
			if($("#categoryName").val()=="")
			{
				$("#msg").html("ادخل اسم الفئة").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}
			if(!isNaN($("#categoryName").val()))
			{
				$("#msg").html("ادخل قيمة نصية في اسم الفئة").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if($("#photo").val()=="")
			{
				$("#msg").html("اختر صورة الفئة").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
		});
    });
</script>