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
	<li><a href="delete.php">Delete User from db</a></li>
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
      <!--  <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Pricing</a></li>
            <li><a href="#">Contacts</a></li>
        </ul>-->
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
    
    $sql="select U_id from Request where flag='1'";
    $row=mysql_query($sql);
    $val=mysql_fetch_array($row);
	if($val['U_id']==='0x1')
	{
		$sql1="select Sender from Request where U_id='0x1'";
    		$row1=mysql_query($sql1);
    		$val1=mysql_fetch_assoc($row1);		
		$sql2="select Receiver from Request where U_id='0x1'";
    		$row2=mysql_query($sql2);
    		$val2=mysql_fetch_assoc($row2);		
		$a=implode("+",$val1);
		$b=implode("+",$val2);
		echo "<h1><center><u>User -- $a</u><br><br><br> Requested to Communicate with<br><br><br> <u>User -- $b</u></center></h1>";
?>
<br><br><br>
<form action="approval_insert.php" method="post">
<label><h2><u>Enter coding key</u></h2></label>
<input type="text" name="c_key">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" value="Approve">
</form>
<?		
	}
	else
	{
		echo "<h1>No Approvals found.</h1>";	
	}

//    echo "<script>window.alert('User inserted successfully');</script>";
//    echo "<script>window.open('create.php', '_self');</script>";
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
