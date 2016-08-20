<?php 
session_start();
	$u=$_POST["l_username"];
	$p=$_POST["l_password"];
	
	
	
	echo $u;
	echo "<br>".$p;
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
	
		$converter = new Encryption;
		$encoded = $converter->encode($password );
	
	$sql="SELECT name,client_id from usersdb where username='$username' and password='$encoded'";
	
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