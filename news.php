<?php include("header.php");?>
<?php include("slide.php");?> 
<?php
		$query = mysql_query("SHOW TABLE STATUS WHERE name='news'"); 
		$row	= mysql_fetch_array($query); 
		 $newID 	= $row["Auto_increment"]; 
	?>
<div id="container"> 
<div id="details">
    <h3>اضافة خبر</h3>
    <form action="" method="post" enctype="multipart/form-data">
    <table width="78%" border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td width="12%">رقم الخبر</td>
        <td width="88%"><input name="newsID" type="text" disabled="disabled" id="newsID" value="<?php echo $newID;?>"/></td>
      </tr>
      <tr>
        <td>عنوان الخبر</td>
        <td><input type="text" name="newsTitle" id="newsTitle" /></td>
      </tr>
      <tr>
        <td>تفاصيل الخبر</td>
        <td><textarea name="newsDetail" cols="60" rows="9" id="newsDetail"></textarea></td>
      </tr>
      <tr>
        <td>صورة الخبر</td>
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
			move_uploaded_file($file_tmp,"images/news/".$file_name);

			$sql="insert into news(newsDate,newsTitle,newsDetail,photo)values(now(),'".$_REQUEST['newsTitle']."','".$_REQUEST['newsDetail']."','".$file_name."')";	
			$query=mysql_query($sql);
				?>
				<script type="text/javascript">
					$("#msg").css("background","#663");				
                	$("#msg").html("تم إضافة الخبر بنجاح ").slideDown(1000).delay(3000).slideUp(1000);
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
			if($("#newsTitle").val()=="")
			{
				$("#msg").html("ادخل اسم الخبر").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if(!isNaN($("#newsTitle").val()))
			{
				$("#msg").html("لا بد ان يكون عنوان الخبر نصي").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if($("#newsDetail").val()=="")
			{
				$("#msg").html("ادخل تفاصيل  الخبر").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}
			if($("#photo").val()=="")
			{
				$("#msg").html("اختر صورة الخبر").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if(!isNaN($("#newsDetail").val()))
			{
				$("#msg").html("لا بد ان يكون  تفاصيل الخبر نصية").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
		});
    });
</script>