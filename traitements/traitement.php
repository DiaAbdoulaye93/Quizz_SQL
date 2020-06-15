
<?php
 session_start();
function pageConnexion($post)
 {
     $login=$post['login'];
     $password=$post['password'];
     //Validation des Champs en Php
   
     $result=getUserConnexion($login, $password);

     if($result!== null)
     {
        
         $_SESSION['userConnect']=$result;
        
         if($result['type']=="superadmin" || $result['type']=="admin" ){
          echo "admin";
            //  require_once "./pages/interface_admin.php";
         }
         else{
          if($result['actif']==1)
          {
            echo "joueur";
          }
        //   echo "<script> alert ('Votre statut actuel ne vous permet pas dacceder a la plateforme SENQUIZZ SA   Veuillez contacter le web Master a l addresse suivante diaabdoulayedjibril@gmail.com')</script>";
        //   require_once './pages/layout.php';
         }
     }else{
         echo "error";
        //   echo "<script> alert ('log ou pass incorrect')</script>";
        //   require_once './pages/layout.php';
     }

 }
function deconnection(){
    //Destruction des données utlisateur
    session_destroy();
    unset( $_SESSION['userConnect']);
     echo "logout";
 }

 function is_connect(){
     if(isset($_SESSION['userConnect'])){
         return true;
     }else{
        return false;
     }
 }
       
?>