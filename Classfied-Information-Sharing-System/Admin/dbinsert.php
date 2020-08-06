<?php
    $e_nm= $_REQUEST["uname"];
    $e_ps= $_REQUEST["upass"];
    $temp= crypt(sha1(md5($e_ps)),'omkar');    
    $con=mysql_connect("localhost:81","root","");
    if(!$con)
    {
            die("Failed to connect to Mysql:".mysql_error());
    }
    else
    {   
    mysql_select_db("Classified_Db",$con);
    
    $sql="insert into users(username,password,flag1) values ('$e_nm','$temp','0')";
    mysql_query($sql);
    echo "<script>window.alert('User inserted successfully');</script>";
    echo "<script>window.open('create.php', '_self');</script>";
    mysql_close($con);
    }


?>
