<?php 
	session_start();
	
	
	$note=$_POST["note"];
	
	$expense=$_POST["expense"];

	$date=$_POST["date"];
	if(empty($date) || empty($note) || empty($expense))
	{
		header("location:single_Event.php?msg=Fill in all the fields to add a bill!");
		exit;
	}
	
	echo "DATE:".$date."<br>".$expense;
	$_SESSION["date"]=$date;
	
	$d=array();
	
	$d=explode("/",$date);
	
		$un=$_SESSION["client_name"];
				include('connection.php');
				$sql="select client_id from usersdb where name='$un'";
				$result=mysqli_query($conn,$sql);
				$row=mysqli_fetch_assoc($result);
				$id=$row["client_id"];
		
	
	$sql="select exp_limit from singleevent where client_id='$id'";
	
	$result=mysqli_query($conn,$sql);

		$row=mysqli_fetch_assoc($result);
		$uplimit=$row["exp_limit"];
	
	
		$sql="insert into singleevent(client_id,note,expense,date,exp_limit) values('$id','$note','$expense','$date','$uplimit')";
		if(mysqli_query($conn,$sql))
		{
			header("location:single_event.php?d=".$date);
		}
		else
		{
			echo "not added";
		}
			
	
?>