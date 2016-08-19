<?php
include("connection.php");
	include('remote_sms/way2sms-api.php');
		
$message=$_POST["reminder_msg"];

if($message=="")
{
	header("location:friend_bill.php?msg=Message cannot be empty !");
	exit;
}
	session_start();
	$id=$_SESSION["single_friends_id"];
	$sql="select contact from usersdb where client_id=$id";
	$result=mysqli_query($conn,$sql);
	$contact="";
	while($row=mysqli_fetch_assoc($result))
	{
		$contact=$row["contact"];
	}

	    sendWay2SMS ( "8460348865","cannotaccess",$contact,$message);
	
		header("location:friend_bill.php?msg=Sent Reminder !");

?>