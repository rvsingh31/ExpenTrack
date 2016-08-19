<?php

session_start();

$sess_code=$_SESSION["otp"];

$code_rec=$_REQUEST["code"];

if($sess_code == $code_rec)
{
		echo true;
		$_SESSION["username_validity"]=true;
}
else
{
	echo false;
}

?>