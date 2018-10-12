<?php include("header.php");?>
<?php include("slide.php");?> 
<div id="container"> 
<div id="details">
    <h3>قامئة طلبات العضويات</h3>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="sohwDetails">
  <tr>
    
    <th width="10%">الرقم</th>
    <th width="20%">المبلغ المحول</th>
    <th width="30%">نوع العضوية</th>
    <th width="20%">تفاصيل</th>
  </tr>
  <?php 
  	$sql="select membershipID,banktransferamount,membershiptype from membership";
	$query=mysql_query($sql);
	$i=1;
	while($row=mysql_fetch_assoc($query))
	{
		echo '
				<tr>
			<td>'.$i.'</td>
			<td>'.$row['banktransferamount'].'</td>
			<td>';
			switch($row['membershiptype'])
			{
				case "1":
					echo "عضوية فخرية 250000 ريال ";
					break;	
				case "2":
					echo "عضوية وسام 100000- 250000ريال ";
					break;	
				case "3":
					echo "عضوية تميز 60000-100000 ريال";
					break;	
				case "4":
					echo "عضوية الماسية 25000-60000 ريال ";
					break;	
				case "5":
					echo "عضوية ذهبية 5000-25000 ريال ";
					break;	
				case "6":
					echo "عضوية الأفراد والإنتساب 500 ريال";
					break;	
			}
			echo'</td>
			<td><a href="detail_request_membership.php?requestID='.$row['membershipID'].'"> <img src="images/detail.png" width="32" height="32" /></a></td>
		  </tr>
		';	
		$i++;
	}
  ?>
  
</table>

   	

</div>
</div>

<?php include("footer.php");?>

