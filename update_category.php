<?php include("header.php");?>
<?php include("slide.php");?> 
<?php
	if(isset($_REQUEST['categoryID']))
	{
		$sql="select * from categoryproduct where categoryID=".$_REQUEST['categoryID'];
		$query=mysql_query($sql);
		$row=mysql_fetch_assoc($query);
	}
?>
<div id="container"> 
<div id="details">
	<div id="flyimage"><img src="images/category/<?php echo $row['photo'];?>" width="150" height="150"/></div>
    <h3>تعديل فئات المنتجات</h3>
    <form action="" method="post" enctype="multipart/form-data">
    <table width="61%" border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td width="26%">رقم الفئة</td>
        <td width="74%"><input name="categoryID" type="text" disabled="disabled" id="categoryID" value="<?php echo $row['categoryID'];?>" />
        <input type="hidden" name="categoryID" value="<?php echo $row['categoryID'];?>" />
        </td>
      </tr>
      <tr>
        <td>اسم الفئة</td>
        <td><input type="text" name="categoryName" id="categoryName" value="<?php echo $row['categoryName'];?>"/></td>
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
				$sql="update categoryproduct set categoryName='".$_REQUEST['categoryName']."' where categoryID=".$_REQUEST['categoryID'] ;

			}
			else
			{	
				move_uploaded_file($file_tmp,"images/category/".$file_name);
				$sql="update categoryproduct set categoryName='".$_REQUEST['categoryName']."',photo='".$file_name."' where categoryID=".$_REQUEST['categoryID'] ;

			}
			$query=mysql_query($sql);
			header("Location:show_category.php");
		}
	?>
</div>
</div>

<?php include("footer.php");?>

<script type="text/javascript">
	$(document).ready(function(e) {
        $("#Update").click(function(){
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
			
		});
    });
</script>