<?php
include('db.php');
include('../traitements/function.php');
if(isset($_POST["user_id"]))
{
	
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM question 
		WHERE ID_Question = '".$_POST["user_id"]."' 
        LIMIT 1"
    );
    $statement1 = $connection->prepare(
		"SELECT * FROM reponses 
		WHERE ID_Question = '".$_POST["user_id"]."' 
		 "
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["question"] = $row["Libelle"];
		$output["point"] = $row["points"];
		 
	}
   
// uuuuuuuuuuuu
 
	$statement1->execute();
	$result1 = $statement1->fetchAll();
	foreach($result1 as $row1)
	{
		$output["reponse1"] = $row1["Libelle_reponse"];
	 
	
	}
	echo json_encode($output);

   
}


?>