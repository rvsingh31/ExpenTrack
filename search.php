<?php
	session_start();
	$user=$_SESSION["client_name"];
	include("connection.php");
	$sql="select client_id from usersdb where name='$user'";
	$result=mysqli_query($conn,$sql);
			$id="";
			while($row=mysqli_fetch_assoc($result))
			{
				$id=$row["client_id"];
			}
		
	$name=ucfirst($_REQUEST["n"]);
	if($name=="")
	{
		header("select_event.php?msg=Enter a name to search! ");
	}
	$sql="select name,username,contact from usersdb where name='$name'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
		//	echo "<li class='collection-item'>Name: ".$row["name"]."<br>Contact Number: ".$row["contact"]."<a class='secondary-content' href='#'><i class='material-icons'>send</i></a></li>";
			$f_name=$row["name"];
			$f_contact=$row["contact"];
			$f_username=$row["username"];
			if($_SESSION["username_su"]==$row["username"])
			{
				echo "<li class='collection-item'>Name: ".$f_name."<br>Contact Number: ".$f_contact."<a class='secondary-content'>YOU</a></li>";
			}
			else
			{
				$s="select client_id from usersdb where username='$f_username'";
				$r=mysqli_query($conn,$s);
				$f_id="";
				while($row=mysqli_fetch_assoc($r))
				{
					$f_id=$row["client_id"];
				}
				
				
				$q="select request_status from friends where user_id='$id' and friends_id='$f_id'";
				$res=mysqli_query($conn,$q);
				if(mysqli_num_rows($res)>0)
				{
					echo "<li class='collection-item'>Name: ".$f_name."<br>Contact Number: ".$f_contact."<a class='secondary-content' >Friends</a></li>";
				}
				else
				{
						$w="select request_status from friends where user_id='$f_id' and friends_id='$id'";
						$o=mysqli_query($conn,$w);
						if(mysqli_num_rows($o)>0)
						{
							echo "<li class='collection-item'>Name: ".$f_name."<br>Contact Number: ".$f_contact."<a class='secondary-content' >Friends</a></li>";
						}
						else
						{
							$url="sendreq.php?name=".$f_name."&id=".$f_id;
							echo "<li class='collection-item'>Name: ".$f_name."<br>Contact Number: ".$f_contact."<a class='secondary-content' href='$url'><i class='material-icons'>send</i></a></li>";
				
						}
			
				}
			}
			
		}
	}
	else
	{
		echo "<li class='collection-item'>No Results Found</li>";
	}
?>