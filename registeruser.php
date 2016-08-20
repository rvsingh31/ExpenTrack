<?php 
	session_start();
	$name=ucfirst($_POST["r_name"]);
	$username=$_POST["r_username"];
//	echo $username;
	$password=$_POST["r_password"];
	$contact=$_POST["r_contact"];
	$mail_id=$_POST["r_mail_id"];
	
	class Encryption {
    var $skey = "yourSecretKey"; // you can change it

    public  function safe_b64encode($string) {
        $data = base64_encode($string);
        $data = str_replace(array('+','/','='),array('-','_',''),$data);
        return $data;
    }

    public function safe_b64decode($string) {
        $data = str_replace(array('-','_'),array('+','/'),$string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }

    public  function encode($value){ 
        if(!$value){return false;}
        $text = $value;
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->skey, $text, MCRYPT_MODE_ECB, $iv);
        return trim($this->safe_b64encode($crypttext)); 
    }

    public function decode($value){
        if(!$value){return false;}
        $crypttext = $this->safe_b64decode($value); 
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->skey, $crypttext, MCRYPT_MODE_ECB, $iv);
        return trim($decrypttext);
    }
}
	if(empty($name) || empty($password)|| empty($username)|| empty($contact)|| empty($mail_id))
	{
		header("location:login.php?msg=Please enter all details to register!");
	}
	else if(!isset($_SESSION["valid"]))
	{
			header("location:login.php?msg=Please enter captcha code!");
	}
	else if( $_SESSION["valid"]==="false" )
	{
		if($_POST["captcha"]==="")
		{
					header("location:login.php?msg=Please enter captcha code!");
		}
		else
		{
					header("location:login.php?msg=Wrong captcha code entered!");
		}
		
	}
else
{
	include('connection.php');
	
	$s="select * from usersdb where  username='$username' ";
			
	$result=mysqli_query($conn,$s);
	if(mysqli_num_rows($result)>0)
	{
			header("location:login.php?msg=Username already exists!");
	//	echo "exists";
	}
	else{
		$converter = new Encryption;
		$encoded = $converter->encode($password );
	$sql="insert into usersdb(name,username,password,contact,email) values('$name','$username','$encoded','$contact','$mail_id')";
		
	if(mysqli_query($conn,$sql))
	{		
		header("location:login.php?msg=Account Created!Log in to Continue..");
	//	echo "done";
	}
	else
	{
		echo "FAILED";
	}
}
}
?>