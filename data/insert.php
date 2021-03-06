<?php
include('db.php');
include('../traitements/function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Ajouter")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
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
				':type'	=>	"joueur",
				':image'		=>	$image
			)
		);
		if(!empty($result))
		{
			echo 'Inscription reussie';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		else
		{
			$image = $_POST["hidden_user_image"];
		}
		$statement = $connection->prepare(
			"UPDATE utilisateur 
			SET nom =:nom, prenom =:prenom, pseudo=:pseudo, pass=:pass, password_confirme=:passconfirm, image =:image, actif=:actif
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':nom'	=>	$_POST["nom"],
				':prenom'	=>	$_POST["prenom"],
				':pseudo'	=>	$_POST["pseudo"],
				':pass'	=>	$_POST["password"],
				':passconfirm'	=>	$_POST["passwordconfirm"],
				':image'		=>	$image,
				':actif'		=>	$_POST["actif"],
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Mise a jour reussi';
		}
	}
}

?>