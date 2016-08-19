<?php

session_start();

$_SESSION["single_friend_name"]=$_GET["name"];
$_SESSION["single_friends_id"]=$_GET["id"];
$_SESSION["single_color"]=$_GET["color_single"];
header("location:friend_bill.php");
//$text= "Hi there,".$_SESSION["single_friend_name"]."\n I want to remind you that you have some unsettled bills with me which you can check on ExpenTrack.I hope you will settle them ( wholly or partly ) on our next meet.\nThank You,\n".$_SESSION["client_name"] ;
//$_SESSION["default_msg"]=$text;
?>
