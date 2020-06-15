<?php 
include('db.php');
include('../traitements/function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM question ";
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	 
	$sub_array = array();
	$sub_array[] = $row["Libelle"];
    $sub_array[] = $row["Type_question"];
    $sub_array[] = $row["points"];  
	$sub_array[] = '<button type="button" name="update_question" id="'.$row["ID_Question"].'" class="btn btn-primary btn-xs update_question">Voir detailles</button>';
	$sub_array[] = '<button type="button" name="delete_question" id="'.$row["ID_Question"].'" class="btn btn-danger btn-xs delete">Supprimer</button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_questions(),
	"data"				=>	$data
);
echo json_encode($output);
?>