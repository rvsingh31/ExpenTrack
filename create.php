<?php 
include('connection.php');
	
session_start();

	
	$count=$_GET["no_of_members"];
	$users_array=array();
	for($i=0;$i<$count;$i++)
	{
		$var="user".($i+1);
		array_push($users_array,$_GET[$var]);
		echo $var;
	}
	for($a=0;$a<count($users_array);$a++)
	{
	//	echo $users_array[$a];
		if($users_array[$a]==$_SESSION["username_su"])
		{
			
			header("location:newgroup.php?n=You should not include your own name in the list of group members.Try Again!");
			exit;
		}
	}
	
	array_push($users_array,$_SESSION["username_su"]);
	//echo $_SESSION["client_name"];
	$group_name=ucfirst($_GET["group_name"]);
	

	
$userid_arr=array();
	
	
	for($a=0;$a<$count+1;$a++)
	{
			$name=$users_array[$a];
			$sql="select client_id from usersdb where username='$name'";
			$result=mysqli_query($conn,$sql);
				$row=mysqli_fetch_assoc($result);
						$ans=$row["client_id"];
				array_push($userid_arr,$ans);
			
				
	}
	
	
	$unregistered=array();
	$notAFriend=array();
	for($a=0;$a<count($users_array);$a++)
	{
		$t=$users_array[$a];
		$sql="select * from usersdb where username='$t'";
		$w=mysqli_query($conn,$sql);
		if(mysqli_num_rows($w)>0)
		{
			continue;
		}
		else
		{
			array_push($unregistered,$t);
		}	
	}
	
	
	
	$y=$_SESSION["id"];
	for($a=0;$a<count($userid_arr);$a++)
	{
		$t=$userid_arr[$a];
		if($t!=$y)
		{
			$sq="select * from friends where user_id='$y' and friends_id='$t'";
			$rt=mysqli_query($conn,$sq);
			if(mysqli_num_rows($rt)>0)
			{}
			else
			{
				$sq2="select * from friends where user_id='$t' and friends_id='$y'";
				$rt2=mysqli_query($conn,$sq2);
				if(mysqli_num_rows($rt2)>0)
				{}
				else
				{
							array_push($notAFriend,$users_array[$a]);
				}
			}
		}
	}
	
	if(count($unregistered)!=0)
	{
		$url="newgroup.php?msg=";
		for($a=0;$a<count($unregistered);$a++)
		{
			$url.=$unregistered[$a].",";
		}
		if(count($unregistered)==1)
		{
			$url.=" is an unregistered user.Make sure that he is registered to create a group!";
		}
		else{
			$url.=" are unregistered users.Make sure that they all are registered to create a group!";
		}
		header("location:".$url);
		exit;
	}
	
	if(count($notAFriend)!=0)
	{
		$url="newgroup.php?msg=";
		for($a=0;$a<count($notAFriend);$a++)
		{
			$url.=$notAFriend[$a].",";
		}
		if(count($notAFriend)==1)
		{
			$url.=" is not your friend!Add him/her as your friend in order to create a group!";
		}
		else
		{
			$url.=" are not your friends!Add them as your friends in order to create a group!";
		
		}
		header("location:".$url);
		exit;
	}
	
	
		
	$q="SELECT COUNT(group_id) from groupevent";
	$result=mysqli_query($conn,$q);

	$data=mysqli_fetch_assoc($result);

	//	echo $data['COUNT(group_id)'];
		$val=$data['COUNT(group_id)']-1;
	
	$sql="SELECT * FROM groupevent LIMIT $val,1";
	
	$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($result);
				$d=$row["group_id"];
					$newid=$d+1;
	//				echo "after new id<br>".$newid."<br>";
		
				$_SESSION["group_id"]=$newid;
			$_SESSION["group_name"]=$group_name;
		
		for($a=0;$a<$count+1;$a++)
		{
			$sql="insert into groupevent(group_name,group_id,user_id) values('$group_name','$newid','$userid_arr[$a]')";
		//	echo "final query exe";
			if(mysqli_query($conn,$sql))
			{
			//	echo "final query exe";
				echo "Successfully added!!";
				header("location:newGROUPintermediate.php");
			}
			else
			{
				echo "Could not add";
			}
				
		}
	
	
	
?>
