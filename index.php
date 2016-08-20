<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Home</title>


  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="index.php" class="brand-logo indigo-text" style="display:none;font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif;">ET</a>
     </div>
  </nav>

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center light">ExpenTrack</h1>
        <div class="row center">
          <h5 class="header col s12 light" >Keep A Track Of Your Bills Without Any Burden.</h5>
        </div>
       <div class="row center">
          <a href="login.php" id="download-button" class="btn-large waves-effect waves-light indigo darken-2">Get Started</a>
        </div> 
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="pexels2.jpg" alt="Unsplashed background img 1"></div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">today</i></h2>
            <h5 class="center">Manage daily expenses</h5>

            <p class="light">We all have a habit of maintaining a certain limit of money that can be spent on that very day and at the end of the month provide the expense chart to our parents about the money spent.Well this website lets you do so in an easy way.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">group</i></h2>
            <h5 class="center">Manage Group Bills</h5>

            <p class="light">We all go to trips with our group or colleagues frequently .We tend to pay money for the whole group at a particular moment and settle the bills at the end of the trip .Instead of using a planner to do so ,utilize this web-app in order to keep a record of ' Who owes you how much? '.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">work</i></h2>
            <h5 class="center">Easy to work with</h5>

            <p class="light">This web-app stands good in terms of UI and performance. We also provide you assistance in understanding the web-app at frequent sections of the website which allows the user to work with the website without  mere confusion and problems.</p>
          </div>
        </div>
      </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">A modern way of settling small debts in day-to-day life.</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="pexels1.jpg" alt="Unsplashed background img 2"></div>
  </div>

  <div class="container">
    <div class="section">

      <div class="row">
        <div class="col s12 center">
          <h3><i class="mdi-content-send brown-text"></i></h3>
          <h4>Contact Us</h4>
		 </div>
		</div>
	<div class="row">
		<div class="col s12 m4" >
			<span><p>Please use the contact information provided as below ,if you have any kind questions or requests concerning our services.</p><p>We'll respond to you within 24 hrs .</p></span>
		</div>
		<div class="col s12 m8">
		<div class="row card hoverable" id="rv_hov" >
			<div class="col s6">
			<h5>Ravinder Singh</h5>
			<p class="light"><strong>Phone no. : </strong><span id="rv_call">8460348865</span></p>
			<p class="light"><strong>Email-id   : </strong><span id="rv_mail">rvsingh_31@yahoo.com</span></p>
	<!--		<p class="light" id="#rv_bio" style="display:none"><strong>Bio  : </strong>
														" I am a 3<sup>rd</sup> year engineering student at Dharmsinh Desai University,Nadiad pursuing B.Tech ( Computer Engineering ) ."
													</p>    -->
			</div>
			
			<div class="col s6">
				 <img class="responsive-img circle" src="my_img.jpg" >
			</div>

		</div>
	
		 
      </div>
	</div>
    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light" style="color:#e1f5fe">Manage your daily expenses which can be dealt in a simplified way. </h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="pexels3.jpg" alt="Unsplashed background img 3"></div>
  </div>

  <footer class="page-footer indigo darken-3">
    <div class="container">
	<div class="row">
        <div class="col s12 m4 13">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>
        </div>
		<div class="col s12 m4 13">
		</div>	
        <div class="col s12 m4 13" style="float:right">
          <h5 class="white-text">Suggestions</h5>
			<div class="input-field">
			<form action="mail.php" method="post">
				<i class="material-icons prefix">mode_edit</i>
				<textarea class="materialize-textarea" name="suggestion" style="color:white" onfocus="call()"></textarea>
				<label>What's on your mind?</label>
				 <button class="btn-floating btn-large waves-effect waves-light #00695c indigo darken-4" type="submit" style="float:right">Send</button>
			</form>
			</div>
		</div>
	 </div>
    </div>
    <div class="footer-copyright indigo darken-4">
      <div class="container">
      <p>&copy; All Rights Reserved. <span style="color:#00bfa5">2016</span></p>
      </div>
    </div>
  </footer>
  
  

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  <script>
	function call(){
		Materialize.toast('Mention your name and mail id without fail, so that we can reach out to you.',3000,'rounded');
	}
	
	$(document).ready(function(){
		$("#logo-container").fadeIn(2500);
	});
  </script>
  <?php
	function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
	if(isset($_GET["msg"]))
	{
		if($_GET["msg"]!==null)
		{
			$msg=test_input($_GET["msg"]);
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
