<?php include("header.php");?>
<div id="container"> 
<?php include("rightMenu.php");?>
<div id="leftSideCustom">
    <h3>تسجيل</h3>
    <form action="" method="post">
    <table width="61%" border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td>اسم المستخدم</td>
        <td><input type="text" name="userName" id="userName" /></td>
      </tr>
      <tr>
        <td width="26%">الأسم الكامل</td>
        <td width="74%"><input type="text" name="fullName" id="fullName" /></td>
      </tr>
      <tr>
        <td>الأيميل</td>
        <td><input type="text" name="email" id="email" /></td>
      </tr>
      <tr>
        <td>كلمة المرور</td>
        <td><input type="password" name="password" id="password" /></td>
      </tr>
      <tr>
        <td>تأكيد كلمة المرور</td>
        <td><input type="password" name="re_password" id="re_password" /></td>
      </tr>
      <tr>
        <td>رقم الهاتف</td>
        <td><input type="text" name="tel" id="tel" /></td>
      </tr>
      <tr>
        <td>رقم الجوال</td>
        <td><input type="text" name="mobile" id="mobile" /></td>
      </tr>
      <tr>
        <td>المدينة</td>
        <td><select name="cityID" id="cityID">
          <option value="0">اختر المدينة</option>
          <?php
		  	$sql0="select * from city";
			$query0=mysql_query($sql0);
			while($row0=mysql_fetch_assoc($query0))
			{
				echo '<option value="'.$row0['cityID'].'">'.$row0['cityName'].'</option>';	
			}
		  ?>
        </select></td>
      </tr>
      <tr>
        <td>رقم الهوية</td>
        <td><input type="text" name="identity_number" id="identity_number" /></td>
      </tr>
      <tr>
        <td>االجنس</td>
        <td><table width="200">
          <tr>
            <td><label>
              <input name="gender" type="radio" id="gender_0" value="1" checked="checked" />
              ذكر</label></td>
          </tr>
          <tr>
            <td><label>
              <input name="gender" type="radio" id="gender_1" value="0" checked="checked" />
              انثى</label></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="checkbox" name="acceptCondition" id="acceptCondition" />
          <a href="register_condition.php">الموافقة على الشروط</a></td>
      </tr>
      <tr>
        <td colspan="2"><div id="msg"></div></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="Register" id="Register" value="تسجيل"  disabled="disabled"/>
          <input type="reset" name="Reset" id="Reset" value="الغاء" disabled="disabled"/></td>
      </tr>
    </table>
    </form>
</div>
</div>
<?php
	if(isset($_REQUEST['Register']))
	{
		$sql="insert into users(userName,fullName,email,password,tel,mobile,cityID,identity_number,gender)values('".$_REQUEST['userName']."','".$_REQUEST['fullName']."','".$_REQUEST['email']."','".$_REQUEST['password']."','".$_REQUEST['tel']."','".$_REQUEST['mobile']."',".$_REQUEST['cityID'].",'".$_REQUEST['identity_number']."',".$_REQUEST['gender'].")";
		$query=mysql_query($sql);
		?>
				<script type="text/javascript">
					$("#msg").css("background","#663");				
                	$("#msg").html("تم تسجيلك في الموقع بنجاح").slideDown(1000).delay(3000).slideUp(1000);
                </script>
			<?php
	}
?>
<div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div>
<?php include("footer.php");?>

<script type="text/javascript">
	$(document).ready(function(e) {
        $("#Register").click(function(){
			if($("#userName").val()=="")
			{
				$("#msg").html("ادخل اسم المستخدم").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}
			if(!isNaN($("#userName").val()))
			{
				$("#msg").html("ادخل قيمة نصيف لاسم المستخدم").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}
			
				
			if($("#fullName").val()=="")
			{
				$("#msg").html("ادخل اسم المستخدم كاملا").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if(!isNaN($("#fullName").val()))
			{
				$("#msg").html("ادخل في الاسم الكامل قيمه نصية").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if($("#email").val()=="")
			{
				$("#msg").html("ادخل الايميل").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			
			if($("#email").val().search(/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{0,4}$/))
			{
				$("#msg").html("الرجاء التأكد من صحة الأيميل").slideDown(1000).delay(3000).slideUp(1000);
				return false;
			}
			if($("#password").val()=="")
			{
				$("#msg").html("ادخل كلمة المرور").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			
			if($("#re_password").val()=="")
			{
				$("#msg").html("ادخل تأكيد كلمة المرور").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if($("#password").val()!=$("#re_password").val())
			{
				$("#msg").html("كلمة تأكيد المرور غير متطابقه مع كلمة المرور").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			
			if($("#tel").val()=="")
			{
				$("#msg").html("ادخل رقم الهاتف").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if(isNaN($("#tel").val()))
			{
				$("#msg").html("لابد ان تكون ارقام الهاتف ارقام عددية").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			
			if($("#mobile").val()=="")
			{
				$("#msg").html("ادخل رقم الجوال").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if(isNaN($("#mobile").val()))
			{
				$("#msg").html("لابد ان تكون ارقام الجوال ارقام عددية").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if($("#mobile").val().length<10)
			{
				$("#msg").html("لا بد ان يكون رقم الجوال عشره ارقام").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if($("#mobile").val().length>10)
			{
				$("#msg").html("لا بد ان يكون رقم الجوال عشره ارقام").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			
			if($("#cityID").val()==0)
			{
				$("#msg").html("اختر اسم المدينة").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			
			
			
			if($("#identity_number").val()=="")
			{
				$("#msg").html("ادخل رقم الهوية الوطني").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if(isNaN($("#identity_number").val()))
			{
				$("#msg").html("لابد ان يكون رقم الهوية قيمة عددية").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	

		});
		$("#acceptCondition").change(function(){
			
				$("#Register").removeAttr("disabled");
				$("#Reset").removeAttr("disabled");
			
			
		});
    });
</script>