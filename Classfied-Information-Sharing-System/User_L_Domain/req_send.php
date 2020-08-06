<?php
    $e_nm= $_REQUEST["name1"];
    $e_ps= $_REQUEST["name2"];
    $con=mysql_connect("localhost:81","root","");
    if(!$con)
    {
            die("Failed to connect to Mysql:".mysql_error());
    }
    else
    {   
    mysql_select_db("Classified_Db",$con);
    
    $sql="insert into Request(U_id,Sender,Receiver,flag) values ('0x1','$e_nm','$e_ps','1')";
    mysql_query($sql);
    echo "<script>window.alert('Request send successfully');</script>";
    echo "<script>window.open('request.php', '_self');</script>";
    mysql_close($con);
    }


?>
