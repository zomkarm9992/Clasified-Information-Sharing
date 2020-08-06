<?
include("include/session.php");
?>
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
	<div id="main">	
            <div id="sidebar">
                <div id="login">
                    <h2>Login</h2>
                    <div class="box2">
<?php
if($session->logged_in){
   echo "<h2>Logged In</h2>";
   echo "Welcome <b>$session->username</b>, you are logged in. <br><br>";
   echo "<br><br>";
?>



<?php
    $con=mysql_connect("localhost:81","root","");
    if(!$con)
    {
            die("Failed to connect to Mysql:".mysql_error());
    }
    else
    {   
    mysql_select_db("Classified_Db",$con);
    $nm=$session->username;    
    $sql="select U_id from User_db where User_1='$nm'";
    $row=mysql_query($sql);
    $val=mysql_fetch_array($row);
    $sql8="select flag from Request where (Sender='$nm' or Receiver='$nm')";
    $row8=mysql_query($sql8);
    $val8=mysql_fetch_array($row8);
     
	if($val['U_id']==='0x1')
	{
		$sql1="select User_2 from User_db where User_1='$nm'";
    		$row1=mysql_query($sql1);
    		$val1=mysql_fetch_assoc($row1);		
		$sql2="select Coding_key from User_db where User_1='$nm'";
    		$row2=mysql_query($sql2);
    		$val2=mysql_fetch_assoc($row2);		
		$sql3="select Site_code from Admin";
    		$row3=mysql_query($sql3);
    		$val3=mysql_fetch_assoc($row3);		
		$a=implode("+",$val1);
		$b=implode("+",$val2);
		$c=implode("+",$val3);		
		echo "You can send information to $a using $b as Private Key using $c as Site Key.<br><br><br>";
	}
	else
	{
		echo "No Approval Confirmation";	
	}
	}
?>


<?
   echo "[<a href=\"index.php\">Back to Menu</a>]";
}
else{
?>

<?
if($form->num_errors > 0){
   echo "<strong><font size=\"2\" color=\"#ff0000\">".$form->error("access")."</font></strong>";
   echo "<font size=\"2\" color=\"#ff0000\">".$form->error("attempt")."</font>";
   echo "<br><br>";
}
?>

                        <form method="post" action="process.php">
                            <p class="txtleft"><label for="user">User Name:</label></p>
                            <input type="text" name="user" id="user" class="text" /><br />
                            <p class="txtleft"><label for="password">Password:</label></p>
                            <input type="password" name="password" id="password" class="password" /><br />
                            <p class="rem">
                            <input type="checkbox" checked="checked" name="remember" id="remember" />      <label for="remember">Remember me</label></p>
				<input type="hidden" name="sublogin" value="1">
                            <input type="submit" name="submit" id="submit" class="submit" value="Submit" />
                            <p><a href="#">Forgot your password?</a></p>
                            <p><a href="#">Create an account</a></p>
                        </form>
<?
echo "</td></tr><tr><td><br><br>";
echo "<h3>Login Attempts:</h3>";
$database->displayAttempts($session->ip);
?>

<?
}
echo "</td></tr><tr><td align=\"left\"><br><br>";
echo "<p><font size=1>Blocking access to the login page after three unsuccessful login attempts. </font></p>";

?>

                    </div>
                </div><!-- login -->
		
		</div>
	</div>


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
