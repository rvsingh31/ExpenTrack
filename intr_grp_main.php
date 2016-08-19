<?php
session_start();

$_SESSION["group_name"]=$_GET["group"];
$_SESSION["group_id"]=$_GET["id"];
$_SESSION["color"]=$_GET["color"];
header("location:groupmain.php");
?>