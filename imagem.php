<?php
	
	//echo "qualquer coisa";
	session_start();
	//echo session_id();
	header("Expires: Tue, 01 Jan 2099 00:00:00 GMT"); 
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
	header("Cache-Control: no-store, no-cache, must-revalidate"); 
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	
	$chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randomString = '';
	 
	for ($i = 0; $i < 5; $i++) 
	{
	    $randomString .= $chars[rand(0, strlen($chars)-1)];
	}	
	 
	$_SESSION['captcha'] = strtolower( $randomString );
	//echo $_SESSION['captcha'];

	$im = @imagecreatefrompng("images/captcha-bg.png");
	//echo $im;
	
	//imagettftext($im, 20, 0, 25, 25, imagecolorallocate ($im, 255, 255, 255), 'ARIAL', $randomString);
	//echo "OEEEEEEE";
	
	header ('Content-type: image/png');
	imagepng($im, NULL, 0);
	imagedestroy($im);
	
?>