<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Inscription</title>
		<link rel="stylesheet" href="../public/bootstrap/bootstrap.min.css">
	 
		<link rel="stylesheet" href="../public/css/form.css">
        <style type="text/css">
            body{
                  width: 100%;
                  background-image: linear-gradient(skyblue,pink);
                  background-position: center center;
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-size: cover;
                }
          </style>
	</head>

	<body>
		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
                        <center> <h5 style="font-family: Noto Sans; font-weight:bold">Insciption </h5> </center><br>
							<form method="post" action="register.php" enctype="multipart/form-data">
                                <div class="form-group">
                                 
                                    <div id="prev">
                                       <img  alt="" src="img/avatar/avatar.jpg"  id="im" > 
                                       <h3>
                                        <?php
      
                                                if(!isset($_SESSION['statut']))
                                                   {
                                                     echo'<span style="color:black;margin-left:15%">Avatar du Joueur</span>';
                                                   }
                                                else
                                                   {
                                                       echo'<span style="color:black;margin-left:10%">Avatar du Admin</span> ';
                                                   }

                                        ?>
                                       </h3>    
                                       </div>    </div>
                                   <div class="form-group">

									<label>Nom</label>
									<input type="text" name="name" class="form-control"   placeholder="Dia" />
								</div>
								<div class="form-group">
									<label>Prénom</label>
									<input type="prenom" name="prenom" class="form-control" placeholder="Abdoulaye"  />
                                </div>
                                <div class="form-group">
									<label>Pseudo</label>
									<input type="pseudo" name="pseudo" class="form-control"  placeholder="Lazy890"/>
								</div>
								<div class="form-group">
									<label>Mot de passe</label>
									<input type="password" name="password" class="form-control" placeholder="••••••••••••"  />
                                </div>
								<div class="form-group">
									<label>Confirmer mot de passe</label>
									<input type="password" name="passwordconfirm" class="form-control"  placeholder="••••••••••••" />
                                </div>
                                <div class="form-group">
									<label>Avatar</label>
									<input type="file" name="photo" class="form-control" value="Choisir un fichier"  />
								</div>
                                
								<div class="form-group text-right">
									<button class="btn btn-primary btn-block" name="submit">CREER VOTRE COMPTE</button>
								</div>
							 
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

		<script src="../public/js/jquery.js"></script>
		<script src="../public/bootstrap/bootstrap.min.js"></script>
	</body>
</html>