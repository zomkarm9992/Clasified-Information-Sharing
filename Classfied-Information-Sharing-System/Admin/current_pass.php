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

<?php
$pas=$_POST['pass'];
    $con=mysql_connect("localhost:81","root","");
    if(!$con)
    {
            die("Failed to connect to Mysql:".mysql_error());
    }
    else
    {   
    mysql_select_db("Classified_Db",$con);
    $sql1="select password from Admin";
    $a=mysql_query($sql1);
    $val=mysql_fetch_assoc($a);
    $val1=implode($val);
    $res=crypt(sha1(md5($pas)),'omkar');
	if($val1==$res)
	{
?>
	<form method='post' action='change_pass.php'>
	<center>
	<label>Enter new password</label>
	<input type='text' name='new_pass'>
	<br><br>
	<label>Confirm password</label>
	<input type='text' name='confirm_pass'>
	<br><br>
	<input type='submit' value="Change Password">	
	</center>	
	</form>

<?
	}
	else
	{
		echo "<script>window.alert('Invalid password');</script>";
		echo "<script>window.open('credential.php', '_self');</script>";	
	}

mysql_close($con);
}

?>


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
