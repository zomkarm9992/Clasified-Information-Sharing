<?php
    $ps1= $_REQUEST["new_pass"];
    $ps2= $_REQUEST["confirm_pass"];
	if($ps1===$ps2)
	{
    $temp= crypt(sha1(md5($ps2)),'omkar');    
    $con=mysql_connect("localhost:81","root","");
    if(!$con)
    {
            die("Failed to connect to Mysql:".mysql_error());
    }
    else
    {   
    mysql_select_db("Classified_Db",$con);
    
    $sql="update Admin set password='$temp'";
    mysql_query($sql);
    echo "<script>window.alert('Password changed successfully');</script>";
    echo "<script>window.open('dash.php', '_self');</script>";
    mysql_close($con);
    }
	}
	else
	{
		echo "<script>window.alert('Password Mismatch');</script>";
		echo "<script>window.open('credential.php', '_self');</script>";				
	}

?>
