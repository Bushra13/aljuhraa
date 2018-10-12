<?php session_start();?>
<?php include("config.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="images/icon.png"/>
<title>مركز الأميرة جواهر</title>
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<link rel="stylesheet" type="text/css" href="ui_jquery/css/custom-theme/jquery-ui-1.10.3.custom.css" />
<link rel="stylesheet" type="text/css" href="style.css"/>
<script type="text/javascript" src="engine1/jquery.js"></script>
<script type="text/javascript" src="ui_jquery/js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(e) {
		$( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
        $(".TitleMenu").click(function(){
			$(this).css("background","#948e63");
			$(this).children("div .subMenu").show("slow");
		});
		
		 $(".TitleMenu").mouseleave(function(){
			 $(this).css("background","");
			 $(this).children("div .subMenu").hide("slow");
			});
    });
</script>
</head>

<body>
<div id="headLine"></div>
<div id="header">
	<?php
		if(!isset($_SESSION['userID']))
		{
			include("general_nvagation.php");	
		}
		elseif($_SESSION['userType']==0)
		{
			
			include("user_navagation.php");	
		}
		elseif($_SESSION['userType']==1)
		{
			include("admin_navagation.php");
		}
		
	?>
	<div id="logo"></div>
    <?php
	
		if(isset($_SESSION['userID']))
		{
			
			echo '
				<div id="userInformation">
					مرحبا بك : 
					'.$_SESSION['fullName'].'
					<br>
					أخر زياره لك كانت في 
					'.$_SESSION['timelastAppear'].' 
					 في تاريخ 
					 '.$_SESSION['DatelastAppear'].'
					
				</div>
			';	
		}
	?>
    
</div>
<div id="wrap">
<?php

function makeMessaageSms($mo,$msg)
	{
		$mobile=$mo;
		$mobile=substr($mobile,1);
		$mobile="966".$mobile;
		
		$user="s.balkhair";
		$password="123456";
		$sender="Project";
		$message=urlencode($msg);
				$url="http://ssms.ws/sendsms.php?user=".$user."&password=".$password."&numbers=".$mobile."&sender=".$sender."&message=".$message."&lang=ar";
				$content=file_get_contents($url);
			
	}
?>