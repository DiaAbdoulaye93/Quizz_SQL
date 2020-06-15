 
<?php
include('db.php');
include('../traitements/function.php');
$statement = $connection->prepare("
			INSERT INTO question (Type_question,points,Libelle) 
			VALUES (:liste_type_reponses,:pts_question,:lbl_question)
		");
		$result = $statement->execute(
			array(
				':lbl_question'	=>	$_POST["lbl_question"],
				':pts_question'	=>	$_POST["pts_question"],
				':liste_type_reponses'	=>	$_POST["liste_type_reponses"]
			 
			)
		);
		if(!empty($result))
		{
			echo 'Insertion question reussi';
        }
     
	$statement = $connection->prepare(
		"SELECT ID_Question FROM Question 
		ORDER BY ID_Question DESC
		LIMIT 1"
	);
    $statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
      $id_question= $row["ID_Question"];
    }
//    $id_question=json_encode($output);
//   var_dump($id_question);
 if($_POST["liste_type_reponses"]=="type_text")
 {
	var_dump($id_question);
    $statement1 = $connection->prepare("
    INSERT INTO reponses (validite,Libelle_reponse,ID_Question) 
    VALUES (:validite, :Libelle_reponse,:ID_Question)
");
$result1 = $statement1->execute(
    array(
        ':validite'	=> "oui",
        ':Libelle_reponse'	=>	$_POST["texte1"],
        ':ID_Question'	=> $id_question
     
    )
);
if(!empty($result1))
{
    echo 'Insertion reponse reussi';
}
else {
	 
		echo "Insertion reponse echec";
 
}

 }
 else if($_POST["liste_type_reponses"]=="choix_simple")
 {
	 
	$i=1;
	while(isset($_POST["texte".$i]))
	{
		if(isset($_POST["radio".$i]))
		{
			$valide_answer[$i]="oui";
		}
		else{
			$valide_answer[$i]="non";
		} 
		$i++;
	}
for ($j=1; $j <$i ; $j++) { 
	$statement1 = $connection->prepare("
    INSERT INTO reponses (validite,Libelle_reponse,ID_Question) 
    VALUES (:validite, :Libelle_reponse,:ID_Question)
");
$result1 = $statement1->execute(
    array(
        ':validite'	=> $valide_answer[$j],
        ':Libelle_reponse'	=>	$_POST["texte".$j],
        ':ID_Question'	=> $id_question
     
    )
);
 
}
if(!empty($result1))
{
	echo " \n   Reponses a choix unique ajouté";
	
}
else {
	 
		echo " \n Insertion des reponses echoué";
 
}

}
 
 else if($_POST["liste_type_reponses"]=="choix_multiple")
 {
	 
	$i=1;
	while(isset($_POST["texte".$i]))
	{
		if(isset($_POST["check".$i]))
		{
			$valide_answer[$i]="oui";
		}
		else{
			$valide_answer[$i]="non";
		} 
		$i++;
	}
for ($j=1; $j <$i ; $j++) { 
	$statement1 = $connection->prepare("
    INSERT INTO reponses (validite,Libelle_reponse,ID_Question) 
    VALUES (:validite, :Libelle_reponse,:ID_Question)
");
$result1 = $statement1->execute(
    array(
        ':validite'	=> $valide_answer[$j],
        ':Libelle_reponse'	=>	$_POST["texte".$j],
        ':ID_Question'	=> $id_question
     
    )
);


 }
 if(!empty($result1))
{
	echo " \n Reponses a choix multiple ajouté";
	
}
else {
	 
		echo " \n Insertion des reponses echoué ";
 
}

}
 
 
?>