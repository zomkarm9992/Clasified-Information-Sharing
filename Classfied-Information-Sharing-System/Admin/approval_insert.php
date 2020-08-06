<?php
     $c=$_POST['c_key'];
    $con=mysql_connect("localhost:81","root","");
    if(!$con)
    {
            die("Failed to connect to Mysql:".mysql_error());
    }
    else
    {   
    mysql_select_db("Classified_Db",$con);
    
		$sql1="select Sender from Request where U_id='0x1'";
    		$row1=mysql_query($sql1);
    		$val1=mysql_fetch_assoc($row1);		
		$sql2="select Receiver from Request where U_id='0x1'";
    		$row2=mysql_query($sql2);
    		$val2=mysql_fetch_assoc($row2);		
		$a=implode("+",$val1);
		$b=implode("+",$val2);
	if($c==='')
	{
		echo "Enter coding key";
	}
	else
	{
    		$sql5="insert into User_db(U_id,User_1,User_2,Coding_key,flag) values ('0x1','$a','$b','$c','1')";
    		mysql_query($sql5);
    		$sql6="update users set flag1='1' where username='$a'";
    		mysql_query($sql6);
    		$sql7="update users set flag1='1' where username='$b'";
    		mysql_query($sql7);


    		echo "<script>window.alert('Request approved successfully');</script>";
		$sql5="truncate table Request";
    		$row5=mysql_query($sql5);
    		echo "<script>window.open('approval.php', '_self');</script>";
	}
}
?>
