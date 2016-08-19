<?php
	
	$arr=$_REQUEST["array"];
include('connection.php');
	$a=explode(",",$arr);
	$send=array();
	for($i=0;$<count($a);$i++)
	{
		$u=$a[$i];
		$sql="select client_id from usersdb where name='$u'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0)
		{
			array_push($u,$send);
		}
	}
	
	if(count($send)==0)
	{
		echo "done";
	}
	else
	{
		for($i=0;$<count($send);$i++)
		{
			echo $send[$i].",";
		}
	}
		
?>
