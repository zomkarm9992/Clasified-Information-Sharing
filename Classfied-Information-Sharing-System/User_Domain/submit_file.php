<?php
include("include/session.php");

include_once 'dbconfig.php';

if(isset($_POST['btn-upload']))
{    
     
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	if($session->logged_in)		
		$name=$session->username;
	$myusername = $name;
		mkdir("Normal/$myusername",0777);
	$myNewFolderPath="Normal/$myusername/";	
	$folder=$myNewFolderPath;

	$final_file=str_replace(' ','-',$new_file_name);
	
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		$sql="INSERT INTO tbl_uploads(file,type,size) VALUES('$final_file','$file_type','$new_size')";
		mysql_query($sql);
		
		?>


	<script>
		alert('Successfully Submitted');
        window.location.href='send_file.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error while uploading file');
        //window.location.href='send_file.php?fail';
        </script>
		<?php
	}
}
?>
<!--
<?

//Include the library
require_once 'AESCryptFileLib.php';

//Include an AES256 Implementation
require_once 'aes256/MCryptAES256Implementation.php';

//Construct the implementation
$mcrypt = new MCryptAES256Implementation();

//Use this to instantiate the encryption library class
$lib = new AESCryptFileLib($mcrypt);

//This example encrypts and decrypts the README.md file
$file_to_encrypt = "";
$encrypted_file = "";
$decrypted_file = "";

//Ensure target file does not exist
@unlink($encrypted_file);
//Encrypt a file
$lib->encryptFile($file_to_encrypt, "1234", $encrypted_file);

//Ensure file does not exist
@unlink($decrypted_file);
//Decrypt using same password
$lib->decryptFile($encrypted_file, "1234", $decrypted_file);

echo "<script>window.alert('Successfully encrypted and sended file');</script>";
?>
	-->

