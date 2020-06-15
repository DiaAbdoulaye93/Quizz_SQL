 
<?php
include('db.php');
include('../traitements/function.php');
include('../traitements/traitement.php');
$image = '';
if($_FILES["user_image"]["name"] != '')
{
    $image = upload_image();
}
if(is_connect())
{

    $type="admin";
}
else
{
    
    $type="joueur";
}
//	$type=is_connect();
$statement = $connection->prepare("
    INSERT INTO utilisateur (nom,prenom,pseudo,pass,password_confirme,Score,type, image,actif) 
    VALUES (:nom, :prenom,:pseudo,:pass,:passconfirm,0,:type, :image,1)
");
$result = $statement->execute(
    array(
        ':nom'	=>	$_POST["nom"],
        ':prenom'	=>	$_POST["prenom"],
        ':pseudo'	=>	$_POST["pseudo"],
        ':pass'	=>	$_POST["password"],
        ':passconfirm'	=>	$_POST["passwordconfirm"],
        ':type'	=>   $type,
        ':image'		=>	$image
    )
);
if(!empty($result))
{
    echo 'Inscription reussie';
}
?>