<?php include("header.php");?>
<?php include("slide.php");?> 
<div id="container"> 
<div id="details">
    <h3>قائمة طلبات التوظيف</h3>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="sohwDetails">
  <tr>
    
    <th width="10%">الرقم</th>
    <th width="30%">تاريخ الطلب</th>
    <th width="20%">مسمى الوظيفة</th>
    <th width="20%">التفاصيل</th>
  </tr>
  <?php 
  	$sql="select date_format(requestDate,'%d/%m/%Y') as requestDate,requestID,
				 jobTitle from requestjob";
	$query=mysql_query($sql);
	$i=1;
	while($row=mysql_fetch_assoc($query))
	{
		echo '
				<tr>
			<td>'.$i.'</td>
			<td>'.$row['requestDate'].'</td>
			<td>'.$row['jobTitle'].'</td>
			<td><a href="detail_request_job.php?requestID='.$row['requestID'].'"> <img src="images/detail.png" width="32" height="32" /></a></td>
		  </tr>
		';	
		$i++;
	}
  ?>
  
</table>

   	

</div>
</div>

<?php include("footer.php");?>

