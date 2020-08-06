<?php
    $e_nm= $_REQUEST["uname"];
    $e_ps= $_REQUEST["upass"];    
    $con=mysql_connect("localhost:81","root","");
    if(!$con)
    {
            die("Failed to connect to Mysql:".mysql_error());
    }
    else
    {   
    mysql_select_db("Classified_Db",$con);
    
    $sql="delete from users where username='$e_nm'";
    mysql_query($sql);
    echo "<script>window.alert('User deleted successfully');</script>";
    echo "<script>window.open('delete.php', '_self');</script>";
    mysql_close($con);
    }


?>
