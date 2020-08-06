<?php
include("include/session.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title></title>
<link href="style4.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id="all">
<div id="container">

<!-- header -->
<div id="header">
    <div id="logo"><a href="dash.php"><img src="images1/logo.gif" alt=""/><br/><br/>DashBoard</a></div>
    <div id="head">
    <ul>
        <li><a href="create.php">Create User</a></li>
	<li><a href="delete.php">Delete User</a></li>
	<li><a href="approval.php">Approvals</a></li>
	<li><a href="delete_u_site.php">delete users from site</a></li>	
        <li><a href="credential.php">change credentials</a></li>
        <li><a href="list.php">user listings</a></li>
    </ul>
    </div>
</div>
<!--end header -->

<!-- main -->
<div id="main"> 

    <div id="menu">
<?
if($session->logged_in){
   echo "<h2>Logged In</h2>";
   echo "Welcome <b>$session->username</b>, you are logged in. <br><br>";
   echo "<br><br>";
   echo "<a href=\"process.php\">LOGOUT</a>";
}
else{
if($form->num_errors > 0){
   echo "<strong><font size=\"2\" color=\"#ff0000\">".$form->error("access")."</font></strong>";
   echo "<font size=\"2\" color=\"#ff0000\">".$form->error("attempt")."</font>";
   echo "<br><br>";}
}

?>
    </div>
   <div id="text">
<br><br>
<form name="sub" method="post" action="dbdelete.php">
<hr>
<center>
<label>User Name</label>
<input type="text" name="uname"><br><br>
<hr><br><br>
<input type="submit" value="Delete">
</center>

</form> 

 

    </div>
</div>
<!-- end main -->

<!-- footer -->
<div id="footer">

    <div id="left_footer">
<?php
echo "</td></tr><tr><td><br><br>";
echo "<h3>Login Attempts:</h3>";
$database->displayAttempts($session->ip);
?>
</div>
    <div id="right_footer">
       
    </div>
</div>
<!-- end footer -->

</div>
</div>

<div id="bottom">
    <div id="bottom_center"></div>
</div>

</body>
</html>
