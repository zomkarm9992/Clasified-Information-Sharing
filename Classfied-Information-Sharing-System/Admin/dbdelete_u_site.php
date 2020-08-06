<?php
    $con=mysql_connect("localhost:81","root","");
    if(!$con)
    {
            die("Failed to connect to Mysql:".mysql_error());
    }
    else
    {   
    mysql_select_db("Classified_Db",$con);
    $sql1="select U_id from User_db where flag='1'";
    $a=mysql_query($sql1);
    $val=mysql_fetch_assoc($a);
	if($val==='')
	{
    $res=implode("+",$val);

    $sql3="select User_1 from User_db where flag='1'";
    $b=mysql_query($sql3);
    $val1=mysql_fetch_assoc($b);
    $res1=implode("+",$val1);

    $sql4="select User_2 from User_db where flag='1'";
    $c=mysql_query($sql4);
    $val2=mysql_fetch_assoc($c);
    $res2=implode("+",$val2);
	
	if($res=='0x1')
		{

		$sql5="select username from users where flag1='1' limit 1";
		$d=mysql_query($sql5);
		$val3=mysql_fetch_assoc($d);
		$res3=implode($val3);
		if($res3 ===$res1 || res3 ===$res2)
		{
    			$sql2="update users set flag1='0' where username='$res3'";
			mysql_query($sql2);
		}

		$sql6="select username from users where flag1='1'";
		$e=mysql_query($sql6);
		$val4=mysql_fetch_assoc($e);
		$res4=implode($val4);

		if($res4 ===$res1 || $res4 ===$res2)
		{
    			$sql7="update users set flag1='0' where username='$res4'";
    			mysql_query($sql7);
		}

	
    $sql="delete from User_db where U_id='0x1'";
    mysql_query($sql);
    echo "<script>window.alert('User deleted successfully');</script>";
    echo "<script>window.open('dash.php', '_self');</script>";
	}
	}
	else
	{
		    echo "<script>window.alert('No users found for deleting');</script>";
		    echo "<script>window.open('dash.php', '_self');</script>";

	}    
	mysql_close($con);
    }


?>
