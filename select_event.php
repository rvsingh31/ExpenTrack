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
			<li><a href="#addfriend" class=" white-text modal-trigger tooltipped" data-position="bottom" data-delay="40" data-tooltip="Add Friend"><i class="material-icons">person_add</i></a></li>
		<!--	<li><a href="chat.php" class=" white-text tooltipped" data-position="bottom" data-delay="40" data-tooltip="Conversations"><i class="material-icons">question_answer</i></a></li>  -->
			<li><a href="#" id="logo-container" class="white-text "  style="display:none;font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif;">ET</a></li>
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
		<li><a  id="links" class="red-text text-lighten-2" href="settings.php">Account Settings</a></li>
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
	  	<li><a  id="links" class="red-text text-lighten-2" href="settings.php">Account Settings</a></li>
		<li><a  id="links" class="blue-text text-lighten-2" href="logout.php">Sign Out</a></li>
    
	</ul>
    </div>
  </nav>
  
  
    <main>
	
    <div class="section intro">
  <div class="container">
  
  
  <!--ADD FRIEND ------------------------------------------------>
	<div id="addfriend" class="modal ">
    <div class="modal-header">
		<h5 class="indigo-text" style="padding:2%"> ADD FRIEND</h5>
		
	</div>
	
	<div class="modal-content ">
   	  <div class="input-field col s12 m6">
		
		<div class="input-field">
		<input name="add" type="text" id="add" onfocus="clear_area()">
		<label for="add">Search according to name</label>
		</div>
		
		<div>
			<button type="button" class="btn indigo darken-2 white-text" onclick="search()">Search<i class="material-icons right">search</i></button>
		</div>
	
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
        <!--ADD FRIEND ------------------------------------------------>  
		
		
    <div class="row">
      <div class="col s12 m12">
        <h5 class="header center-on-small-only teal-text">Lets get to know everything!</h5>
		<br>
		<h6 class="header center-on-small-only teal-text">We have two features available for you .</h6>
	  </div>
	 </div>
	 
	 <div class="row">
		<div class="col s12 m6">
			  <div class="card hoverable">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="expenses_daily.jpg">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">Daily Management<i class="material-icons right">more_vert</i></span>
				</div>
				<div class="card-reveal">
				<span class="card-title grey-text text-darken-4">Daily Expenses<i class="material-icons right">close</i></span>
						<p>Here ,you will be asked for the daily ' limit ' you want to set for your everyday expense
						just to keep you updated with the amount of money left to be spent for that very day.  Limit 
						will be asked only once after you log in and then after wards you can change the limit as a 
						secondary option.You can also download a monthly report describing the amount you spent and 
						comparing it with the limit set, whether you saved some money or spent more than the specified amount. </p>
				</div>
			   </div> 
		</div>
		<div class="col s12 m6">
			  <div class="card hoverable">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="expenses_group.jpg">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">Group Management<i class="material-icons right">more_vert</i></span>
				</div>
				<div class="card-reveal">
				<span class="card-title grey-text text-darken-4">Group Expenses<i class="material-icons right">close</i></span>
					<p>Here, you can create a group as per your convenience but one thing to make remember while creating group
					is that the no of members you want to add in your respective group,that number should be EXCLUDING YOU and
					the members you add must be a registered user of ExpenTrack as well as the members you add must be your friends on ExpenTrack .You will receive a text message comprising of your group 
					name and id just for an informative purpose .After you create a group ,there you will get to know the SETTLE
					and SPLIT process and how to use it . </p>
				</div>
			   </div> 
		</div>
	 </div>
  
	<div class="row">
		<br>
			<h6 class="header center-on-small-only teal-text">Two points that you need to understand before creating any group! </h6>
		<br>
	</div>
	
	
	 <div class="row">
		<div class="col s12 m6">
			  <div class="card hoverable">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="split_bill.png">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">Split Bills<i class="material-icons right">more_vert</i></span>
				</div>
				<div class="card-reveal">
				<span class="card-title grey-text text-darken-4">Split Expenses <i class="material-icons right">close</i></span>
						<p>Here,You can share the bills paid by you on behalf of your whole group .You just need to specify the amount spent by you.</p>
						<p>The amount specified will be automatically divided equally between you and your friends.</p>
						<p>One thing to note is that it also includes you into to the splitting process.So ,keep that in mind and specify the amount.</p>
						<p>In this way ,we are providing you a feature in which you dont need to have a trouble of remembering the money you owe someone.</p>
	
				</div>
			   </div> 
		</div>
		<div class="col s12 m6">
			  <div class="card hoverable">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="settle_bill.png">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">Settle Bills<i class="material-icons right">more_vert</i></span>
				</div>
				<div class="card-reveal">
				<span class="card-title grey-text text-darken-4">Settle Expenses<i class="material-icons right">close</i></span>
					<p>Here,You can settle the bills that is being owed by someone else.You just need to specify the amount and the person who owes you that amount.</p>
					<p>The amount will be settled between you and your friend in no time.</p>
					<p>NOTE: You can only settle the bills that you are owed to, not the one which you owe someone , as a matter of integrity.</p>
					<p>As far as security stands , as explained earlier about the settling process, it is way safer .</p>
				</div>
			   </div> 
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

  </script>
	
	<script>
		function search(){
		//	alert("in");
			var n=document.getElementById("add").value;
			if(n=="")
			{
				Materialize.toast('Enter a name to search!',2000,'rounded');
			}
			else{
						var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("search_results").innerHTML = xmlhttp.responseText;
				$(document).ready(function(){
					
						$("#searchdiv").slideDown("slow");
				});
				
            }
        };
        xmlhttp.open("GET", "search.php?n=" + n, true);
        xmlhttp.send();
		
			}
			
		}
		
		function clear_area()
		{
				$(document).ready(function(){
					
						$("#searchdiv").slideUp("slow");
				});
			setTimeout(function () {
				if (newState == -1) {
					document.getElementById("search_results").innerHTML="";
				}
			}, 2000);	
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