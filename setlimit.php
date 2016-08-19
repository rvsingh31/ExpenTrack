<?php
	$limit=$_POST["limit"];
		include('connection.php');session_start();
		$name=$_SESSION["client_name"];
		$sql="select client_id from usersdb where name='$name'";
				$result=mysqli_query($conn,$sql);
				$row=mysqli_fetch_assoc($result);
				$id=$row["client_id"];
		$sql="insert into singleevent(client_id,exp_limit) values('$id','$limit')";
		if(mysqli_query($conn,$sql))
		{
				header("location:single_event.php");
		}
	
?>