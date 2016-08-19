<?php
$note=$_POST["note_single"];

$money=$_POST["money_single"];

if($note=="" || $money=="")
{
	header("location:friend_bill.php?msg=You need to enter details properly to make a bill!");
	exit;
}
$v=is_numeric($money);
if($v==false)
{
	header("location:friend_bill.php?msg=You need to enter details properly to make a bill!");
	exit;
}

session_start();

$friends_name=$_SESSION["single_friend_name"];
$user_id=$_SESSION["id"];

$friends_id=$_SESSION["single_friends_id"];
include("connection.php");

	$sql="insert into single_friend_expense(user_id,friends_id,expense,note) values('$user_id','$friends_id','$money','$note')";
	if(mysqli_query($conn,$sql))
	{
		echo "done";
		header("location:friend_bill.php?msg=Successfully added the bill!");
	}
	else
	{
		echo "error";
			header("location:friend_bill.php?msg=Could not perform the task due to some error!");
	}
?>