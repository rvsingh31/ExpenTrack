
		<?php
		
			include('remote_sms/way2sms-api.php');
			
		session_start();
		$grp_name= $_SESSION["group_name"];
		$grp_id=$_SESSION["group_id"];
		
	//	echo $grp_name;
	//	echo $grp_id;
		$message="Welcome to ExpenTrack.\n Your Group name is: ".$grp_name."\n and \n group id is:".$grp_id."\n Remember this id and name for log in purpose!.\nThank You";
		include('connection.php');

		$sql="select user_id from groupevent where group_id='$grp_id' and group_name='$grp_name'";
		$result=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($result))
		{
			$id=$row["user_id"];
		//	echo $id."<br>";
			$sql="select contact,email from usersdb where client_id='$id'";
			$r=mysqli_query($conn,$sql);
			$x=mysqli_fetch_assoc($r);
			$contact=$x["contact"];
			$email=$x["email"];
	//		echo $contact."<br>";
			
			    sendWay2SMS ( "8460348865","cannotaccess",$contact,$message);
			//	echo "done sending!"."<br>";
		
		}	
		
			header("location:newgroup.php?msg=Your Group has been created!");
		
		?>
