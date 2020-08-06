<?php
    $con=mysql_connect("localhost:81","root","");
    if(!$con)
    {
            die("Failed to connect to Mysql:".mysql_error());
    }
    else
    {   
    mysql_select_db("Classified_Db",$con);
    
    $sql="select Site_code from Admin";
    $row=mysql_query($sql);
    $val=mysql_fetch_assoc($row);
    $f=implode($val);
/*
// Using PDO to connect

	$conn = new PDO("mysql:host=$dbhst;dbname=Classified_Db", $dbusr, $dbpws);

// Getting variables
$pass = $_POST['password'];
 $stmt = $conn->prepare('SELECT Site_code FROM Admin_Login');
    $stmt->execute();

    $result = $stmt->fetchAll();
*/
$pass=$_POST['password'];
    if($pass!=$f)
    {
	echo('<script>window.alert("Access Denied");</script>');	    	
	echo('<script>window.open("index.php", "_self");</script>');
    }
     else
	{
	echo('<script>window.alert("Access Granted");</script>');
	echo('<script>window.open("index1.php","_self");</script>');	
	}
}
?>

