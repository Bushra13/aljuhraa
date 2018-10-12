<?php include("header.php");?>
<?php 
	if(isset($_SESSION['userType']))
	{
		if($_SESSION['userType']!=0)
		header("Location:login.php");
	}
	else
	{
		header("Location:login.php");	
	}
?>
<div id="container"> 
<?php include("rightMenu.php");?>
<div id="leftSideCustom">
    <h3>طلب عضوية</h3>
    <form action="" method="post" enctype="multipart/form-data">
    <table width="84%" border="0" cellspacing="3" cellpadding="0">
	عزيزتي/عزيزي الرجاء إتباع الخطوات التالية:<br><br>
	1-قبل البدء التسجيل في عضوية المشاعل الرجاء تحويل مبلغ العضوية على حساب مصرف الراجحي -فرع حي الجامعيين بالدمام (608010044446)<br><br>
	2-أو الضغط على كلمة (بنك الراجحي) و قيام بعملية التحويل من الإنترنت <a href ="http://www.alrajhibank.com.sa/ar/pages/default.aspx">بنك الراجحي </a><br><br>
	3-الرجاء تعبئة النموذج في الأسفل لكي يتم إكمال عملية التسجيل في العضوية .<br><br>
      <tr>
        <td width="25%">نوع العضوية</td>
        <td width="75%"><select name="membershiptype" id="membershiptype">
          <option value="0">اختر نوع العضوية</option>
          <option value="1">عضوية فخرية 250000 ريال </option>
          <option value="2">عضوية وسام 100000- 250000ريال </option>
          <option value="3">عضوية تميز 60000-100000 ريال </option>
          <option value="4">عضوية الماسية 25000-60000 ريال</option>
          <option value="5">عضوية ذهبية 5000-25000 ريال </option>
          <option value="6">عضوية الأفراد والإنتساب 500 ريال </option>
        </select></td>
      </tr>
      <tr>
        <td>المبلغ المحول</td>
        <td><input type="text" name="banktransferamount" id="banktransferamount" /></td>
      </tr>
      <tr>
        <td>رقم الحواله</td>
        <td><input type="text" name="transfernumber" id="transfernumber" /></td>
      </tr>
      <tr>
        <td>اسم البنك</td>
        <td><input type="text" name="bankname" id="bankname" /></td>
      </tr>
      <tr>
        <td>رقم الحساب</td>
        <td><input type="text" name="accountnumber" id="accountnumber" /></td>
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
    <div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div>
    </form>
    <?php
		if(isset($_REQUEST['Add']))
		{
			
			$sql="insert into membership(
										userID,
										banktransferamount,
										transfernumber,
										bankname,
										accountnumber,
										membershiptype
								)values(
								
										".$_SESSION['userID'].",
										".$_REQUEST['banktransferamount'].",
										'".$_REQUEST['transfernumber']."',
										'".$_REQUEST['bankname']."',
										'".$_REQUEST['accountnumber']."',
										".$_REQUEST['membershiptype']."
										
								)";

		
			$query=mysql_query($sql);
			?>
				<script type="text/javascript">
					$("#msg").css("background","#663");				
                	$("#msg").html("تمت عملية ادخال طلب العضوية بنجاح ").slideDown(1000).delay(3000).slideUp(1000);
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
			if($("#membershiptype").val()==0)
			{
				$("#msg").html("الرجاء اختيار العضوية").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			
			if($("#banktransferamount").val()=="")
			{
				$("#msg").html("الرجاء ادخال مبلغ الحوالة").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if($("#transfernumber").val()=="")
			{
				$("#msg").html("ادخل رقم الحوالة").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if($("#bankname").val()=="")
			{
				$("#msg").html("ادخل اسم البنك").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if($("#accountnumber").val()=="")
			{
				$("#msg").html("ادخل رقم الحساب الذي تم التحويل منه").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
				
		});
    });
</script>