<?php
	include("connection.php");
	session_start();
	$id=$_GET["i"];
	$c=$_SESSION["id"];
	$sql="select * from single_friend_expense where user_id=$c and friends_id=$id";
	$r=mysqli_query($conn,$sql);
	
	if(mysqli_num_rows($r)>0)
	{
		$y="delete from single_friend_expense where user_id='$c' and friends_id='$id'";
		if(mysqli_query($conn,$y))
		{
				$q="select * from single_friend_expense where user_id=$id and friends_id=$c";
				$t=mysqli_query($conn,$q);
				if(mysqli_num_rows($t)>0)
				{
						$y="delete from single_friend_expense where user_id='$id' and friends_id='$c'";
						if(mysqli_query($conn,$y))
						{
							header("location:settings.php?msg=Removed !");
							exit;
						}
						else
						{
							header("location:settings.php?msg=Could not remove due to an error !");
							exit;
						}
				}
				else
				{
					header("location:settings.php?msg=Removed !");
							exit;
				}
		}
		else
		{
			header("location:settings.php?msg=Could not remove due to an error !");
			exit;
		}
	}
	else
	{
		$q="select * from single_friend_expense where user_id=$id and friends_id=$c";
		$t=mysqli_query($conn,$q);
		if(mysqli_num_rows($t)>0)
		{
				$y="delete from single_friend_expense where user_id='$id' and friends_id='$c'";
				if(mysqli_query($conn,$y))
				{
					header("location:settings.php?msg=Removed !");
					exit;
				}
				else
				{
					header("location:settings.php?msg=Could not remove due to an error !");
					exit;
				}
		}
		else
		{
			
			header("location:settings.php?msg=Removed !");
			exit;
		}
	}
?>