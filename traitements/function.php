<?php

function upload_image()
{
	if(isset($_FILES["user_image"]))
	{
		$extension = explode('.', $_FILES['user_image']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination ='../public/images/avatar/ '. $new_name;
		move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
		return $new_name;
	}
}

function get_image_name($user_id)
{
	include('./data/db.php');
	$statement = $connection->prepare("SELECT image FROM utilisateur WHERE id = '$user_id'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["image"];
	}
}

function get_total_all_records()
{
	include('../data/db.php');
	$statement = $connection->prepare("SELECT * FROM utilisateur");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>