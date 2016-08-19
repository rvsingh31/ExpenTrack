<!--

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
-->
<?php 
	session_start();
	
		$myfile=$_SESSION["client_name"]."_file.txt";
		
		if(file_exists($myfile))
		{
				unlink($myfile);
		}
		session_destroy();
	
	header("location:login.php?msg=Logged Out Successfully!");

?>

<!--
<body>
		<h4 style="color:white">You have been successfully logged out.</h4>
		<h4 style="color:white"><a style="color:red" href="index.php">CLICK HERE </a>to go to the home page.</h4>
</body>

</html>   

-->