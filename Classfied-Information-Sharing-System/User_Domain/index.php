<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>User Login</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  <!-- Google web font "Open Sans" -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  
  <link rel="stylesheet" href="css/demo.css" />
  <link rel="stylesheet" href="css/templatemo-style.css">
    <link href="style1.css" rel="stylesheet" type="text/css" />  
  <script type="text/javascript" src="js/modernizr.custom.86080.js"></script>
	
<script src="pass.js"></script>
<style>
#center_div{
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  
  font-size: 20px;
  padding: 5px;
  z-index: 100;
}
div.transbox {
  margin: 30px;
  background-color: #ffffff;
  border: 1px solid black;
  opacity: 0.6;
  filter: alpha(opacity=60); /* For IE8 and earlier */
}

div.transbox p {
  margin: 5%;
  font-weight: bold;
  color: #000000;
}

</style>

	</head>

	<body>

			<div id="particles-js"></div>
		
			<ul class="cb-slideshow">
	            <li></li>
	            <li></li>
	            <li></li>
	            <li></li>
	            <li></li>
	            <li></li>
	        </ul>

			<div class="container-fluid">
				<div class="row cb-slideshow-text-container ">
					<div class= "tm-content col-xl-6 col-sm-8 col-xs-8 ml-auto section">

					      <div id="center_div">       
<!--	<div id="main">	
            <div id="sidebar">-->
<!--                <div id="login">
                    <h2>Login</h2>-->
                    <div class="transbox">

				   <form name="form1" action="Site_authentication.php" method="post">
			  	 <u>Enter site code  :</u>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     				<input type="password" id="password" name="password" /><center>
			  	  <br><br><p><input type="submit" value="Open" /></p></center>
				   </form>
                    <!--</div>-->
                </div><!-- login -->
		
		<!--</div>
	</div>-->


                    			</div>

					</div>
				</div>	
				<div class="footer-link">
					<p>Copyright © 2018 SIOM PHP Project By Omkar Zende</div>
			</div>	

	</body>

	<script type="text/javascript" src="js/particles.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
</html>

