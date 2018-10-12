<?php include("header.php");?>
<?php include("slide.php");?>
<?php
	if(isset($_REQUEST['newsID']))
	{
		$sql="select * from news where newsID=".$_REQUEST['newsID'];
		$query=mysql_query($sql);
		$row=mysql_fetch_assoc($query);
	}
?>
<div id="container"> 
<div id="details">
	<div id="flyimage"><img src="images/news/<?php echo $row['photo'];?>" width="150" height="150"/></div>
    <h3>تعديل خبر</h3>
    <form action="" method="post" enctype="multipart/form-data">
    <table width="78%" border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td width="12%">رقم الخبر</td>
        <td width="88%"><input name="newsID" type="text" disabled="disabled" id="newsID" value="<?php echo $row['newsID']?>" />
        <input type="hidden" name="newsID" value="<?php echo $row['newsID']?>" /></td>
      </tr>
      <tr>
        <td>عنوان الخبر</td>
        <td><input type="text" name="newsTitle" id="newsTitle" value="<?php echo $row['newsTitle']?>" /></td>
      </tr>
      <tr>
        <td>تفاصيل الخبر</td>
        <td><textarea name="newsDetail" cols="58" rows="9" id="newsDetail"><?php echo $row['newsDetail']?></textarea></td>
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
				$sql="update news set newsDate=now(),
									newsTitle='".$_REQUEST['newsTitle']."',
									newsDetail='".$_REQUEST['newsDetail']."'
				 where newsID=".$_REQUEST['newsID'];
			}
			else
			{
				move_uploaded_file($file_tmp,"images/news/".$file_name);
				$sql="update news set newsDate=now(),
									newsTitle='".$_REQUEST['newsTitle']."',
									newsDetail='".$_REQUEST['newsDetail']."',
									photo='".$file_name."'
				 where newsID=".$_REQUEST['newsID'];
			}
			
			$query=mysql_query($sql);
			header("Location:show_news.php");

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
			if(!isNaN($("#newsDetail").val()))
			{
				$("#msg").html("لا بد ان يكون  تفاصيل الخبر نصية").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
		});
    });
</script>