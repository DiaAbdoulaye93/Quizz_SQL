<?php
is_connect();
?>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="./public/bootstrap/bootstrap.min.css">

<link rel="stylesheet" href="./public/css/form.css">
<link rel="stylesheet" href="./public/js/bootstrap.min.css">
    <nav class="navbar navbar-default title1" id="nav">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" >
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left" >
                   
                    <li class="active"><a class="nav-link active" lien="index.php?action=admin&page=addAdmin" href="#" id="add_admin">Creer admin</a></li>
                    <li class="active"><a  class="nav-link active" lien="index.php?action=admin&page=showJoueur" href="#"  id="player_liste">Liste joueurs</a></li>
         
                    <li><a class="nav-link active" lien="index.php?action=admin&page=addQuestion" href="#"  >Créer questions</a></li>
                     <li class="active"><a class="nav-link active" lien="index.php?action=admin&page=showQuestion" href="#">Liste questions</a></li>
                    <li><a href="#">Statistiques du jeu</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li > <a href="index.php?statut=logout"><span class="" ></span>&nbsp;Déconnexion</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="container-admin">
    <?php  include('./pages/inscription.php'); ?>
    </div>
     
   
 
   
    </body>