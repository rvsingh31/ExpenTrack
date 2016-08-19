<?php

$password= $_POST["new_p"];

session_Start();

$un=$_SESSION["change_pass_un"];

include("connection.php");

$sql="update usersdb set password='$password' where username='$un'";

if(mysqli_query($conn,$sql))
{
	
	header("location:login.php?msg=Password reset complete !Login to Continue..");
	exit;
}
else
{
	header("location:login.php?msg=Password cannot be reset due to an error !Try again later.");
	exit;
}
?>