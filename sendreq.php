<?php
	
	$f_name=$_GET["name"];
	$f_id_hash=$_GET["id"];
	
	include("connection.php");
	session_start();
	$user=$_SESSION["client_name"];
	$id=$_SESSION["id"];
	
	$s="insert into friends(user_id,friends_id,request_status) values('$id','$f_id_hash','friends')";
			if(mysqli_query($conn,$s))
			{
				header("location:select_event.php?msg=You and ".$f_name." are now friends!");
			}
			
		
?>