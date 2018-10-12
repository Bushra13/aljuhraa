<?php include("header.php");?>
<?php include("slide.php");?> 
<div id="container"> 
<div id="details">
    <h3>عرض الاخبار المضافه</h3>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="sohwDetails">
      <tr>
        <th>رقم</th>
        <th>عنوان الخبر </th>
        <th>تاريخ الخبر</th>
        <th>التحديث</th>
        <th>الحذف</th>
      </tr>
      <?php 
		$sql="select * from news";
		$query=mysql_query($sql);
		$i=1;
		while($row=mysql_fetch_assoc($query))
		{
			echo '
				<tr>
					<td>'.$i.'</td>
					<td>'.$row['newsTitle'].'</td>
					<td>'.$row['newsDate'].'</td>
					<td><a href="update_news.php?newsID='.$row['newsID'].'"><img src="images/update.png" width="23" height="23" /></a></td>
					<td><a href="delete_news.php?newsID='.$row['newsID'].'"><img src="images/delete.png" width="23" height="23" /></a></td>
				  </tr>
			';	
			$i++;
		}
	?>
      
      
    </table>
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
		});
    });
</script>