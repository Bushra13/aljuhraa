<?php include("header.php");?>
<?php include("slide.php");?> 
<?php
	if(isset($_REQUEST['reset']))
	{
		?>
			<script type="text/ecmascript" >
            	$(document).ready(function(e) {
                    $("#msg").html("سيتم ارسال الباسورد الجديد الخاص بك على جوالك المسجل لدينا").slideDown(1000).delay(4000).slideUp(1000);
                });
            </script>
		<?php	
	}
?>
<div id="container"> 
	<div id="loginform">
<form action="" method="post">
<table width="100%" border="0" cellspacing="3" cellpadding="0">
  <tr>
    <td width="31%">اسم  المستخدم</td>
    <td width="69%"><input type="text" name="userName" id="userName" /></td>
  </tr>
  <tr>
    <td>كلمة المرور</td>
    <td><input type="password" name="password" id="password" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><a href="reset_password.php">هل فقدت كلمة المرور؟</a></td>
  </tr>
  <tr>
    <td colspan="2"><div id="msg"></div></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="login" id="login" value="دخول" /><input type="reset" name="reset" value="الغاء" /></td>
  </tr>
</table>
</form>
    </div>
</div>    
<?php
	if(isset($_REQUEST['login']))
	{
		$sql="select userID,fullName,userType,date_format(lastAppearance,'%d-%m-%Y')as DatelastAppear, date_format(lastAppearance,'%r') as timelastAppear
			from users 
			where userName='".$_REQUEST['userName']."' and password='".$_REQUEST['password']."'";	
		$query=mysql_query($sql);
		$result=mysql_num_rows($query);
		if($result>0)
		{
			$row=mysql_fetch_assoc($query);
			$_SESSION['userID']=$row['userID'];
			$_SESSION['fullName']=$row['fullName'];
			$_SESSION['userType']=$row['userType'];
			$_SESSION['DatelastAppear']=$row['DatelastAppear'];
			$_SESSION['timelastAppear']=$row['timelastAppear'];
			header("location:index.php");
		}
		else
		{
			?>
			<script type="text/javascript">
            	$("#msg").html("اسم المستخدم وكلمة المرور غير صحيحة").slideDown(1000).delay(3000).slideUp(1000);
            </script>
			<?php	
		}
		
	}
?>
<?php include("footer.php");?>

<script type="text/javascript">
	$(document).ready(function(e) {
		$("#loginform").slideDown(1000);
        $("#login").click(function(){
			if($("#userName").val()=="")
			{
				$("#msg").html("ادخل اسم المستخدم").slideDown(1000).delay(3000).slideUp(1000);
				return false;
			}
			if($("#password").val()=="")
			{
				$("#msg").html("ادخل كلمة المرور").slideDown(1000).delay(3000).slideUp(1000);
				return false;
			}	
		});
    });
</script>