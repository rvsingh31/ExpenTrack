<!DOCTYPE html>
<?php 
		session_start();
		if(isset($_SESSION["client_name"]))
		{}
		else{
					header("location:login.php?msg=Please login to access the site!");
					exit;
		}
			
			
	?>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Home</title>
  
  <link href="css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/sidebar.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  
</head>
<body>
	 <nav class="indigo darken-3">
    <div class="nav-wrapper">
		<ul class="right">
			<li><a href="#" id="logo-container" class="white-text brand-logo right "  style="display:none;font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif;">ET</a></li>
		</ul>
		<a href="#" data-activates="mobile-demo" class="button-collapse white-text"><i class="material-icons">menu</i></a>
      
	   <ul  class="side-nav fixed grey darken-4 blue-grey-text text-lighten-4 go staggered-list"> <br />
    
    <div style="text-align:center;" id="profilepic">
		<h5 id="links" class="indigo-text text-lighten-2">
		<?php
	
			if(isset($_SESSION["client_name"]))
			{
				echo $_SESSION["client_name"];
			}
		?>
		</h5>
    </div> 
        <li><a  class="grey-text text-lighten-2" href="select_event.php">Home</a></li>
		<li><a  id="links" class="blue-text text-lighten-2 modal-trigger" href="#invite">Invite Friends</a></li>
        <li><a id="links" class="pink-text lighten-2" href="single_event.php">Today's Expense</a></li>
        <li><a id="links" class="green-text text-lighten-2" href="newgroup.php">New Group</a></li>
		
		
		<li class="no-padding">
        <ul class="collapsible collapsible-accordion ">
          <li>
            <a id="links" class="collapsible-header  blue-text text-lighten-2">Friends<i class="material-icons right">arrow_drop_down</i></a>
            <div class="collapsible-body">
              <ul class=" grey darken-4 blue-grey-text text-lighten-4">
				<?php
					include("friends.php");
				?>
				</ul>
            </div>
          </li>
        </ul>
      </li>





	<li class="no-padding">
        <ul class="collapsible collapsible-accordion ">
          <li>
            <a id="links" class="collapsible-header  yellow-text text-lighten-2">Groups<i class="material-icons right">arrow_drop_down</i></a>
            <div class="collapsible-body">
              <ul class=" grey darken-4 blue-grey-text text-lighten-4">
				<?php 
					include("groups.php");
				?>
				</ul>
            </div>
          </li>
        </ul>
      </li>
		<li class="active"><a  id="links" class="red-text text-lighten-2" href="settings.php">Account Settings</a></li>
		<li><a  id="links" class="blue-text text-lighten-2" href="logout.php">Sign Out</a></li>
    </ul>
	
	 <ul id="mobile-demo" class="side-nav  grey darken-4 blue-grey-text text-lighten-4 go "> <br />
    
    <div style="text-align:center;" id="profilepic">
		<h5 id="links" class="indigo-text text-lighten-2">
		<?php
		
			if(isset($_SESSION["client_name"]))
			{
				echo $_SESSION["client_name"];
			}
		?>
		</h5>
    </div>
        <li><a  class="grey-text text-lighten-2" href="select_event.php">Home</a></li>
		<li><a  id="links" class="blue-text text-lighten-2 modal-trigger" href="#invite">Invite Friends</a></li>
        <li><a id="links" class="pink-text lighten-2" href="single_event.php">Today's Expense</a></li>
        <li><a id="links" class="green-text text-lighten-2" href="newgroup.php">New Group</a></li>
        
		
		<li class="no-padding">
        <ul class="collapsible collapsible-accordion ">
          <li>
            <a id="links" class="collapsible-header  blue-text text-lighten-2">Friends<i class="material-icons right">arrow_drop_down</i></a>
            <div class="collapsible-body">
              <ul class=" grey darken-4 blue-grey-text text-lighten-4">
				<?php
					include('friends.php');
				?>
              
				</ul>
            </div>
          </li>
        </ul>
      </li>


		
		<li class="no-padding">
        <ul class="collapsible collapsible-accordion ">
          <li>
            <a id="links" class="collapsible-header  yellow-text text-lighten-2">Groups<i class="material-icons right">arrow_drop_down</i></a>
            <div class="collapsible-body">
              <ul class=" grey darken-4 blue-grey-text text-lighten-4 ">
            	<?php
					include('groups.php');
				?>
              
			  
			  </ul>
            </div>
          </li>
        </ul>
      </li>
	  	<li class="active"><a  id="links" class="red-text text-lighten-2" href="settings.php">Account Settings</a></li>
		<li><a  id="links" class="blue-text text-lighten-2" href="logout.php">Sign Out</a></li>
    
	</ul>
    </div>
  </nav>
  
  
    <main>
	
    
		<div class="container">
	<br>
			<div class="row">
				<div class="col s12 m12">
					<h5 class="indigo-text">Account Settings</h5>
				<br>	
					<h6 class="teal-text" style="padding:1%">
						Here, You can make specific changes in your account . Also you can remove your friends ( if you want to ) and
						remove a group .<br>NOTE: Removing a group WON'T send a request to all the group members ,so if you delete the group , without asking other members,
						the group will be deleted !.
					</h6>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m12">
			<h5 class="indigo-text">Personal Information</h5>
				</div>
			</div>

			<div class="row collection" style="border-top:none;border-right:none;border-left:none">
			<li class='collection-item' style='background:#cccccc'><div class="col s12 m4">
					<h6 class="indigo-text">Name</h6>
				</div>
				
				<div class="col s12 m4 center">
				<form action="alter_account.php?sent=<?php echo password_hash("name",PASSWORD_DEFAULT);?>" method="post" id="name_form">
				  <div id="change_name"  style="display:none">	
					<div class="input-field">
						<input class="teal-text" type="text" name="name" id="n"></input>
						<label for="n">New name</label>
					</div>
					<div>
						<button class="btn waves-effect waves-light" type="button" onclick="validate('name')">Save</button>
						&nbsp;
						<button class="btn waves-effect waves-light" type="reset">Cancel</button>
					</div>
					<br>
				  </div>
				</form>
				</div>
				
				<div class="col s12 m4 right">
					<button class="btn waves-light waves-effect" type="button" id="changename">Change <i class="material-icons right">mode_edit</i></button>
				</div>
				</li>
			</div>
				
			<div class="row collection" style="border-top:none;border-right:none;border-left:none">
		<li class='collection-item' style='background:#cccccc'>	<div class="col s12 m4">
					<h6 class="indigo-text">Username</h6>
				</div>
				
				<div class="col s12 m4 center">
				  <div   style="display:none" id="change_username">	
					<form action="alter_account.php?sent=<?php echo password_hash("username",PASSWORD_DEFAULT);?>" method="post" id="username_form">
					<div class="input-field center">
						<input class="teal-text" type="text" name="username" id="un"></input>
						<label for="un"> New username</label>
					</div>
					<div>
						<button class="btn waves-effect waves-light" type="button" onclick="validate('username')">Save</button>
						&nbsp;
						<button class="btn waves-effect waves-light" type="reset">Cancel</button>
					</div>
					<br>
					</form>
				  </div>
				</div>
				
				<div class="col s12 m4 right">
					<button class="btn waves-light waves-effect" type="button" id="changeusername">Change <i class="material-icons right">mode_edit</i></button>
				</div>
				
			</li>
			</div> 
	
			<div class="row collection" style="border-top:none;border-right:none;border-left:none">
		<li class='collection-item' style='background:#cccccc'>
		<div class="col s12 m4">
					<h6 class="indigo-text">Password</h6>
				</div>
				
				<div class="col s12 m4 center">
				 <div  style="display:none" id="change_password">
						<form action="alter_account.php?sent=<?php echo password_hash("password",PASSWORD_DEFAULT);?>" method="post" id="password_form">
					<div class="input-field center">
						<input class="teal-text" type="password" name="password" id="p"></input>
						<label for="p"> New Password</label>
					</div>
					<div>
						<button class="btn waves-effect waves-light" type="button" onclick="validate('password')">Save</button>
						&nbsp;
						<button class="btn waves-effect waves-light" type="reset">Cancel</button>
					</div>
					</form>
					<br>
				  </div>
				</div>
				
				<div class="col s12 m4 right">
					<button class="btn waves-light waves-effect" type="button" id="changepassword">Change <i class="material-icons right">mode_edit</i></button>
				</div>
				
			</li>
			</div>
			
			<div class="row collection" style="border-top:none;border-right:none;border-left:none">
			<li class='collection-item' style='background:#cccccc'>
			<div class="col s12 m4">
					<h6 class="indigo-text">Contact number</h6>
				</div>
				
				<div class="col s12 m4 center">
				<form action="alter_account.php?sent=<?php echo password_hash("contact",PASSWORD_DEFAULT);?>" method="post" id="contact_form">
				  <div  style="display:none" id="change_contact">
					<div class="input-field center">
						<input class="teal-text" type="text" name="contact" id="cont"></input>
						<label for="cont"> Contact number</label>
					</div>
					<div>
						<button class="btn waves-effect waves-light" type="button" onclick="validate('contact')">Save</button>
						&nbsp;
						<button class="btn waves-effect waves-light" type="reset">Cancel</button>
					</div>
					<br>
				  </div>
				  </form>
				</div>
				
				<div class="col s12 m4 right">
					<button class="btn waves-light waves-effect" type="button" id="changecontact">Change <i class="material-icons right">mode_edit</i></button>
				</div>
				</li>
			</div>
			
			<div class="row collection" style="border-top:none;border-right:none;border-left:none">
		<li class='collection-item' style='background:#cccccc'>	
			<div class="col s12 m4">
					<h6 class="indigo-text">Email Address</h6>
				</div>
				
				<div class="col s12 m4 center">
				  <div  style="display:none" id="change_mail">
					<form action="alter_account.php?sent=<?php echo password_hash("mail",PASSWORD_DEFAULT);?>" method="post" id="mail_form">
					<div class="input-field center">
						<input class="teal-text" type="text" name="mail" id="mail"></input>
						<label for="mail"> New mail-id</label>
					</div>
					<div>
						<button class="btn waves-effect waves-light" type="button" onclick="validate('mail')">Save</button>
						&nbsp;
						<button class="btn waves-effect waves-light" type="reset">Cancel</button>
					</div>
					<br>
					</form>
				  </div>
				</div>
				
				<div class="col s12 m4 right">
					<button class="btn waves-light waves-effect" type="button" id="changemail">Change <i class="material-icons right">mode_edit</i></button>
				</div>
				</li>
			</div>
	
			<div class="row">
				<div class="col s12 m12">
					<h5 class="indigo-text">Friends</h5>
					
						<div class="collection s12 m12 indigo-text" style="border:none">
							<?php
								include("connection.php");
								$i=$_SESSION["id"];
								$sql="select friends_id from friends where user_id=$i";
								$fr_id=array();
								$result=mysqli_query($conn,$sql);
								if(mysqli_num_rows($result)>0)
								{
									while($row=mysqli_fetch_assoc($result))
									{
										array_push($fr_id,$row["friends_id"]);
									}
									for($i=0;$i<count($fr_id);$i++)
									{
										$u=$fr_id[$i];
										$s="select name from usersdb where client_id=$u";
										$r=mysqli_query($conn,$s);
										$row=mysqli_fetch_assoc($r);
										$n=$row["name"];
										echo "<li class='collection-item' style='background:#cccccc'>$n <a href='delete_friend.php?i=$fr_id[$i]' class='btn waves-effect waves-light right'>Remove</a></li>";
									}
								}
							
							
								$arr_id=array();
									$sql="select user_id from friends where friends_id='$id'";
									$r=mysqli_query($conn,$sql);
									if(mysqli_num_rows($r)>0)
									{
										while($rw=mysqli_fetch_assoc($r))
										{
											$f_id=$rw["user_id"];
											array_push($arr_id,$f_id);
										}
										for($a=0;$a<count($arr_id);$a++)
										{
												$q="select name from usersdb where client_id='$arr_id[$a]'";
												$r=mysqli_query($conn,$q);
								
											while($rw=mysqli_fetch_assoc($r))
											{		
												$name=ucfirst($rw["name"]);
													echo "<li class='collection-item' style='background:#cccccc'>$name <a href='delete_friend.php?i=$arr_id[$a]' class='btn waves-effect waves-light right'>Remove</a></li>";
											}
										}	
									}
								
							
							?>
						</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col s12 m12">
					<h5 class="indigo-text">Groups</h5>
					
					<div class="collection s12 m12 indigo-text" style="border:none">
							<?php
								include("connection.php");
								$i=$_SESSION["id"];
								$sql="select group_name,group_id from groupevent where user_id=$i";
								$gr_id=array();
								$result=mysqli_query($conn,$sql);
								if(mysqli_num_rows($result)>0)
								{
									while($row=mysqli_fetch_assoc($result))
									{
										$i=$row["group_id"];
										$n=$row["group_name"];
										echo "<li class='collection-item' style='background:#cccccc'>$n <a href='delete_group.php?n=$n&i=$i' class='btn waves-effect waves-light right'>Delete</a></li>";
									}
									
								}
								else
								{
									echo "<li class='collection-item indigo-text' style='background:#cccccc'>No Groups right now ! Please go to home page to add friends !</li>";
								}
							?>
						</div>
				</div>
			</div>
		</div>
    
	</main>
     

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
 
  <script>
  
   $(document).ready(function() {
      Materialize.fadeInImage('#profilepic');
	  Materialize.showStaggeredList('.staggered-list');
	  
	
	 $(".dropdown-button").dropdown(function(){
		 Materialize.showStaggeredList('.staggered-list-2');
	  
	 });
         $('.modal-trigger').leanModal();
        
		
	$("#changename").click(function(){
		$("#change_name").slideToggle();
	});
	
	$("#changeusername").click(function(){
		$("#change_username").slideToggle();
	});
	
	$("#changepassword").click(function(){
		$("#change_password").slideToggle();
	});
	
	$("#changecontact").click(function(){
		$("#change_contact").slideToggle();
	});
	
	$("#changemail").click(function(){
		$("#change_mail").slideToggle();
	});
	
  });

  </script>
	<script>
	
	
	function validateEmail(email) 
		{
			var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(email);
		}
		
		
		
		function validate(str){
			
			
			if(str=='name')
			{
				var n=document.getElementById("n").value;
				if(n!="")
				{
					document.getElementById("name_form").submit();
				}
				else
				{
					Materialize.toast('Input field cannot be empty !',2000,'rounded');
				}
			}
			else if(str=='username')
			{
				var n=document.getElementById("un").value;
				if(n!="")
				{
					document.getElementById("username_form").submit();
				}
				else
				{
					Materialize.toast('Input field cannot be empty !',2000,'rounded');
				}
			}
			else if(str=='password')
			{
				var n=document.getElementById("p").value;
				if(n!="")
				{
					document.getElementById("password_form").submit();
				}
				else
				{
					Materialize.toast('Input field cannot be empty !',2000,'rounded');
				}
			}
			else if(str=='contact')
			{
				var n=document.getElementById("cont").value;
				if(n=="")
				{
						Materialize.toast('Input field cannot be empty !',2000,'rounded');
				}
				else if(n.match(/\D/g))
				{
					Materialize.toast('Not a valid phone number!',2000,'rounded');
				}
				else
				{
						document.getElementById("contact_form").submit();
				}
			}
			else if(str=='mail')
			{
				var n=document.getElementById("mail").value;
				if(n=="")
				{
					Materialize.toast('Input field cannot be empty !',2000,'rounded');
				}
				else if(validateEmail(n)!==true)
				{
					Materialize.toast('Please enter valid email address',2000,'rounded');
				}
				else
				{
							document.getElementById("mail_form").submit();
				}
			}
		}
		
		$(document).ready(function(){
		$("#logo-container").fadeIn(2500);
	});
	</script>
	
	<?php
	if(isset($_GET["msg"]))
	{
		if($_GET["msg"]!==null)
		{
	?>
			<script>
				var result="<?php echo $_GET["msg"] ?>";
				Materialize.toast(result,2000,'rounded');
			</script>
	<?php
		}
	}
	
	?>
	
	
	
	</body>


</html>