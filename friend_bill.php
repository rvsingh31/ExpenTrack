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
	 <nav class="<?php echo $_SESSION["single_color"]; ?> darken-1">
    <div class="nav-wrapper">
		<ul class="right">
		<!--	<li><a href="chat.php" class="<?php   if($_SESSION['single_color']=="yellow"){echo "indigo-text";}else{echo "white-text";} ?> tooltipped" data-position="bottom" data-delay="40" data-tooltip="Conversations"><i class="material-icons">question_answer</i></a></li>   -->
			<li><a href="#" id="logo-container" class="<?php   if($_SESSION['single_color']=="yellow"){echo "indigo-text";}else{echo "white-text";} ?> brand-logo right" style="display:none;font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif;">ET</a></li>
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
        <li class="active"><a  class="grey-text text-lighten-2" href="select_event.php">Home</a></li>
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
        <li class="active"><a  class="grey-text text-lighten-2" href="select_event.php">Home</a></li>
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
	  	<li><a  id="links" class="blue-text text-lighten-2" href="logout.php">Sign Out</a></li>
    
	</ul>
    </div>
  </nav>
  
  
    <main>
	
 <div>
  <div class="container">
 
  <div class="row">
	<div class="white-text col card-panel s12 m5 indigo darken-1">
		<div>
			<h5> Paid for <?php if(isset($_SESSION["single_friend_name"])){echo $_SESSION["single_friend_name"];}?></h5>
		</div>
		
		<div class="input-field ">
		<form action="single_friend_exp.php" method="post">
		<div class="input-field">
		<input name="money_single" type="text" id="m_s">
			<label for="m_s">How much did you pay?</label>
		</div>
		
		<div class="input-field">
		<i class="material-icons prefix">assignment</i>
		<input name="note_single" type="text" id="m_s">
			<label for="m_s">What for?</label>
		</div>
		
		<div>
			<button type="submit" class="btn <?php echo $_SESSION["single_color"]; ?> <?php if($_SESSION['single_color']=="yellow"){echo "indigo-text";}else{echo "white-text";}?> right">Add a Bill</button>
		</div>
		</form>
	  </div>
	</div>
	
	<div class="card-panel white-text col s12 m6 right indigo darken-1">
		<h5>Pending Bills </h5>
		<br>
	<div>
	<?php
		include("connection.php");
		$i=$_SESSION["id"];
		$f=$_SESSION["single_friends_id"];
		$sql="select * from single_friend_expense where user_id=$i and friends_id=$f";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0)
		{
			$c=$_SESSION["single_color"];
			if($c=="yellow")
			{
				$t="indigo-text";
			}
			else
			{
				$t="white-text";
			}
			while($row=mysqli_fetch_assoc($result))
			{
				$m=$row["expense"];
				$not=$row["note"];
				echo "<fieldset class='light' style='border-color:$c;'><legend>Lent Rs.".$m." for '".$not."'</legend><span><a href='settle_with_friend.php?money=$m&note=$not'><button class='btn waves-effect $t left $c text-darken-2 waves-light'>Settle</button></a> <a href='#remind' class='modal-trigger'><button class='btn waves-effect right $t text-darken-2 $c waves-light'>Send Reminder</button></a></span></fieldset><br>";
				
			}
		}
		else
		{
			$c=$_SESSION["single_color"];
			$n=$_SESSION["single_friend_name"];
			echo "<p class='$c-text'>".ucfirst($n)." did not borrow money from you !</p>";
		}
	?>
	</div>
	<div>
	<h5>Other Way Around</h5>
	<br>
	<?php
		$i=$_SESSION["id"];
		$f=$_SESSION["single_friends_id"];
		$sql="select * from single_friend_expense where user_id=$f and friends_id=$i";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0)
		{
			$c=$_SESSION["single_color"];
			if($c=="yellow")
			{
				$t="indigo-text";
			}
			else
			{
				$t="white-text";
			}
			while($row=mysqli_fetch_assoc($result))
			{
				$m=$row["expense"];
				$not=$row["note"];
				echo "<p class='light' style='border-color:$c;'><legend>Borrowed Rs.".$m." for '".$not."'</p><br>";
				
			}
		}
		else
		{
			$c=$_SESSION["single_color"];
			$n=$_SESSION["single_friend_name"];
			echo "<p class='$c-text'>You did not borrow money from ".ucfirst($n)." !</p>";
		}
	?>

	</div>
	</div>
  </div>
	
  
	 <!---INVITE FRIENDS ---------->
	   
	   
	   <div id="invite" class="modal ">
    <div class="modal-header">
		<h5 class="indigo-text" style="padding:2%"> Send An Invitation</h5>
		
	</div>
	
	<div class="modal-content ">
   	  <div class="input-field col s12 m6">
		<form action="invite_friends.php" id="invitation">
		<div class="input-field">
		<input name="to" type="email" id="mail" class="validate">
		<label for="mail" data-error="Invalid mail address">Mail Address of your friend</label>
		</div>
		<br>
		
		<div>
			<button type="submit" class="btn indigo darken-2 white-text">Invite !</button>
		</div>
		</form>
	  </div>
	  
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect red-text waves-green btn-flat">Close</a>
    </div>
  </div>
      
	   
	   
	   <!---INVITE FRIENDS ---------->
	   
	   <!--SETTLE MODAL-->
			
			<div id="single_settle" class="modal ">
				<div class="modal-header">
					<h5 class="indigo-text" style="padding:2%"> Settle Bill with <?php echo ucfirst($_SESSION["single_friend_name"]);?> of '<?php echo $_SESSION["single_settle_note"];?>'</h5>
				<p style="padding:2%" class="teal-text light">NOTE: Enter the amount that has been paid to you by <strong><?php echo ucfirst($_SESSION["single_friend_name"]); ?></strong>.
				Initially, the value that appears is the whole bill amount.
				So, if you want to clear the whole bill, just proceed by clicking 'Settle'.</p>
				
				</div>
	
			<div class="modal-content ">
				<div class="input-field col s12 m6 teal-text">
				<form action="single_friend_settle.php" method="post">
					<div class="input-field">
							<input type="text" name="money_single" id="money_s" value="<?php echo $_SESSION["single_settle_money"]; ?>" >						
					<label for="money_s">Bill</label>
					</div>
			
					<div>
						<button type="submit" class="btn indigo darken-2 white-text" >Settle<i class="material-icons right">clear_all</i></button>
					</div>
				</form>
				</div>
			<div class="output" id="searchdiv" style="display:none">
				<ul class="collection" id="search_results">
				</ul>
				</div>
				</div>
				<div class="modal-footer">
					<a href="#!" class=" modal-action modal-close waves-effect red-text waves-green btn-flat">Close</a>
				</div>
			</div>
			<!--SETTLE MODAL-->
		
			
	 <!---SEND A REMINDER ---------->
	   
	   
	   <div id="remind" class="modal ">
    <div class="modal-header">
		<h5 class="indigo-text" style="padding:2%"> Send A Reminder </h5>
			<p style="padding:2%" class="teal-text light">NOTE: Below given is the pre-typed message that will be sent to your friend . If you want ,you can do some changes or else ,proceed by pressing <strong>'SEND'</strong>.</p>
				
	</div>
	
	<div class="modal-content ">
   	  <div class="input-field col s12 m6">
		<form action="reminder.php" method="post">
		<div class="input-field">
		<textarea  class="materialize-textarea" name="reminder_msg" type="text" id="msg">
			<?php
				echo "Hi ".$_SESSION["single_friend_name"].",\n I want to remind you that you have some unsettled bills with me on ExpenTrack.I hope you will settle them on our next meet.\nThank You,\n".$_SESSION["client_name"] ;
			?>
		</textarea>
		<label for="msg">Message for your friend</label>
		</div>
		<br>
		
		<div>
			<button type="submit" class="btn indigo darken-2 white-text">Send <i class="material-icons right">send</i></button>
		</div>
		</form>
	  </div>
	  
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect red-text waves-green btn-flat">Close</a>
    </div>
  </div>
      
	   
	   
	   <!---SEND A REMINDER---------->
	
	 
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
	  
  });
	
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
	
	<?php
	  $url=$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	 if( strpos($url,"single_settle=true")!==false)
	 {
		 ?>
		 <script>
	
			$('#single_settle').openModal(); 
			
		 </script>
	 <?php
	 }
	?>
	
	
	</body>


</html>