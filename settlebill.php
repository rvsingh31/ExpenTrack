<?php

	session_start();
	if(isset($_GET["money"]) && isset($_GET["name"]))
	{
		$_SESSION["n"]=$_GET["name"];
		$_SESSION["money"]=$_GET["money"];
	}
	else
	{
		exit;
	}
	header("location:groupmain.php?settle=true");
?>