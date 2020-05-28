<?php 
require('traitements/config.php');
require('traitements/fonctions.php');
	session_start();
	if(isset($_SESSION["pseudo"]))
	{
		session_destroy();
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=div, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quizz</title>
    <link rel="stylesheet" href="public/bootstrap/bootstrap.min.css">
	
    <!-- <link rel="stylesheet" href="style/style.css"> -->
    <link rel="stylesheet" href="public/css/form.css">
</head>
<body>
<div class="content" style="">
  <div id="entete">
       <img src="public/images/logo-QuizzSA.png" alt="" style="margin-left: width:10%; height:100px">
       <h1 id="text-entete">Le plaisir de jouer</h1> 

   </div> 
  
    <?php 
    //require_once("fonctions/fonctions.php");
    if(isset($_GET['lien']))
    {
        switch($_GET['lien'])
        {
            case "accueil":
            require_once("pages/interface_admin.php");
            
            break;
            case "jeux":
            require_once("pages/joueur.php");
            break;
            
            case "inscription":
            require_once("pages/inscription.php");
            break;
            default:
            require_once("pages/connection.php");
        }
    }
    else{
        if(isset($_GET['statut']) && $_GET['statut']=="logout")
        {
            deconnexion();
            header("location:index.php");
        }
        require_once("pages/connection.php");
    }
     
    ?>
    </div>
    <script src="public/js/jquery.js"></script>
		<script src="public/bootstrap/bootstrap.min.js"></script>
</body>
</html>