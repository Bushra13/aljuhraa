<?php include("header.php");?>
<?php include("slide.php");?>
<div id="container">
<div id="details">
	<div id="msg"></div>

<?php

	if(isset($_REQUEST['cityID']))
	{
		$sql="select * from users where cityID=".$_REQUEST['cityID'];
		$query=mysql_query($sql);
		$result=mysql_num_rows($query);
		if($result>0)
		{
			?>
			<script type="text/javascript">
            	$("#msg").html("لا يمكن حذف المدينة لانها مستخدمه في معلومات بعض المستخدمين").slideDown(1000).delay(3000).slideUp(1000,function(){
					$("#msg").after('<a href="show_cities.php" style="text-align:center;font-size:18px;">عرض المدن المضافه</a>');
					});
				
				
            </script>
			<?php
			
		}	
		else
		{
			$sql="delete from city where cityID=".$_REQUEST['cityID'];
			$query=mysql_query($sql);
			header("Location:show_cities.php");
			
		}
	}
 ?>
 </div>
</div>
<?php include("footer.php");?>