<?php
session_start();

$id=$_SESSION["id"];
$name=$_SESSION["client_name"];
$selction="";
$input="";
	if(password_verify("name",$_REQUEST["sent"]))
	{
		$selection="name";
		$input=$_POST["name"];
		$_SESSION["client_name"]=$input;
	}
	else if(password_verify("username",$_REQUEST["sent"]))
	{
		$selection="username";
		$input=$_POST["username"];
	}
	else if(password_verify("password",$_REQUEST["sent"]))
	{
		$selection="password";
		$input=$_POST["password"];
	}
	else if(password_verify("contact",$_REQUEST["sent"]))
	{
		$selection="contact";
		$input=$_POST["contact"];
	}
	else if(password_verify("mail",$_REQUEST["sent"]))
	{
		$selection="mail";
		$input=$_POST["mail"];
	}
	else
	{
		header("location:settings.php?msg=Inappropriate Selection !");
		exit;
	}
	
	include("connection.php");
	
	if($selection == "name")
	{
		$return="Name changed Successfully !";
		$sql="update usersdb set name='$input' where name='$name' and client_id='$id'";
	}
	else if($selection == "username")
	{
		$return="Username changed Successfully !";
		$sql="update usersdb set username='$input' where name='$name' and client_id='$id'";

	}
	else if($selection == "password")
	{
		$return="Password changed Successfully !";
		$sql="update usersdb set password='$input' where name='$name' and client_id='$id'";
	
	}
	else if($selection == "contact")
	{
		$return="Contact Number changed Successfully !";
		$sql="update usersdb set contact='$input' where name='$name' and client_id='$id'";
	
	}
	else if($selection == "mail")
	{
			$return="Mail id changed Successfully !";
		$sql="update usersdb set email='$input' where name='$name' and client_id='$id'";
	
	}
	
	if(mysqli_query($conn,$sql))
	{
		header("location:settings.php?msg=".$return);
		exit;
	}
	else
	{
		header("location:settings.php?msg=Some techncal error occured !");
		exit;	
	}
?>