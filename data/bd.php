<?php

function connect_db(){
    $host ="localhost";
    $db = "quizz";
    $user ="root";
    $psswd ="";
    try{
    $conn = new PDO("mysql:host=$host;dbname=$db",$user,$psswd);
    return $conn;
    
    }catch(PDOException $pe){
        return 'connection error '.$pe->getMessage();
       die();
    }
}

function getUserConnexion($login,$password){
    try{
    $db = connect_db();
    
     $query = $db->prepare("SELECT * FROM utilisateur WHERE pseudo=:login AND pass=:password");
     $query->bindParam("login", $login, PDO::PARAM_STR);
     $query->bindParam("password", $password, PDO::PARAM_STR);
     
     $query->execute();

       if($query->rowCount() > 0){
        
         $user = $query -> fetch(PDO::FETCH_ASSOC);
         $profil = $user['type'];    
         return $user;
    }
    else{
         return null;
    }

  
    }catch(PDOException $e){
       exit($e -> getMessage());
    }
          
    }


    /*------------------------------------------------------------------------------------
inserer les infos utilisateur dans la BDD(inscription ou ajout d'un admin)
---------------------------------------------------------------------------------------*/
/*  function addUser($login,$password,$prenom,$nom,$password_confirm,$type)
{
    $result = 0;
    if(isset($_SESSION['user'])){ //c'est un admin qui ajoute un autre admin
        $type = 'admin';
    
    }
  else{ //c'est un joueur qui s'inscrit
     $type = 'joueur';
  
  }
try{
$db = connect_db();

$query = $db -> prepare("INSERT INTO utilisateur(nom, prenom, pseudo, pass,password_confirm,type,Score) VALUES(:nom,:prenom,:login, :password, :password_confirm,:type,0)");
    //  $fullName= $prenom+" "+$nom;
        $query -> bindParam("nom",$nom,PDO::PARAM_STR);
        $query -> bindParam("prenom",$prenom,PDO::PARAM_STR);
        $query -> bindParam("login",$login,PDO::PARAM_STR);
        $query -> bindParam("password",$password,PDO::PARAM_STR);
        $query -> bindParam("type",$type,PDO::PARAM_INT);
        $query -> bindParam("password_confirm",$password_confirm,PDO::PARAM_INT);
        $query -> execute();
         return 1;
   }catch(PDOException $e){
exit($e -> getMessage());
}
         
}

function getPrepSel($table,$donnees=[],$id=0){
    $reqUsr= "SELECT * FROM `".DB_NAME."`.`".$table."`";         
    $w=" WHERE ";                
    if(isset($donnees[CHAMP])){
        $reqUsr.= " WHERE `".$donnees[CHAMP]."`=?";
        $w=" AND ";
    }
    // Limitation pour la table USER
    if(($table=="utilisateur")&&($id==0)){            
        $debut=($donnees["page"]-1)*$donnees[NB_ELT];
        $reqUsr.= $w." `status`=1 LIMIT ".$debut.",".$donnees[PAS];
    }
    return $reqUsr;	
}

function select($requete,$con,$cond=[]){	
    $stmt= $con->prepare($requete);
    $stmt->execute($cond); 
    $data=[];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $data[]=$row;
    }
    return $data;
} 


function getPrepUp($data,$idName="id",$where=null){	
    $prep="UPDATE `".DB_NAME."`.`".$data['table']."` SET `".$data[CHAMP]."`='".$data['val']."' WHERE $idName=?";
    $w="";
    if($where){
        foreach ($where as $name) {
            $w .= " AND $name=?";
        } 
        $prep .= $w;
    }
    return $prep;	
}
*/
?>