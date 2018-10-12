<?php include("header.php");?>
<div id="container"> 
<?php include("rightMenu.php");?>
<?php 
	if(isset($_REQUEST['requestID']))
	{
		$sql=" select u.fullName,u.userID,u.email,u.mobile,
				m.banktransferamount,
				m.transfernumber,
				m.bankname,
				m.accountnumber,
				m.membershiptype
				from membership m 
				left join users u on (u.userID=m.userID)
				where membershipID=".$_REQUEST['requestID'];
		$query=mysql_query($sql);
		$row=mysql_fetch_assoc($query);
	}
?>
<div id="leftSideCustom">
    <h3>طلب عضوية</h3>
    
    <table width="84%" border="0" cellspacing="3" cellpadding="0">
	
      <tr>
        <td>الأسم</td>
        <td><input type="text" name="userID" id="userID" value="<?php echo $row['fullName'];?>" /></td>
      </tr>
      <tr>
        <td>الايميل</td>
        <td><input type="text" name="email" id="email" value="<?php echo $row['email'];?>" /></td>
      </tr>
      <tr>
        <td>رقم الجوال</td>
        <td><input type="text" name="mobile" id="mobile" value="<?php echo $row['mobile'];?>" /></td>
      </tr>
      <tr>
        <td width="25%">نوع العضوية</td>
        <td width="75%"><select name="membershiptype" id="membershiptype">
          <option value="0" <?php if($row['membershiptype']==0) echo 'selected="selected"';?>>اختر نوع العضوية</option>
          <option value="1" <?php if($row['membershiptype']==1) echo 'selected="selected"';?>>عضوية فخرية 250000 ريال </option>
          <option value="2" <?php if($row['membershiptype']==2) echo 'selected="selected"';?>>عضوية وسام 100000- 250000ريال </option>
          <option value="3" <?php if($row['membershiptype']==3) echo 'selected="selected"';?>>عضوية تميز 60000-100000 ريال </option>
          <option value="4" <?php if($row['membershiptype']==4) echo 'selected="selected"';?>>عضوية الماسية 25000-60000 ريال</option>
          <option value="5" <?php if($row['membershiptype']==5) echo 'selected="selected"';?>>عضوية ذهبية 5000-25000 ريال </option>
          <option value="6" <?php if($row['membershiptype']==6) echo 'selected="selected"';?>>عضوية الأفراد والإنتساب 500 ريال </option>
        </select></td>
      </tr>
      <tr>
        <td>المبلغ المحول</td>
        <td><input type="text" name="banktransferamount" id="banktransferamount" value="<?php echo $row['banktransferamount'];?>" /></td>
      </tr>
      <tr>
        <td>رقم الحواله</td>
        <td><input type="text" name="transfernumber" id="transfernumber" value="<?php echo $row['transfernumber'];?>"/></td>
      </tr>
      <tr>
        <td>اسم البنك</td>
        <td><input type="text" name="bankname" id="bankname" value="<?php echo $row['bankname'];?>"/></td>
      </tr>
      <tr>
        <td>رقم الحساب</td>
        <td><input type="text" name="accountnumber" id="accountnumber" value="<?php echo $row['accountnumber'];?>"/></td>
      </tr>
      
    </table>
    <div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div>
    
</div>
</div>

<?php include("footer.php");?>

