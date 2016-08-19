<?php
	session_start();
	
	$random=md5(rand());
	$captcha_code=substr($random,0,6);
	$_SESSION["captcha"]=$captcha_code;
	$target=imagecreatetruecolor(80,40);
	$captcha_bkd=imagecolorallocate($target,0,0,255);
	imagefill($target,0,0,$captcha_bkd);
	$captcha_txt_c=imagecolorallocate($target,255,255,255);
	imagestring($target,5,5,5,$captcha_code,$captcha_txt_c);
	header("Content-type:image/jpeg");
	imagejpeg($target);
	
?>