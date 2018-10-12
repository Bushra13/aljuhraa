<?php include("header.php");?>
<?php include("slide.php");?> 
<div id="container"> 
<div id="details">
	<?php
		if(isset($_REQUEST['cityID']))
		{
			$sql="select * from city where cityID=".$_REQUEST['cityID'];	
			$query=mysql_query($sql);
			$row=mysql_fetch_assoc($query);
			
		}
	?>
    <h3>تعديل المدن</h3>
    <form action="" method="post">
    <table width="61%" border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td width="26%">رقم المدينة</td>
        <td width="74%"><input name="cityID" type="text" disabled="disabled" id="cityID" value="<?php echo $row['cityID'];?>" /></td>
      </tr>
      <tr>
        <td>اسم المدينة</td>
        <td><input type="text" name="cityName" id="cityName" value="<?php echo $row['cityName'];?>"/></td>
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
			$sql="update city set cityName='".$_REQUEST['cityName']."' where cityID=".$_REQUEST['cityID'];	
			$query=mysql_query($sql);
			header("Location:show_cities.php");
		}
	?>
</div>
</div>

<?php include("footer.php");?>

<script type="text/javascript">
	$(document).ready(function(e) {
        $("#Update").click(function(){
			if($("#cityName").val()=="")
			{
				$("#msg").html("ادخل اسم المدينة").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if(!isNaN($("#cityName").val()))
			{
				$("#msg").html("لابد ان تكون اسم المدينة نصية").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
		});
    });
</script>