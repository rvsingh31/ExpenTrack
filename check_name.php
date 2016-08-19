<?php

	$uname=$_GET["uname"];
	include('connection.php');
	
	$sql="select username from usersdb where username='$uname'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0)
	{
		echo "<button type='button' onclick='generate()' id='sub_user' class='btn waves-effect waves-light'>Submit</button>";
	}
	else
	{
		echo "";
	}
?>