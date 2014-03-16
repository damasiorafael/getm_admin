<?php 
	session_start();
	//echo $_REQUEST['captchaAnswer'];
 
	if(strtolower($_REQUEST['captchaAnswer']) == $_SESSION['captcha']){
		//echo $_REQUEST['captcha-answer'];
		echo 'Success';
	} else {
		//echo $_REQUEST['captcha-answer'];
		echo 'Error';
	}
	
 ?>