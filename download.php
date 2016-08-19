
<?php
session_start();
$un=$_SESSION["client_name"];
$file = $un.'_file.txt';

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
	exit;
	}
	else
	{
		header("location:single_event.php?msg=Create a Report first!");
	}
?>
