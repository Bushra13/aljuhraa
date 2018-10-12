<?php include("header.php");?>
<?php include("slide.php");?> 
<?php
		$query = mysql_query("SHOW TABLE STATUS WHERE name='city'"); 
		$row	= mysql_fetch_array($query); 
		 $newID 	= $row["Auto_increment"]; 
	?>
<div id="container"> 
<div id="details">
    <h3>إضافة المدن</h3>
    <form action="" method="post">
    <table width="61%" border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td width="26%">رقم المدينة</td>
        <td width="74%"><input name="cityID" type="text" disabled="disabled" id="cityID" value="<?php echo $newID?>" /></td>
      </tr>
      <tr>
        <td>اسم المدينة</td>
        <td><input type="text" name="cityName" id="cityName" /></td>
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
			$sql="insert into city(cityName)values('".$_REQUEST['cityName']."')";	
			$query=mysql_query($sql);
				?>
				<script type="text/javascript">
					$("#msg").css("background","#663");				
                	$("#msg").html("تم إضافة المدينة بنجاح ").slideDown(1000).delay(3000).slideUp(1000);
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