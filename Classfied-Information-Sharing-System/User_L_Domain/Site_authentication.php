<?php
    $dbhst = "localhost";
    $dbnme = "Classified_Db"; 
    $dbusr = "root";
    $dbpws = "";
$pass = $_POST['password'];
 $mysqli = new mysqli($dbhst,$dbusr,$dbpws,$dbnme);
    $resultt = $mysqli->query("SELECT Site_code FROM Admin_Login");
$row = $resultt->fetch_assoc();
$string_c = implode('',$row);
/*
// Using PDO to connect

	$conn = new PDO("mysql:host=$dbhst;dbname=Classified_Db", $dbusr, $dbpws);

// Getting variables
$pass = $_POST['password'];
 $stmt = $conn->prepare('SELECT Site_code FROM Admin_Login');
    $stmt->execute();

    $result = $stmt->fetchAll();
*/
    if($pass!=$string_c)
    {
	echo('<script>window.alert("Access Denied");</script>');	    	
	echo('<script>window.open("index.php", "_self");</script>');
    }
     else
	{
	echo('<script>window.alert("Access Granted");</script>');
	echo('<script>window.open("index1.php","_self");</script>');	
	}
?>

