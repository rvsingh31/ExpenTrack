<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Home</title>
  
  <link href="css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  
</head>
<body>
	 <nav class="<?php echo $_SESSION["color"]?>">
    <div class="nav-wrapper">
		<ul class="right">
		<li><a href="#" class="<?php if($_SESSION['color']=="yellow" || $_SESSION['color']=="amber"){echo "indigo-text";}else{echo "white-text";}?>	right"><?php  echo $_SESSION["group_name"];?></a></li>
		<li><a href="#" id="logo-container" class="<?php if($_SESSION['color']=="yellow" || $_SESSION['color']=="amber"){echo "indigo-text";}else{echo "white-text";}?> right" style="display:none;font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif;">ET</a></li>
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
		<div class="container"> 
		<div class="row">
			<div class="col s12 m4 card-panel indigo darken-1 white-text">
				<h5 class="white-text">Split Amount</h5>
				<div class="input-field">
					<form action="split.php" method="post" id="split_form">
						<div class="input-field white-text col s12">
							<input type="text" id="amt" name="money" onblur="check()">
							<label for="amt">Amount to be split </label>
						</div>
						
						<div>
							<button type="button" onclick="click_check()" class="btn waves-effect waves-light  <?php echo $_SESSION['color'];?> lighten-1 <?php if($_SESSION['color']=="yellow" || $_SESSION['color']=="amber"){echo "indigo-text";}else{echo "white-text";}?>">Split</button>
						</div>
					</form>
				</div>
			</div>
			<div class="col s12 m5 card-panel right indigo darken-1 white-text" >
				<h5>Group Billings<i class="material-icons right">library_books</i></h5>
				<div class="white-text">
				<br>
				<?php
				include('connection.php');
					$groupid=$_SESSION["group_id"];
					$username=$_SESSION["client_name"];
					$color=$_SESSION["color"];
					if($color=='yellow' || $color=='amber')
					{
						$text="indigo-text";
					}
					else
					{
						$text="white-text";
					}
					
					$sql="select client_id from usersdb where name='$username'";
					$result=mysqli_query($conn,$sql);
					$id="";
					while($row=mysqli_fetch_assoc($result))
					{
						$id=$row["client_id"];
					}
					$sql="select money,owe_id from split_settle where group_id='$groupid' and user_id='$id' ";
					$result=mysqli_query($conn,$sql);
					$owe=array();$m=array();
					while($row=mysqli_fetch_assoc($result))
					{
						array_push($m,$row["money"]);
						array_push($owe,$row["owe_id"]);
					}
					$length=sizeof($owe);
					$arr=array();
					for($a=0;$a<$length;$a++)
					{
						$i=$owe[$a];
						$sql="select name from usersdb where client_id='$i' ";
						$result=mysqli_query($conn,$sql);
						
						$row=mysqli_fetch_assoc($result);
							array_push($arr,$row["name"]);
					}
					$count=sizeof($arr);
					if($count==0)
					{
						echo "<p class='$color-text'>No records of 'Someone owing to you!'</p>";
					}
					for($b=0;$b<$count;$b++)
					{
						echo "<p>".ucfirst($arr[$b])." owes you Rs. ".$m[$b]." <a href='settlebill.php?name=$arr[$b]&money=$m[$b]'><button id='settle_btn' class='btn waves-effect waves-light right $color $text'>Settle</button></a></p><br>";
						
					}
					echo "<br>";
				echo "<h5>Other Way Around<i class='material-icons right'>assignment_late</i></h5>";
					echo "<br>";
					$sql="select money,user_id from split_settle where group_id='$groupid' and owe_id='$id'";
					$result=mysqli_query($conn,$sql);
						$users=array();$user_m=array();
						while($row=mysqli_fetch_assoc($result))
						{
							array_push($user_m,$row["money"]);
							array_push($users,$row["user_id"]);
						}
					$length2=sizeof($users);
					$user_arr=array();
						for($c=0;$c<$length2;$c++)
						{
									$j=$users[$c];
									$sql="select name from usersdb where client_id='$j' ";
									$result=mysqli_query($conn,$sql);
									$row=mysqli_fetch_assoc($result);
										array_push($user_arr,$row["name"]);
						}
						$count2=sizeof($user_arr);
						if($count2==0)
						{
							echo "<p class='$color-text'>No records of 'You owing to someone!'</p>";
						}
						else
						{
								for($d=0;$d<$count2;$d++)
								{
									echo "<p id='owe'>You owe ".ucfirst($user_arr[$d])." Rs ".$user_m[$d]."</p><br>";
								}
						}
						
			?>
				</div>
			</div>
			
			</div>
			<!--SETTLE MODAL-->
			
			<div id="settle" class="modal ">
				<div class="modal-header">
					<h5 class="indigo-text" style="padding:2%"> Settle Bill with <?php echo ucfirst($_SESSION["n"]);?></h5>
				<p style="padding:2%" class="teal-text light">NOTE: Enter the amount that has been paid to you by <strong><?php echo ucfirst($_SESSION["n"]); ?></strong>.
				Initially, the value that appears is the whole bill amount.
				So, if you want to clear the whole bill, just proceed by clicking 'Settle'.</p>
				
				</div>
	
			<div class="modal-content ">
				<div class="input-field col s12 m6 teal-text">
				<form action="settle.php" method="post">
					<div class="input-field">
							<input type="text" name="money_s" id="money_s" value="<?php echo $_SESSION["money"]; ?>" >						
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
  var error=true;
  
  		function check(){
					//	alert("before");
					var value=document.getElementById("amt").value;
				//	alert("in")	
					if(value==="")
					{
							error=true;
						Materialize.toast('Enter the amount',2000,'rounded');
					}
					else if(value.match(/\D/g))
					{
						error=true;
							Materialize.toast('Entered amount is not a number!',3000,'rounded');
				
					}
					else{
						error=false;
					}
				}
		
			function click_check(){
				if(error==false)
				{
					document.getElementById("split_form").submit();
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
				Materialize.toast(result,3000,'rounded');
			</script>
	<?php
		}
	}
	
	?>
	
	<?php
	  $url=$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	 if( strpos($url,"settle=true")!==false)
	 {
		 ?>
		 <script>
	
			$('#settle').openModal(); 
			
		 </script>
	 <?php
	 }
	?>
	</body>


</html>