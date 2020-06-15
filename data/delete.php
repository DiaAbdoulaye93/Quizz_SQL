
<script> alert("ok");</script><?php
include('db.php');
include('../traitements/function.php');

if(isset($_POST["user_id"]))
{
	$image = get_image_name($_POST["user_id"]);
	if($image != '')
	{
		unlink("../public/images/avatar/" . $image);
	}
	$statement = $connection->prepare(
		"DELETE FROM utilisateur WHERE id = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["user_id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Vous venez de supprimer un utilisateur';
	}
}



?>