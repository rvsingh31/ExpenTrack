<?php
session_start();
if(is_numeric($_GET["money"]))
{
		$_SESSION["single_settle_money"]=$_GET["money"];
		$_SESSION["single_settle_note"]=$_GET["note"];	
		header("location:friend_bill.php?single_settle=true");

}
else
{
	header("location:friend_bill.php?msg=Enter appropriate value for money !");

}

?>