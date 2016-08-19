<?php
	include("connection.php");
	
	$name=$_GET["n"];
	$id=$_GET["i"];
	
	echo $name."<br>";
	
	echo $id;
	
	$sql="select * from split_settle where group_id=$id";
	
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0)
	{
		echo "in";
		$s="delete from split_settle where group_id='$id'";
		if(mysqli_query($conn,$s))
		{
			echo "deleted exp";
			
			$t="delete from groupevent where group_id='$id' and group_name='$name'";
			if(mysqli_query($conn,$t))
			{
				echo "deleted entry";
				header("location:settings.php?msg=Deleted '".$name." ' group successfully");
				exit;
			}
			else
			{
				echo "did not delete entry";
				header("location:settings.php?msg=Could not delete due to some error!");
				exit;
			
			}
		}
		else
		{
			echo "did not delete expense";
				header("location:settings.php?msg=Could not delete due to some error!");
				exit;
			
		}
	}
	else
	{
		echo "out";
		
		
			$t="delete from groupevent where group_id='$id' and group_name='$name'";
			if(mysqli_query($conn,$t))
			{
				echo "deleted entry";
				header("location:settings.php?msg=Deleted '".$name." ' group successfully");
				exit;
				
			}
			else
			{
				echo "did not delete entry";
				header("location:settings.php?msg=Could not delete due to some error!");
				exit;
			}
	}
	
	
?>