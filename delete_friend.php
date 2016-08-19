<?php

include("connection.php");
	session_start();
	$id=$_GET["i"];
	$c=$_SESSION["id"];
	 $sql="select request_status from friends where user_id = $c and friends_id=$id";
	 $r=mysqli_query($conn,$sql);
	 
	 if(mysqli_num_rows($r)>0)
	 {
		$s="delete from friends where user_id='$c' and friends_id='$id'";
		if(mysqli_query($conn,$s))
		{
			header("location:clear_bills_friend.php?i=$id");
			exit;
		}
		else{
			header("location:settings.php?msg=Could not remove due to an error !");
			exit;
		}
	 }
	 else
	 {
		 $s="delete from friends where user_id='$id' and friends_id='$c'";
		if(mysqli_query($conn,$s))
		{
			header("location:clear_bills_friend.php?i=$id");
			exit;
		}
		else{
			header("location:settings.php?msg=Could not remove due to an error !");
			exit;
		}
	 }
	
?>
