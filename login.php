<!DOCTYPE html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Login/Register</title>


  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
	
	<body class=" teal accent-4">
	<nav class="white" role="navigation">
    <div class="nav-wrapper container">
		   <a id="logo-container" href="index.php" class="brand-logo indigo-text" style="display:none;font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif;">ET</a>
	</div>
  </nav>
		<br>
		<div class="container">
			<div class="row">
				<div class="col m5 s12 card-panel hoverable indigo darken-1 reg" >
					<div>
					<h5 class="light white-text" style="padding:3%" > Register Yourself	<i class="material-icons" style="float:right">mode_edit</i></h5>					
					</div>
					
						<form action="registeruser.php"  method="post" id="register">
							<div class="input-field white-text ">
								<input  id="name" type="text"  name="r_name" onblur="validate('r_name')" placeholder="Name">
							</div>
			
							<div class="input-field white-text">
								<input id="username" type="text" name="r_username" onblur="validate('r_username')" placeholder="Username">
							</div>
							
							<div class="input-field white-text">
								<input id="username" type="password" name="r_password" onblur="validate('r_password')" placeholder="Password">
							</div>
								
								<div class="input-field white-text">
								<input id="username" type="password" name="r_repassword" onblur="validate('r_repassword')" placeholder="Password (same as above) " >
							</div>
							
							<div class="input-field white-text">
								<input id="username" type="text" name="r_mail_id" onblur="validate('r_mail_id')" placeholder="Email id" >
							</div>
							
							<div class="input-field white-text">
								<input id="username" type="text" name="r_contact" onblur="validate('r_contact')" placeholder="Contact Number">
							</div>
							<div>
								<img id="cp" src="captcha.php" />
								<button type="button" class="btn btn-info btn-lg" id="generate" style="float:right">Refresh</button>
							</div>
							
							<div class="input-field white-text">
								<input  type="text" id="captcha" type="text" name="captcha" onblur="check_captcha(this.value)" placeholder="Captcha code ( displayed above )">
							</div>
							
							<div>
								<a class="btn" style="float:right" onclick="if(error===false){document.getElementById('register').submit();}else{Materialize.toast('Fill the required details',3000,'rounded');}">Create Account</a>
							</div>
							<br><br><br>
						</form>
			   
					
					
				</div>
				
				<div class="col m2 s12">
				<span id="divider" class="teal darken-3"><h5></h5></span>
				</div>
				
				<div class="col m5 s12 card-panel hoverable indigo darken-1">
					<h5 class="light white-text" style="padding:3%" > Log In	<i class="material-icons" style="float:right">lock</i></h5>
					
					<form action="logincheck.php"  method="post" id="log">
							<div class="input-field white-text ">
								<input  type="text"  id="l_username" name="l_username" placeholder="Username">
							</div>
			
							<div class="input-field white-text">
								<input  type="password" id="l_password" name="l_password" placeholder="Password">
							</div>
							<div>
							<?php
								session_start();
								if(isset($_SESSION["wrong"]))
								{
									$f=$_SESSION["wrong"];
									if($f>=2)
									{
										echo "		<div>
														<img id='cp_log' src='captcha_log.php' />
															<button type='button' id='generate_log' class='btn btn-info btn-lg' style='float:right'>Refresh</button>
													</div>
													<div  class='input-field white-text'>
															<input type='text' name='captcha_log' id='captcha_log' placeholder='enter captcha code...'  onblur='check_captcha_log(this.value)'/>
													</div>
												";
									}
								}
								else
								{
									echo "";
								}
							?>
							</div>
							<div>
								<a class="btn" style="float:right" onclick="check_log()">Log In</a>
							</div>
							<br>
						</form>
							<div class="col s12">
								<a href="#recover" class="modal-trigger" style="color:#cccccc"><h6>Forgot your password?</h6></a>
							</div>
							<br>
							<br>
								
				</div>
				<div id="recover" class="modal modal-fixed-footer">
					<div class="modal-content">
						<h5 class="indigo-text">Change your password</h5>
						<br>
						<div class="input-field indigo-text col s12">
							<input type="text" name="username_pass" id="np" onfocus="clear_txthint()">
							<label for="np">Your current username ?</label>&nbsp;
							<button type="button" onclick="user_ajax_validate()" id="check_provided_user" class="btn waves-effect waves-light">Check Username</button>
							<div id="txthint" style="display:none">
						<!--	<button type="button" onclick="generate()" id="sub_user" class="btn waves-effect waves-light">Submit</button>    -->
							</div>
							<button type="button" onclick="clear_area()" id="change_un" class="btn waves-effect waves-light right" style="display:none">Change username</button>
							<br>
						</div>
						<br>
						<div id="hide" style="display:none">
						<p class="indigo-text" id="dynamic">
						</p>
						<br>
						<div id="otp" class="indigo-text" > 
							<p class="teal-text light">Note : An otp(One Time Password) has been sent on your phone number which is mentioned in your profile !<br>Enter the code here .</p>
							
							<div class="input-field indigo-text col s12">
							
							<input type="text" name="user_pass" id="code_otp">
								<label id="otp">The otp that has been sent to you</label>
								<br>
								<button type="button" onclick="check_otp()" class="btn waves-light waves-effect">Check</button>
							</div>
							<p class="teal-text light">If you dont get the otp password in 2 minutes, click on <strong>RESEND OTP </strong>.</p>
							<button type="button" class="btn right waves-light waves-effect" onclick="send_code()">Resend OTP ?</button>
						</div>
						</div>
						<div class="indigo-text col s12" id="password" style="display:none">
							<?php
							
							//	if(isset($_SESSION["username_validity"]) && $_SESSION["username_validity"]==true)
								//{
									?>
										<form action="changepassword.php" method="post" id="theForm">
											<div class="input-field col s12">  
												<input id="new_p" name="new_p" type="password">
												<label for="new_p">New Password</label>
											</div>											
												<br>
											<div class="input-field col s12">  	
												<input id="p_ag" name="new_p_ag" type="password">
												<label for="p_ag">Mention it again (Same as above !)</label>
											</div>
											<br>
											<div>
												<button type="button" class="btn waves-light waves-effect" onclick="reset_it()">Reset Password</button>
											</div>
										</form>
									<?php
							/*	}
								else
								{
									echo "<p>Enter a valid username and a valid OTP code !</p>";
								}  */
							?>
						</div>
					</div>
					<div class="modal-footer">
						<a href="#!" class=" modal-action modal-close red-text waves-effect waves-green btn-flat">Close</a>
					</div>
				</div>
  
			</div>
		</div>

		
				 <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  
  

	<?php
	if(isset($_GET["msg"]))
	{
		if($_GET["msg"]!==null)
		{
				$data = trim($_GET["msg"]);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
	?>
			<script>
				var result="<?php echo $data; ?>";
				Materialize.toast(result,2000,'rounded');
			</script>
	<?php
		}
	}
	?>
	
		
		
		<script>
		
		function check_log(){
		//	alert("in");
			var n=document.getElementById("l_username").value;
			var p=document.getElementById("l_password").value;
		//	alert("N: "+n+"<br>"+"P: "+p);
			if(n==="" || p==="")
			{
				Materialize.toast('Fill the log in details!',2000,'rounded');
			}
			else
			{
				document.getElementById("log").submit();
			}
		}
		
			$(document).ready(function(){
				$("#generate").click(function(){
				//	alert("in");
						$("#cp").attr("src","captcha.php?r="+Math.random());
				});
				
			});
			
			$(document).ready(function(){
					
				$("#generate_log").click(function(){
				//	alert("in");
						$("#cp_log").attr("src","captcha_log.php?r="+Math.random());
				});
				
			});
			
			

		</script>
	<script>
	
	function check_captcha(str)
	{
		var r = new XMLHttpRequest();
		r.onreadystatechange = function() {
		//	alert(r.readyState);
			if (r.readyState == 4 && r.status == 200) {
				var ou=r.responseText;
				if(ou==="false")
				{
						//	alert("in");
							var d=document.getElementById("captcha").value;
						//	alert(d);
							if(d==="")
							{
							//	alert("in");
							Materialize.toast('Enter captcha code!',2000,'rounded');
							}
							else
							{
									Materialize.toast('Wrong Captcha Code,Try again!',2000,'rounded');	
							}
							
				}
				else
				{
					document.getElementById("err_c").innerHTML="<br>";
				}
    }
  };
		r.open("GET", "validate_c.php?x="+str+"&type=register", true);

	r.send();

	}
	
	function check_captcha_log(str)
	{
		var r = new XMLHttpRequest();
		r.onreadystatechange = function() {
		//	alert(r.readyState);
			if (r.readyState == 4 && r.status == 200) {
				var ou=r.responseText;
				if(ou==="false")
				{
						//	alert("in");
							var d=document.getElementById("captcha_log").value;
						//	alert(d);
							if(d==="")
							{
							//	alert("in");
									Materialize.toast('Enter captcha code!',2000,'rounded');
							}
							else
							{
									Materialize.toast('Wrong Captcha Code,Try again!',2000,'rounded');	
							}
							
				}
    }
  };
			r.open("GET", "validate_c.php?x="+str+"&type=log", true);
	

	r.send();

	}
	
	var error=true;
	function validate(field){
			
				if(field==="r_name")
				{
					//	alert("before");
					var value=document.getElementsByName("r_name")[0].value;
				//	alert("in")	
					if(value==="")
					{
							
						error=true;
					}
					else
					{
						error=false;
					}
				}
				else if(field==="r_username")
				{
					//	alert("before");
					var value=document.getElementsByName("r_username")[0].value;
				//	alert("in")	
					if(value==="")
					{
						error=true;
					}
					else
					{
						error=false;
						document.getElementById("username_td").innerHTML="";
					}
				} 
				else if(field==="r_password")
				{
					//	alert("before");
					var value=document.getElementsByName("r_password")[0].value;
				//	alert("in")	
					if(value==="")
					{
							error=true;
					}
					else
					{
						error=false;
					}
				}
				else if(field==="r_repassword")
				{
					//	alert("before");
					var value=document.getElementsByName("r_password")[0].value;
					var valuecheck=document.getElementsByName("r_repassword")[0].value;
				//	alert("in")	
					if(value==="")
					{
						error=true;
					}
					else if(value!==valuecheck)
					{
						Materialize.toast('Enter password same as above!!',2000,'rounded');
						error=true;
					}
					else if(value===valuecheck)
					{
					}
					else
					{
						error=false;
					}
				}
				else if(field==="r_contact")
				{
					//	alert("before");
					var value=document.getElementsByName("r_contact")[0].value;
				//	alert("in")	
					if(value==="")
					{
						error=true;
					}
					else if(value.match(/\D/g))
					{
							Materialize.toast('Not a valid phone number!',2000,'rounded');
						error=true;
					}
					else
					{
						error=false;
					}
				}
				else if(field==="r_mail_id")
				{
					
					//	alert("before");
					var value=document.getElementsByName("r_mail_id")[0].value;
				//	alert("in")	
					if(value==="")
					{
						error=true;
					}
					else if(validateEmail(value)!==true)
					{
						Materialize.toast('Please enter valid email address',2000,'rounded');
						error=true;
					}
					else
					{
						error=false;
					}
				}
		}
		
		function validateEmail(email) 
		{
			var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(email);
		}
		
		function generate(){
		//	alert("in");
			clear_area();
			var st=document.getElementById("np").value;
			if(st=='')
			{
				Materialize.toast('Enter your current username !',2000,'rounded');
			}
			else
			{
				//	alert("in");
		//	var t;
		 var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
				//	alert(xmlhttp.readyState);
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					var ret = xmlhttp.responseText;
					//	alert(ret);	
				//	display(ret);
				}
			};
        
		xmlhttp.open("GET", "sendpin.php?n="+st, true);
        xmlhttp.send();

					
							$(document).ready(function(){
								$("#sub_user").fadeOut('fast');
								$("#hide").fadeIn('slow');
								$("#change_un").fadeIn('slow');
								Materialize.toast('Code sent !',1000,'rounded');	
							});		
			
			}
			
		}
		
		/*
		function display(str){
		alert("in");
						if(str=='true')
						{
							
						}
						else
						{
								Materialize.toast('Username invalid !',1000,'rounded');	
						}		
		}
	*/
	function clear_area(){
		$(document).ready(function(){
			$("#hide").fadeOut('fast');
			$("#change_un").fadeOut('fast');
			$("#sub_user").fadeIn('slow');
					
		});
			
	
		}
		
		function send_code(){
				var s=document.getElementById("np").value;
		
			 var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					var ret = xmlhttp.responseText;
				//	alert(ret);
					if(ret)
					{
						Materialize.toast('Code sent again!',1000,'rounded');
					}
			
				}
			};
        
		xmlhttp.open("GET", "sendpin.php?n="+s, true);
        xmlhttp.send();
		}
		
		function check_otp(){
			var st=document.getElementById("code_otp").value;
			if(st=='')
			{
				Materialize.toast('Enter the code which you recieved !',2000,'rounded');
			}
			else
			{
				var x= new XMLHttpRequest();
				x.onreadystatechange = function() {
				if (x.readyState == 4 && x.status == 200) {
					var ret = x.responseText;
					if(ret== false)
					{
						Materialize.toast('Code entered isn\'t correct !',2000,'rounded');
					}
					else
					{
						$(document).ready(function(){
							$("#hide").fadeOut();
							$("#change_un").fadeOut();
							$("#password").fadeIn("slow");
						});
					}
				}
			};
        
		x.open("POST", "checkotp.php?code="+st, false);
        x.send();
			}
		}
		var pass_err=true;
		function reset_it(){
			var a=document.getElementById("new_p").value;
			var b=document.getElementById("p_ag").value;
			if( a=='' || b== '')
			{
				Materialize.toast('Enter your new password',2000,'rounded');
			}
			else
			{
						 if(a !=b)
						{
							Materialize.toast('Enter password correctly!',2000,'rounded');
						}
						else
						{
								document.forms['theForm'].submit();
						}
			}	
		}
		
		function user_ajax_validate(){
		//	alert("in");
			var uname=document.getElementById("np").value;
			
			if(uname=='')
			{
				Materialize.toast('Specify username',2000,'rounded');
			}
			else
			{
				 var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
				//	alert("in");
				//		alert( xmlhttp.responseText);
						document.getElementById("txthint").innerHTML = xmlhttp.responseText;
					
								if($.trim(document.getElementById("txthint").innerHTML)=='')
								{
									Materialize.toast('Enter valid username',2000,'rounded');
								}
								else
								{
																	
										$(document).ready(function(){
											$("#check_provided_user").fadeOut('fast');
											$("#sub_user").fadeIn('slow');
											$("#txthint").fadeIn('fast');
										});
								}
								
					
				
					}
				};
				xmlhttp.open("GET", "check_name.php?uname=" + uname, true);
				xmlhttp.send();
				
				
			}
		}
		
		
		function clear_txthint()
		{
			$(document).ready(function(){
				document.getElementById("txthint").innerHTML="";
				$("txt_hint").fadeOut();
					$("#check_provided_user").fadeIn('fast');
			});
		}
	</script>
	
	<script>
	
		
	$(document).ready(function(){
		$("#logo-container").fadeIn(2500);
	});
	
  $(document).ready(function(){
    $('.modal-trigger').leanModal(
	{
		dismissible: false, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      in_duration: 300, // Transition in duration
      out_duration: 200,
	}
	);
	
    $('select').material_select();

  });
	</script>
		
		
	</body>

</html>