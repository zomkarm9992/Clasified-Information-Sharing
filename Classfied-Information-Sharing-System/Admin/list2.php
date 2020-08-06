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
	<li><a href="delete.php">Delete User From DB</a></li>
	<li><a href="approval.php">Approvals</a></li>
	<li><a href="delete_u_site.php">Delete User From Site</a></li>	
        <li><a href="credential.php">Change Credentials</a></li>
        <li><a href="list.php">User Listings</a></li>
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
<?php
    $con=mysql_connect("localhost:81","root","");
    if(!$con)
    {
            die("Failed to connect to Mysql:".mysql_error());
    }
    else
    {   
    mysql_select_db("Classified_Db",$con);
     $sql="SELECT * FROM users where flag1='1'";
     $result =mysql_query($sql);
echo"<h1><u>All Users in database are :</u></h1>";
echo "<br><br><br><center><table border='1'>
<tr>
<th><h2>Username</h2></th>
<th><h2>Password</h2></th>

</tr>";

while($row = mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['password'] . "</td>";
echo "</tr>";
}
echo "</table></center>";

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
