<?php include("header.php");?> 
<?php include("slide.php");?> 
<div id="container"> 
	<?php include("rightMenu.php");?>
    <div id="leftSide">
        <div id="title">آخر الأخبار</div>
        <div id="subject">
		<?php
        	$sql="select * from news order by newsID desc limit 10";
			$query=mysql_query($sql);
			while($row=mysql_fetch_assoc($query))
			{
				echo '
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="news">
        
						<tr>
							<td colspan="2"><h3>'.$row['newsTitle'].'</h3></td>
						  </tr>
						<tr>
						  <td width="35%" rowspan="2" align="right" valign="top"><img src="images/news/'.$row['photo'].'" width="195" height="129" class="borderImage" /></td>
						  <td width="67%">'.$row['newsDate'].'</td>
						  </tr>
						<tr>
						  <td valign="top">'.substr($row['newsDetail'],0,950).'</td>
						</tr>
						<tr>
						  <td  colspan="2" valign="top" align="left" class="extra" ><a href="detail_news.php?newsID='.$row['newsID'].'">المزيد ...</a></td>
						</tr>
						<tr>
						  <td  >&nbsp;</td>
						</tr>
						</table>
				';	
			}
		?>
        

        </div>
    </div>
</div>    
<?php include("footer.php");?> 