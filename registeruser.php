<?php 
	session_start();
	$name=ucfirst($_POST["r_name"]);
	$username=$_POST["r_username"];
//	echo $username;
	$password=$_POST["r_password"];
	$contact=$_POST["r_contact"];
	$mail_id=$_POST["r_mail_id"];
	
	
	if(empty($name) || empty($password)|| empty($username)|| empty($contact)|| empty($mail_id))
	{
		header("location:login.php?msg=Please enter all details to register!");
	}
	else if(!isset($_SESSION["valid"]))
	{
			header("location:login.php?msg=Please enter captcha code!");
	}
	else if( $_SESSION["valid"]==="false" )
	{
		if($_POST["captcha"]==="")
		{
					header("location:login.php?msg=Please enter captcha code!");
		}
		else
		{
					header("location:login.php?msg=Wrong captcha code entered!");
		}
		
	}
else
{
	include('connection.php');
	
	$s="select * from usersdb where  username='$username' ";
			
	$result=mysqli_query($conn,$s);
	if(mysqli_num_rows($result)>0)
	{
			header("location:login.php?msg=Username already exists!");
	//	echo "exists";
	}
	else{
		
	$sql="insert into usersdb(name,username,password,contact,email) values('$name','$username','$password','$contact','$mail_id')";
		
	if(mysqli_query($conn,$sql))
	{		
		header("location:login.php?msg=Account Created!Log in to Continue..");
	//	echo "done";
	}
	else
	{
		echo "FAILED";
	}
}
}
?>