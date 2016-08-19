<?php 
session_start();
	$u=$_POST["l_username"];
	$p=$_POST["l_password"];
	
	
	
	echo $u;
	echo "<br>".$p;
	
	

	if(empty($u) || empty($p))
	{
		header("location:login.php?msg=Please enter Login Details");
		exit;
	}
	if(isset($_SESSION["wrong"]) && $_SESSION["wrong"]>=2)
	{
		if($_SESSION["valid"]==="false")
		{
			if($_POST["captcha_log"]=="")
			{
					header("location:login.php?msg=Please enter captcha code");
			}
			else
			{
				header("location:login.php?msg=Please enter right captcha code");
			}
			exit;
		}
		
	}
	
	include('connection.php');
	
	$username=mysqli_real_escape_string($conn,text_input($u));
	$password=mysqli_real_escape_string($conn,text_input($p));
	
		
	echo "<br>".$username;
	echo "<br>".$password;
	
	$sql="SELECT name,client_id from usersdb where username='$username' and password='$password'";
	
	$result=mysqli_query($conn,$sql);
		
		if(mysqli_num_rows($result) > 0)
		{
			$row=mysqli_fetch_assoc($result);
				if(isset($_SESSION["wrong"]))
				{
						unset($_SESSION["wrong"]);
				}
	
			$_SESSION["client_name"]=$row["name"];
			$_SESSION["id"]=$row["client_id"];
			$_SESSION["username_su"]=$username;
			echo "logged_in";
				echo $_SESSION["client_name"];
				$my_file = $_SESSION["client_name"].'_file.txt';
				if(file_exists($my_file))
				{
					unlink($my_file);
				}
		header("location:select_event.php");
		}
		else
		{
			if(isset($_SESSION["wrong"]))
			{
				$g=$_SESSION["wrong"];
				$g=$g+1;
				$_SESSION["wrong"]=$g;
			}
			else
			{
				$_SESSION["wrong"]=1;
			}
		//	header("location:newGROUPintermediate.php");
			 $x= "Please enter correct Username/password!";
			header("location:login.php?msg=".$x);
		//	echo $x;
		}
	
	
	function text_input($variable)
	{
		$variable=trim($variable);
		$varible=stripslashes($variable);
		$variable=htmlspecialchars($variable);
		return $variable;
	}
	
?>