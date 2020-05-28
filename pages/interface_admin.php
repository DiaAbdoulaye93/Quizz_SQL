<body>
    <nav class="navbar navbar-default title1">
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
                   
                    <li class="active"><a href="index.php?lien=accueil&lien1=inscription1">Creer admin</a></li>
                    <li class="active"><a href="">Liste joueurs</a></li>
         
                    <li><a href="">Créer questions</a></li>
                     <li class="active"><a href="">Liste questions</a></li>
                    <li><a href="">Statistiques du jeu</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li <?php echo''; ?> > <a href="index.php?statut=logout"><span class="" ></span>&nbsp;Déconnexion</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <?php 
    
    if(isset($_GET['lien1']))
    {
        switch($_GET['lien1'])
        {
            case "questions":
           require_once("affichage_questions.php");
            break;
            case "joueurs":
            require_once("pages/joueurs.php");
            break;
            case "inscription1":
            require_once("pages/inscription.php");
            break;
            case "creer_questions":
            require_once("pages/creation_questions.php");
            break;
            
        }
    }
    else{
        include("pages/inscription.php");
  
    }
   
             ?>
    </body>