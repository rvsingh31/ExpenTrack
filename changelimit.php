<?php
	session_start();
	include("connection.php");
	$id=$_SESSION["id"];
	$l=$_POST["limit"];
	$e=0;
	$sql="update singleevent set exp_limit='$l' where client_id='$id'";
	
	if(mysqli_query($conn,$sql))
	{
			header("location:single_event.php?msg=Updated!");
	//	echo "done";
	}
	else
	{
		header("location:single_event.php?msg=Could not update!Technical error.");
	//	echo "failed";
	}
	
?>