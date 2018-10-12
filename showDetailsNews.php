<?php include("header.php");?>
<?php include("slide.php");?>
<div id="container">
	<?php 
		if(isset($_REQUEST['newsID']))
		{
			$sql="select * from news where newsID=".$_REQUEST['newsID'];	
			$query=mysql_query($sql);
			$row=mysql_fetch_assoc($query);
		}
	?>
    <div id="details">
    	<h3><?php echo $row['newsTitle'];?></h3>
        <div><?php echo $row['newsDate'];?></div>
        <p>
            <?php 
				if($row['photo']<>"")
					echo '<img src="images/news/'.$row['photo'].'" width="400" height="300" align="right"  class="myImage"/>';
				echo $row['newsDetail'];
			?>
        </p>
    </div>
</div>
<?php include("footer.php");?>