<?php include("header.php");?>
<?php include("slide.php");?> 
<div id="container"> 
	<div id="loginform">
<form action="" method="post">
<table width="100%" border="0" cellspacing="3" cellpadding="0">
  <tr>
    <td width="31%">الأيميل</td>
    <td width="69%"><input type="text" name="email" id="email" /></td>
  </tr>
  <tr>
    <td colspan="2"><div id="msg"></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="resetpassword" id="resetpassword" value="استعادة كلمة المرور" /></td>
  </tr>
</table>
</form>
    </div>
</div>    
<?php
	if(isset($_REQUEST['resetpassword']))
	{
		$sql="select * from users where email='".$_REQUEST['email']."'";
		$query=mysql_query($sql);
		$result=mysql_num_rows($query);
		if($result>0)
		{
			$row=mysql_fetch_assoc($query);
			$userID=$row['userID'];
			$userName=$row['userName'];
			$email=$row['email'];
			$mobile=$row['mobile'];
			$password=rand(1000,9999);
			$sql2="update users set password='".$password."' where email='".$email."' and userID='".$userID."'";
			$query2=mysql_query($sql2);
			$msg="عزيزتي /الباسورد الخاص بك في موقع مركز الأميرة جواهر ".$password;
		
			makeMessaageSms($mobile,$msg);
			header("location:login.php?reset");
			?>
				
			<?php
			
			
		}
		else
		{
			?>
			<script type="text/javascript">
            	$("#msg").html("الايميل المدخل غير موجود في النظام ").slideDown(1000).delay(3000).slideUp(1000);
            </script>
			<?php	
		}
		
	}
?>
<?php include("footer.php");?>

<script type="text/javascript">
	$(document).ready(function(e) {
		$("#loginform").slideDown(1000);
        $("#resetpassword").click(function(){
			if($("#email").val()=="")
			{
				$("#msg").html("ادخل ايميل المستخدم").slideDown(1000).delay(3000).slideUp(1000);
				return false;
			}
			if($("#email").val().search(/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{0,4}$/))
			{
				$("#msg").html("الرجاء التأكد من صحة الأيميل").slideDown(1000).delay(3000).slideUp(1000);
				return false;
			}
			
		});
    });
</script>