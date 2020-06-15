<?php
include('db.php');
include('../traitements/function.php');
if(isset($_POST["user_id"]))
{
	
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM utilisateur 
		WHERE id = '".$_POST["user_id"]."' AND type ='joueur'
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["nom"] = $row["nom"];
		$output["prenom"] = $row["prenom"];
		$output["pseudo"] = $row["pseudo"];
		$output["pass"] = $row["pass"];
		$output["passwordConfirm"] = $row["password_confirme"];
		$output["Score"] = $row["Score"];
		$output["actif"]=$row["actif"];
		if($row["image"] != '')
		{
			$output['user_image'] = '<img src="../public/images/avatar/' .$row["image"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />';
		}
		else
		{
			$output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
		}
	}
	echo json_encode($output);
}
?>