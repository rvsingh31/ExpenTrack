<?php
	$money=0;
	if(isset($_POST["money_single"]))
	{
		$money=$_POST["money_single"];
	}
	

	
	
	session_start();
	$note=$_SESSION["single_settle_note"];
	$owe_name=$_SESSION["single_friend_name"];
	if($money>$_SESSION["single_settle_money"])
	{
		header("location:friend_bill.php?settle=true&msg_money=Enter valid amount!");
		exit;
	}
	
include('connection.php');
		
	$user_id=$_SESSION["id"];
	$friends_id=$_SESSION["single_friends_id"];
	if($money===$_SESSION["single_settle_money"])
	{
		$sql="delete from single_friend_expense where user_id='$user_id' and friends_id='$friends_id' and note='$note'";
		if(mysqli_query($conn,$sql))
		{
			echo "settled ie deleted the bill as money= session money<br>";
				unset($_SESSION["single_settle_note"]);
				unset($_SESSION["single_settle_money"]);
				header("location:friend_bill.php?msg=Settled with ".ucfirst($owe_name)." regarding '".$note."' bill!");
			exit;				
		}
	}
	else if($money<$_SESSION["single_settle_money"])
	{
		$v=$_SESSION["single_settle_money"]-$money;
		$sql="update single_friend_expense set expense='$v' where user_id='$user_id' and friends_id='$friends_id' and note='$note'";
		if(mysqli_query($conn,$sql))
		{
			echo "settled ie updated the bill as money= session money<br>";
				unset($_SESSION["single_settle_note"]);
				unset($_SESSION["single_settle_money"]);
			
			header("location:friend_bill.php?msg=Settled with ".ucfirst($owe_name)." regarding '".$note."' with the amount specified!");	
			exit;
		}
	}
	
	
		
?>
	
	