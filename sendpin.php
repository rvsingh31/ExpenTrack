<?php		
			include('remote_sms/way2sms-api.php');

			include("connection.php");
			
				session_start();
		
		
		$n=$_GET["n"];
		
		 $_SESSION["change_pass_un"]=$n;
			$sql="select contact from usersdb where username='$n'";
			$r=mysqli_query($conn,$sql);
			
			$x=mysqli_fetch_assoc($r);
			$contact=$x["contact"];
			
			$random=md5(rand());
			$code=substr($random,0,6);
			$message="CODE : ".$code."\n Your otp code to alter your account details !";
			$_SESSION["otp"]=$code;
			    sendWay2SMS ( "8460348865","cannotaccess",$contact,$message);
		
			echo "true";
?>