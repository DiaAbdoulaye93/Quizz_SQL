
<script> alert("ok");</script><?php
include('db.php');
include('../traitements/function.php');

if(isset($_POST["user_id"]))
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
				':actif'	=>	$_POST["actif"],
				':id'			=>	$_POST["user_id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Vous venez de supprimer un utilisateur';
	}
}



?>