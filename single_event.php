<!DOCTYPE html>
<?php 
		session_start();
		if(isset($_SESSION["client_name"]))
		{}
		else{
					header("location:login.php?msg=Please login to access the site!");
		
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
<body onload="fn()">
	 <nav class="pink">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo white-text right" id="logo-container" style="display:none;font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif;">ET</a>
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
        <li ><a  class="grey-text text-lighten-2" href="select_event.php">Home</a></li>
		 <li class="active"><a id="links" class="pink-text lighten-2" href="single_event.php">Today's Expense</a></li>
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
              <ul class=" grey darken-4 blue-grey-text text-lighten-4">
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
	
	 <ul id="mobile-demo" class="side-nav  grey darken-4 blue-grey-text text-lighten-4 go"> <br />
    
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
		 <li class="active"><a id="links" class="pink-text lighten-2" href="single_event.php">Today's Expense</a></li>
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
	<div class="container">
		<div class="row">
			<div class="col s12 m6 white-text indigo darken-3 card-panel">

			
			<?php
				$un=$_SESSION["client_name"];
			include('connection.php');
			$sql="select client_id from usersdb where name='$un'";
				$result=mysqli_query($conn,$sql);
				$row=mysqli_fetch_assoc($result);
				$id=$row["client_id"];
				$sql="select exp_limit from singleevent where client_id='$id'";
				$result=mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)>0)
				{
					?>
				<div>	
				<h5 class="center white-text light">Today's Expense<i class="material-icons"></i></h5>			
				</div>
				<br>
				<form action="single.php" method="post">
				<div class="input-field col s12">
					<input type="date" placeholder="dd/mm/yyyy" name="date" class="datepicker" onchange="clear_area();disp_exp(this.value)" onfocus="clear_area()">
				</div>
				
				<div class="input-field col s12">
					<input type="text" name="expense" placeholder="0.00">	
				</div>
				
				<div class="input-field col s12">
				<i class="material-icons prefix">assignment</i>
					<input type="text" name="note" id="note">
					<label for="note">Note</label>
				</div>
				
				<div>
				<button type="submit" class="btn right pink">Add</button>
				</div>
				<br>
				</form>
				<?php	
				}
				else
				{
					?>
						<div>
							<form action='setlimit.php' method='post'>
								<div class='input-field white-text col s12'>
									<input type='text' name='limit' id='limit'>
									<label for='limit' class="white-text" >Set Limit for Daily Expense-Supervision</label>
								</div>
								<div>
									<button type="submit" class="btn indigo pink lighten-1 white-text">Submit</button> 
								</div>
								<br>
							</form>
						</div>
				<?php
				}
			?>
			
			
			</div>
			<div class="col s12 m2 white-text indigo darken-3 card-panel">
				
			</div>
			<?php
					if(mysqli_num_rows($result)>0)
					{
			?>
			<div class="col s12 m4 white-text indigo darken-3 card-panel hoverable right">
			<h5 class="center white-text light">Money Spent<i class="material-icons right">insert_chart</i></h5>	
			<br>
			<div class="col s12 white-text" id="exp_div_main">
				<div  id="exp_div">
				<script>
					function disp_exp(str){
						var req = new XMLHttpRequest();
							req.onreadystatechange = function() { //alert(req.readyState);
							if (req.readyState == 4 && req.status == 200) {
									var ou=req.responseText;
								//	alert(ou);
									var arr=new Array();
									arr=ou.split(",");
								//	alert(arr[0]);
								//	alert(arr[1]);
										var a;
										for(a in arr)
										{
										//	alert("in");
											var x=arr[a];
										//	alert(x);
											document.getElementById('exp_div').innerHTML += x;
											$(document).ready(function(){
					
												$("#exp_div_main").slideDown("slow");
											});
										}									
									
							}
						};
								req.open("GET", "display_expense.php?date="+str, true);
								req.send();

					}
					
					function clear_area(){
						
						$(document).ready(function(){
							$("#exp_div_main").slideUp("slow");
						});
						document.getElementById("exp_div").innerHTML="";
					}
					
						function fn()
							{
								var passed_date = location.search.split('d=')[1];
							//	alert(passed_date);
								disp_exp(passed_date);
							}
				</script>
				</div>
			</div>
				
			</div>
			
			<?php
			}
			?>
		
		
		</div>
		
			<div class="fixed-action-btn horizontal bottom">
			<a class="btn-floating btn-large red">
				<i class="large material-icons">menu</i>
			</a>
			<ul>
				<li><a href="#viewreport" class=" btn-floating btn red modal-trigger tooltipped" data-position="top" data-delay="40" data-tooltip="View/Download Report"><i class="material-icons">play_for_work</i></a></li>	
				<li><a href="#makereport" class="btn-floating btn red modal-trigger tooltipped" data-position="top" data-delay="50" data-tooltip="Make a Report" ><i class="material-icons">receipt</i></a></li>
				<li><a href="#alterlimit" class=" btn-floating btn red modal-trigger tooltipped" data-position="top" data-delay="40" data-tooltip="Alter Limit"><i class="material-icons">mode_edit</i></a></li>
			</ul>
			</div>
			
  
	</div>
	
	<!--update limit------------------->
	<div id="alterlimit" class="modal ">
    <div class="modal-header">
		<h5 class="indigo-text" style="padding:2%"> Update Limit</h5>
		<h6 class="teal-text text-lighten-1" style="padding:2%">NOTE: Whatever the value of limit that will be updated,will be used for all the past expenses as well ,in making the report.And the corresponding value will be used used in the future expenses that will be added. </h6>
		
	</div>
	
	<div class="modal-content ">
   	  <div class="input-field col s12 m6">
		<form action="changelimit.php" method="post">
		<div class="input-field">
		<input name="limit" type="text" id="add" >
		<label for="add">Amount to be set as Limit</label>
		</div>
		
		<div>
			<button type="submit" class="btn indigo darken-2 white-text">Update<i class="material-icons right">mode_edit</i></button>
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
		<!--update limit------------------->
 


	<!--report generation------------------->
	<div id="makereport" class="modal bottom-sheet">
    <div class="modal-header">
		<h5 class="indigo-text" style="padding:2%">Generate your Expense Report</h5>
		<h6 class="teal-text text-lighten-1" style="padding:2%">NOTE: You can generate a report of at max 1 month . Do not fill inappropriate dates to avoid errors! </h6>
		
	</div>
	
	<div class="modal-content ">
   	  <div class="input-field col s12 m6">
		<form action="gen_report.php" method="post">
		
		<div class="input-field blue-text">
		<input name="from_date" type="date" id="from_date" class="datepicker" placeholder="From">
		</div>
		
		<div class="input-field blue-text">
		<input name="to_date" type="date" id="to_date" class="datepicker" placeholder="To" onchange="check()" >
		</div>
		
		<div>
			<button type="submit" class="btn indigo darken-2 white-text">Generate<i class="material-icons right">receipt</i></button>
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
		<!--report generation------------------->

<!--view report------------------->
	<div id="viewreport" class="modal">
    <div class="modal-header">
		<h5 class="indigo-text" style="padding:2%">Expense Report</h5>
		<h6 class="teal-text text-lighten-1" style="padding:2%">NOTE: Report Generated only once,Previous report will get deleted everytime you <strong>generate</strong> a new one.</h6>
		
	</div>
	
	<div class="modal-content ">
	 <?php
		$un=$_SESSION["client_name"];
			if(file_exists($un."_file.txt"))
			{
					$handle = fopen($un."_file.txt", "r");
				//$data=fread($handle,filesize("file.txt"));
				 while (($line = fgets($handle)) !== false) {
									echo $line;
									echo "<br>";
						}
					
				
			}
			else
			{
				echo "<p class='indigo-text'>First generate Report!!!</p>";
				
			}
		
		?>
   	 
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect red-text waves-green btn-flat">Close</a>
	   <a href="download.php" class=" modal-action modal-close waves-effect indigo-text waves-green btn-flat">Download</a>
    </div>
  </div>
		<!--view report------------------->

 </main>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  
  <script>
  
  function check(){
		var frm=document.getElementById("from_date").value;
		var to=document.getElementById("to_date").value;
	//	alert(to);
		var frm_arr=new Array();
		frm_arr=frm.split("/");
		
		var to_arr=new Array();
		to_arr=to.split("/");
		
	//	alert(frm_arr[0]);
	//	alert(to_arr[0])
		if(frm_arr[0]!==to_arr[0])
		{
			Materialize.toast('You can generate report for 1 MONTH at max as said before!',000,'rounded');
		}
		
	}
  $(document).ready(function() {
      Materialize.fadeInImage('#profilepic');
	  Materialize.showStaggeredList('.staggered-list');
	  
	
	 $(".dropdown-button").dropdown(function(){
		 Materialize.showStaggeredList('.staggered-list-2');
	  
	 });
	 
	  $('.modal-trigger').leanModal();
	 
	  $('.datepicker').pickadate({
    selectMonths: true, 
    selectYears: 15,
		format: 'mm/dd/yyyy'
  });
        
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
				Materialize.toast(result,3000,'rounded');
			</script>
	<?php
		}
	}
	
	?>
	

    </body>


</html>