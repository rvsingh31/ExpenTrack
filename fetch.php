<?php 
session_start();
//estalish connection
include('connection.php');
$user=$_SESSION["client_name"];
$sql="select client_id from usersdb where name='$user'";
	$result=mysqli_query($conn,$sql);
			$id="";
			while($row=mysqli_fetch_assoc($result))
			{
				$id=$row["client_id"];
			}
		
	
$sql="select friends_id from friends where user_id='$id'";

$result=mysqli_query($conn,$sql);
	$str=array();
if(mysqli_num_rows($result)>0)
{

	while($row=mysqli_fetch_assoc($result))
	{
		array_push($str,$row["friends_id"]);
	}
}

$sql2="select user_id from friends where friends_id='$id'";

$result2=mysqli_query($conn,$sql2);
if(mysqli_num_rows($result2)>0)
{
	while($row2=mysqli_fetch_assoc($result2))
	{
		array_push($str,$row2["user_id"]);
	}
}

if(count($str)==0)
{
	echo "No Friends to add!";
	exit;
}


for($a=0;$a<count($str);$a++)
{
	$i=$str[$a];
	$s="select username from usersdb where client_id='$i'";
	$res=mysqli_query($conn,$s);
	while($r=mysqli_fetch_assoc($res))
	{
		echo $r["username"].",";
	}
}	


?>
