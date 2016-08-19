<?php
	session_start();
	$ty=$_GET["type"];
	$c=$_GET["x"];
	
	if($ty==="log")
	{
		$code=$_SESSION["c"];
	}
	else
	{
		$code=$_SESSION["captcha"];
	}
	
	if($c===$code)
	{
		echo "true";
		$_SESSION["valid"]="true";

	}
	else
	{
		echo "false";
		$_SESSION["valid"]="false";
	}
?>