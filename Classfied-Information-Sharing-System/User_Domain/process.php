<?
include("include/session.php");

class Process
{
   function Process(){
      global $session;

      if(isset($_POST['sublogin'])){
         $this->procLogin();
      }
      else if($session->logged_in){
         $this->procLogout();
      }
      else{
          header("Location: index.php");
       }
   }


   function procLogin(){
      global $session, $form;
      /* Login attempt */
    $temp= crypt(sha1(md5($_POST['password'])),'omkar');    

      $retval = $session->login($_POST['user'], $temp, isset($_POST['remember']));
      
      /* Login successful */
      if($retval){
        header("Location: ".$session->referrer);
      }
      /* Login failed */
      else{
         $_SESSION['value_array'] = $_POST;
         $_SESSION['error_array'] = $form->getErrorArray();
         header("Location: ".$session->referrer);
      }
   }
   
   function procLogout(){
      global $session;
      $retval = $session->logout();
      header("Location: index1.php");
   }
   

};

$process = new Process;

?>
