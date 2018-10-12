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
    <h3>طلب وظيفة</h3>
    <form action="" method="post" enctype="multipart/form-data">
    <table width="68%" border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td width="33%">مسمى الوظيفة</td>
        <td width="67%"><input type="text" name="jobTitle" id="jobTitle" /></td>
      </tr>
      <tr>
        <td>الدرجة العلمية</td>
        <td><select name="educationDegree" id="educationDegree">
          <option value="0">اختر الدرجة العلمية</option>
          <option value="1">ابتدائية</option>
          <option value="2">متوسطة</option>
          <option value="3">ثانوية</option>
          <option value="4">جامعية</option>
          <option value="5">دراسات عليا</option>
          <option value="6">اخرى</option>
        </select></td>
      </tr>
      <tr>
        <td>تاريخ الوثيقة العلمية</td>
        <td><input type="text" name="dateCertificate" id="dateCertificate"class="datepicker" /></td>
      </tr>
      <tr>
        <td>التخصص</td>
        <td><input type="text" name="specialization" id="specialization" /></td>
      </tr>
      <tr>
        <td>المعدل</td>
        <td><input type="text" name="averageAmount" id="averageAmount" /></td>
      </tr>
      <tr>
        <td>نظام الدراسة</td>
        <td><table width="200">
          <tr>
            <td><label>
              <input name="stadyType" type="radio" id="stadyType1" value="1" checked="checked" />
              منتظم</label></td>
          </tr>
          <tr>
            <td><label>
              <input type="radio" name="stadyType" value="2" id="stadyType2" />
              منتسب</label></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td>نوع المعدل</td>
        <td><table width="200">
        <tr>
            <td><label>
              <input name="averageType" type="radio" id="averageAmount_0" value="3" checked="checked" />
              من 100</label></td>
          </tr>
          <tr>
            <td><label>
              <input name="averageType" type="radio" id="averageAmount_0" value="1"  />
              من 5</label></td>
          </tr>
          <tr>
            <td><label>
              <input type="radio" name="averageType" value="2" id="averageAmount_1" />
              من 4</label></td>
          </tr>
        </table></td>
      </tr>
      
      
    </table>
    <h3>الخبرات السابقة</h3>
    <table width="96%" border="0" cellspacing="3" cellpadding="0">
    <tr>
      <td>مسمى الوظيفة السابقة</td>
      <td><input type="text" name="lastJobName" id="lastJobName" /></td>
    </tr>
    <tr>
      <td>تاريخ بدء الوظيفة السابقة</td>
      <td><input type="text" name="dateStartLastJob" id="dateStartLastJob" class="datepicker" /></td>
    </tr>
    <tr>
      <td>تاريخ نهاية الوظيفة السابقة</td>
      <td><input type="text" name="dateEndLastJob" id="dateEndLastJob"  class="datepicker"/></td>
    </tr>
    <tr>
      <td>اسم مكان العمل </td>
      <td><input type="text" name="jobPlace" id="jobPlace" /></td>
    </tr>
    <tr>
      <td>عدد ساعات العمل</td>
      <td><input type="text" name="workHours" id="workHours" /></td>
    </tr>
    <tr>
    	<td width="24%">ملاحظات</td>
        <td width="76%"><textarea name="notes" id="notes" cols="45" rows="5"></textarea></td>
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
			$dateCertificateDay=substr($_REQUEST['dateCertificate'],0,2);
			$dateCertificateMon=substr($_REQUEST['dateCertificate'],3,2);
			$dateCertificateYear=substr($_REQUEST['dateCertificate'],6,4);
			$dateCertificate=$dateCertificateYear."/".$dateCertificateMon."/".$dateCertificateDay;
			
			$dateStartLastJobDay=substr($_REQUEST['dateStartLastJob'],0,2);
			$dateStartLastJobMon=substr($_REQUEST['dateStartLastJob'],3,2);
			$dateStartLastJobYear=substr($_REQUEST['dateStartLastJob'],6,4);
			$dateStartLastJob=$dateStartLastJobYear."/".$dateStartLastJobMon."/".$dateStartLastJobDay;
			
			$dateEndLastJobDay=substr($_REQUEST['dateEndLastJob'],0,2);
			$dateEndLastJobMon=substr($_REQUEST['dateEndLastJob'],3,2);
			$dateEndLastJobYear=substr($_REQUEST['dateEndLastJob'],6,4);
			$dateEndLastJob=$dateEndLastJobYear."/".$dateEndLastJobMon."/".$dateEndLastJobDay;
			
			
			$sql="insert into requestjob(
										requestDate,
										userID,
										jobTitle,
										notes,
										educationDegree,
										dateCertificate,
										specialization,
										averageAmount,
										stadyType,
										averageType,
										dateStartLastJob,
										dateEndLastJob,
										lastJobName,
										jobPlace,
										workHours
								)values(
								
										now(),
										".$_SESSION['userID'].",
										'".$_REQUEST['jobTitle']."',
										'".$_REQUEST['notes']."',
										".$_REQUEST['educationDegree'].",
										'".$dateCertificate."',
										'".$_REQUEST['specialization']."',
										".$_REQUEST['averageAmount'].",
										".$_REQUEST['stadyType'].",
										".$_REQUEST['averageType'].",
										'".$dateStartLastJob."',
										'".$dateEndLastJob."',
										'".$_REQUEST['lastJobName']."',
										'".$_REQUEST['jobPlace']."',
										".$_REQUEST['workHours']."
										
								)";

		
			$query=mysql_query($sql);
			?>
				<script type="text/javascript">
					$("#msg").css("background","#663");				
                	$("#msg").html("تمت عملية ادخال طلب الوظيفه بنجاح ").slideDown(1000).delay(3000).slideUp(1000);
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
			if($("#jobTitle").val()=="")
			{
				$("#msg").html("ادخل اسم الوظيفة").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if($("#educationDegree").val()==0)
			{
				$("#msg").html("اختر الدرجة العلمية").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if($("#dateCertificate").val()=="")
			{
				$("#msg").html("اختر تاريخ الوثيقة").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if($("#specialization").val()=="")
			{
				$("#msg").html("ادخل التخصص").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if($("#averageAmount").val()=="")
			{
				$("#msg").html("ادخل المعدل").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if($("#lastJobName").val()=="")
			{
				$("#msg").html("ادخل اسم الوظيفة السابقة").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if($("#dateStartLastJob").val()=="")
			{
				$("#msg").html("ادخل تاريخ البدء بالوظيفة السابقة").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if($("#dateEndLastJob").val()=="")
			{
				$("#msg").html("ادخل تاريخ الانتهاء من الوظيفة السابقة").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if($("#jobPlace").val()=="")
			{
				$("#msg").html("ادخل مكان العمل السابق").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
			if($("#workHours").val()=="")
			{
				$("#msg").html("ادخل ساعات العمل").slideDown(1000).delay(3000).slideUp(1000);
				return false;	
			}	
		});
    });
</script>