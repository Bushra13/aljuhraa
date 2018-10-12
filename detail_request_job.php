<?php include("header.php");?>
<?php include("slide.php");?> 
<?php 
if(isset($_REQUEST['requestID']))
{
	$sql="select 
				u.userID,
				u.fullName,
				u.email,
				u.mobile,
				r.jobTitle,
				r.notes,
				r.educationDegree,
				r.dateCertificate,
				r.specialization,
				r.averageAmount,
				r.stadyType,
				r.averageType,
				date_format(r.dateStartLastJob,'%d/%m/%Y')as dateStartLastJob ,
				date_format(r.dateEndLastJob,'%d/%m/%Y')as dateEndLastJob ,				
				r.lastJobName,
				r.jobPlace,
				r.workHours
		from requestjob r
		left join users u on (u.userID=r.userID)
		where requestID=".$_REQUEST['requestID'];	
	
	$query=mysql_query($sql);
	$row=mysql_fetch_assoc($query);
	
	
}
?>
<div id="container"> 
<div id="details">

    <h3>طلب وظيفة</h3>
<form action="" method="post">
    <table width="68%" border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td>الإسم</td>
        <td><input type="text" name="userID" id="userID" value="<?php echo $row['fullName'];?>"/>
        <input type="hidden" name="userID" value="<?php echo $row['userID'];?>" />
        </td>
      </tr>
      <tr>
        <td>الإيميل</td>
        <td><input type="text" name="email" id="email" value="<?php echo $row['email'];?>"/></td>
      </tr>
      <tr>
        <td>الجوال</td>
        <td><input type="text" name="mobile" id="mobile" value="<?php echo $row['mobile'];?>"/></td>
      </tr>
      <tr>
        <td width="33%">مسمى الوظيفة</td>
        <td width="67%"><input type="text" name="jobTitle" id="jobTitle" value="<?php echo $row['jobTitle'];?>" /></td>
      </tr>
      <tr>
        <td>الدرجة العلمية</td>
        <td><select name="educationDegree" id="educationDegree">
          <option value="0"	<?php if($row['educationDegree']==0) echo 'selected="selected"';?>>اختر الدرجة العلمية</option>
          <option value="1" <?php if($row['educationDegree']==1) echo 'selected="selected"';?>>ابتدائي</option>
          <option value="2" <?php if($row['educationDegree']==2) echo 'selected="selected"';?>>اعدادي</option>
          <option value="3" <?php if($row['educationDegree']==3) echo 'selected="selected"';?>>ثانوي</option>
          <option value="4" <?php if($row['educationDegree']==4) echo 'selected="selected"';?>>جامعي</option>
          <option value="5" <?php if($row['educationDegree']==5) echo 'selected="selected"';?>>دراسات عليا</option>
          <option value="6" <?php if($row['educationDegree']==6) echo 'selected="selected"';?>>اخرى</option>
        </select></td>
      </tr>
      <tr>
        <td>تاريخ الوثيقة العلمية</td>
        <td><input type="text" name="dateCertificate" id="dateCertificate" value="<?php echo $row['dateCertificate'];?>"/></td>
      </tr>
      <tr>
        <td>التخصص</td>
        <td><input type="text" name="specialization" id="specialization" value="<?php echo $row['specialization'];?>"/></td>
      </tr>
      <tr>
        <td>المعدل</td>
        <td><input type="text" name="averageAmount" id="averageAmount" value="<?php echo $row['averageAmount'];?>"/></td>
      </tr>
      <tr>
        <td>نظام الدراسة</td>
        <td><table width="200">
          <tr>
            <td><label>
               <input name="stadyType" type="radio" id="stadyType1" value="1" <?php if($row['stadyType']==1)echo 'checked="checked"';?> />
              منتظم</label></td>
          </tr>
          <tr>
            <td><label>
               <input type="radio" name="stadyType" value="2" id="stadyType2" <?php if($row['stadyType']==2)echo 'checked="checked"';?>/>
              منتسب</label></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td>نوع المعدل</td>
        <td><table width="200">
        <tr>
            <td><label>
              <input type="radio" name="averageType" value="3" id="averageAmount_1" <?php if($row['averageType']==3)echo 'checked="checked"';?> />
              من 100</label></td>
          </tr>
          <tr>
            <td><label>
             <input name="averageType" type="radio" id="averageAmount_0" value="1" <?php if($row['averageType']==1)echo 'checked="checked"';?> />
              من 5</label></td>
          </tr>
          <tr>
            <td><label>
              <input type="radio" name="averageType" value="2" id="averageAmount_1" <?php if($row['averageType']==2)echo 'checked="checked"';?> />
              من 4</label></td>
          </tr>
           
        </table></td>
      </tr>
      
      
    </table>
    <h3>الخبرات السابقة</h3>
    <table width="96%" border="0" cellspacing="3" cellpadding="0">
    <tr>
      <td>مسمى الوظيفة السابقة</td>
      <td><input type="text" name="lastJobName" id="lastJobName" value="<?php echo $row['lastJobName'];?>"/></td>
    </tr>
    <tr>
      <td>تاريخ بدء الوظيفه السابقة</td>
      <td><input type="text" name="dateStartLastJob" id="dateStartLastJob" value="<?php echo $row['dateStartLastJob'];?>" /></td>
    </tr>
    <tr>
      <td>تاريخ نهاية الوظيفة السابقة</td>
      <td><input type="text" name="dateEndLastJob" id="dateEndLastJob"  value="<?php echo $row['dateEndLastJob'];?>"/></td>
    </tr>
    <tr>
      <td>اسم مكان العمل </td>
      <td><input type="text" name="jobPlace" id="jobPlace" value="<?php echo $row['jobPlace'];?>"/></td>
    </tr>
    <tr>
      <td>عدد ساعات العمل</td>
      <td><input type="text" name="workHours" id="workHours" value="<?php echo $row['workHours'];?>"/></td>
    </tr>
    <tr>
    	<td width="24%">ملاحظات</td>
        <td width="76%"><textarea name="notes" id="notes" cols="45" rows="5"><?php echo $row['notes'];?></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="confirm" id="confirm" value="قبول طلب الوظيفة" /><input type="submit" name="regect" id="regect" value="رفض طلب الوظيفة" /></td>
    </tr>
    
    </table>
    </form>

   
</div>
</div>
<?php
	if(isset($_REQUEST['confirm']))
	{
		$sql='select * from users where userID='.$_REQUEST['userID'];
		$query=mysql_query($sql);
		$row=mysql_fetch_assoc($query);
		$mobile=$row['mobile'];
		$userName=$row['userName'];
		$msg="السيد/السيدة ".$userName." لقد تم قبول طلب الوظيفة في مركز الاميرة جواهر مشاعل الخير . نرجو زيارة المقر لاجراء المقابله الشخصية";
		
		makeMessaageSms($mobile,$msg);	
		header("location:hiring.php");
	}
	if(isset($_REQUEST['regect']))
	{
		$sql='select * from users where userID='.$_REQUEST['userID'];
		$query=mysql_query($sql);
		$row=mysql_fetch_assoc($query);
		$mobile=$row['mobile'];
		$userName=$row['userName'];
		$msg="السيد/السيدة ".$userName." نأسف .لقد تم رفض طلب الوظيفة  في مركز الأميرة جواهر مشاعل الخير ";
		
		makeMessaageSms($mobile,$msg);	
		header("location:hiring.php");
	}
	
?>
<?php include("footer.php");?>

