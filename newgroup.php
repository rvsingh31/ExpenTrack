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
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/sidebar.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>


	<nav class="green darken-1">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo white-text right" id="logo-container" style="display:none;font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif;">ET</a>
	  
      <a href="#" data-activates="mobile-demo" class="button-collapse white-text"><i class="material-icons">menu</i></a>
      
	   <ul  class="side-nav fixed grey darken-4 blue-grey-text text-lighten-4 go staggered-list"> <br />
    
    <div style="text-align:center;" id="profilepic">
		<h5 id="header_name" class="indigo-text text-lighten-2">
		<?php
	
			if(isset($_SESSION["client_name"]))
			{
				echo $_SESSION["client_name"];
			}
		?>
		</h5>
    </div> 
        <li><a  class="grey-text text-lighten-2" href="select_event.php">Home</a></li>
		 <li><a id="links" class="pink-text lighten-2" href="single_event.php">Today's Expense</a></li>
        <li class="active"><a id="links" class="green-text text-lighten-2" href="newgroup.php">New Group</a></li>
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
		 <li><a id="links" class="pink-text lighten-2" href="single_event.php">Today's Expense</a></li>
        <li class="active"><a id="links" class="green-text text-lighten-2" href="newgroup.php">New Group</a></li>
			<li><a  id="links" class="blue-text text-lighten-2" href="logout.php">Sign Out</a></li>
        
	</ul>
    </div>
  </nav>
  
    <main>
    <div class="section intro">
		<div class="container">
			<div class="row">
				<div class="col s12 m8 indigo darken-1 " style="border-radius:1%" >
					<div>	
						<h6 class="light white-text" style="padding:3%" > <strong>Create a New Group</strong><i class="material-icons right">group</i></h6>
					</div>	
						<div class="row">
						<form action="create.php" id="create">
							<div class="input-field white-text col s12">
								<input id="group_name" type="text" name="group_name" >
								<label for="group_name">Name of the Group</label>
							</div>
							
							<div class="input-field white-text col s12">
								<input id="no_of_members" type="text" name="no_of_members" onblur="create_row(this.value)" onfocus="cl()">
								<label for="no_of_members">Number of members<span class="pink-text text-lighten-3"> (Except You) </span></label>
							</div>
							<div>
								<p class="teal-text center" >Press "TAB" to enter group members</p>
							</div>
							<div class="input-field white-text col s12" id="dynamic_data_rows">	
							</div>
							
							<div style="text-align:center">
								<button type="button" class="waves-effect waves-light btn green darken-1 " onclick="reg_chck()">Submit</button>
							</div>
						</form>
					</div>
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
  });

  </script>
  
  
<script>


	function cl()
	{
			Materialize.toast('If you are a  mobile user,then press ENTER (at the bottom of the keyboard) or TAP OUT at the screen',4500,'rounded');
				$(document).ready(function(){
							$("#dynamic_data_rows").slideUp("slow");
						});
		document.getElementById("dynamic_data_rows").innerHTML="";
	}


	function create_row(str){
//	alert("in");

		if(str.match(/\D/g))
		{
			Materialize.toast('Not a valid input!',2000,'rounded');
		}
		var number=parseInt(str);
		var i;
		for(i=0;i<number;i++)
		{
			var assgn="user"+(i+1);
			var err=assgn+"_err";
			var div=document.createElement("DIV");
			div.innerHTML="<div class='input-field col s12 white-text'><input type='"+"text' list='"+"datalist_ele' name='"+assgn+"' id='"+"findyou' onfocus='"+"fetch_fn(this.name)' onblur='"+"clearArea(this.value,this.name)'><label for='findyou'>Name of group member</label><datalist id='"+"datalist_ele' ></datalist></div>";
			document.getElementById("dynamic_data_rows").appendChild(div);
						
						$(document).ready(function(){
							$("#dynamic_data_rows").slideDown("slow");
						});
		}
		
	}
   
	
function fetch_fn(str) {
	//alert("in");
	
	var id=str+"_err";
	var req = new XMLHttpRequest();
  req.onreadystatechange = function() { //alert(req.readyState);
    if (req.readyState == 4 && req.status == 200) {
       var ou=req.responseText;
				//alert(ou);
				var user_array=new Array();
				user_array=ou.split(",");
				if($.trim(ou)=='No Friends to add!')
				{
					Materialize.toast('Add some friends from the Home section to make a group!',3000,'rounded');
				}
				var a;
					for(a in user_array)
					{
						
						var option = document.createElement("option");
						option.value=user_array[a].trim();
						document.getElementById("datalist_ele").appendChild(option);
						
					}
					//alert("outside loop");
					
					document.getElementById(id).innerHTML="";
    }
  };
  req.open("GET", "fetch.php", true);
  req.send();

}
function clearArea(str,na)
{	
					document.getElementById("datalist_ele").innerHTML="";
	 
}
var err=true;
var check_err=true;
function reg_chck(){
	
//	alert("in");
		var number=document.getElementById("no_of_members").value;
		var names=[];
		for(var a=1;a<=number;a++)
		{
			var x= document.getElementsByName("user"+a)[0].value;
			if(x=="")
			{
				Materialize.toast('Provide the names of all the members specified!',2000,'rounded');
				err=true;
				break;
			}
			err=false;
			names.push(x);
		}
		
		if(checkIfArrayIsUnique(names))
		{
			if(names.length > 0)
			{
				Materialize.toast('Group contains repeated names of members!',2000,'rounded');
				check_err=true;
	
			}
		}
		else
		{
			
			check_err=false;
		}
		
		
		if(err ==true || check_err == true)
		{
			Materialize.toast('Fill in the details appropriately!',2000,'rounded');
		}
		else
		{
					document.getElementById('create').submit();
		}
	
}	

function checkIfArrayIsUnique(arr) {
     var sorted_arr=arr.slice().sort();    
    for ( var i = 0; i < arr.length-1; i++ ){
        if(sorted_arr[i+1] == sorted_arr[i])
            return true;
    }
    return false;
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
				Materialize.toast(result,5000,'rounded');
				if(result=="Your Group has been created!")
				{
						Materialize.toast('Proceed to the HOME section to explore your GROUPS or other options!',5000,'rounded');
				}
				</script>
	<?php
		}
	}
	
	if(isset($_GET["n"]))
	{
		if($_GET["n"]!==null)
		{
	?>
			<script>
				var result="<?php echo $_GET["n"] ?>";
				Materialize.toast(result,3000,'rounded');
			</script>
	<?php
		}
	}
	?>
    </body>



</html>