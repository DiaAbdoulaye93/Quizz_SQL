<?php 
 function getConnexion()
 {
     $objetPDO="";
     try
     {
       $objetPDO =new PDO('mysql:host=localhost;dbname=quizz;charset=utf8','root','');
        $objetPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $objetPDO;
     }
     catch(PDOException $e)
     {
        
         die('Connexion to database failed');
     }
 }


function getUserConnexion($login, $password)
{
    $opdo=getConnexion();

    // table utilisateurs
    $sql='SELECT * FROM utilisateur WHERE pseudo =:login AND pass =:password';
    //2emme maniere
   // $sql=('SELECT * FROM utilisateurs WHERE login =? AND password =?')
   $req=$opdo->prepare($sql);

   // ecriture des parametre
   $req->execute(array('login'=>$login, 'password'=>$password ));
   //2eme methode 
   //$req->execute($login,$password);

   
return $req;
}
