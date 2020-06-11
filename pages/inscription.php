 
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Inscription</title>
	 
       
	</head>
	<script>
    function previewImage(event)
    {
        var reader=new FileReader();
        var imageField=document.getElementById("im")
        reader.onload=function()
        {
            if(reader.readyState==2)
            {
                imageField.src=reader.result;
            }
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
	<body>
		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
                        <center> <h5 style="font-family: Noto Sans; font-weight:bold">Insciption </h5> </center><br>
							<form method="post"   id="formulaire_inscription" enctype="multipart/form-data">
                                <div class="form-group">
                                 
                                   
                                       <img  alt="" src="public/images/avatar/avatar.jpg" id="im" class="img" > 
                                       <h3>
                                        <?php
      
                                                if(!isset($_SESSION['userConnect']))
                                                   {
												 
                                                     echo'<span style="color:black;margin-left:15%">Avatar du Joueur</span>';
                                                   }
                                                else
                                                   {
													   
                                                       echo'<span style="color:black;margin-left:10%">Avatar du Admin</span> ';
                                                   }

                                        ?>
                                       </h3>    
                                       </div>
                                   <div class="form-group">

									<label>Nom</label>
									<input type="text" name="nom" class="form-control"     />
								    
								</div>
								<div class="form-group">
									<label>Prénom</label>
									<input type="prenom" name="prenom" class="form-control" error="error-2" placeholder="Abdoulaye"     />
									 <span class="error-form" id="error-2"></span>
		                              <!-- <span style='color:red'><?php  //echo $message ?></span> -->
                                </div>
                                <div class="form-group">
									<label>Pseudo</label>
									<input type="pseudo" name="pseudo" class="form-control" error="error-3" placeholder="Lazy890" />
								 
								</div>
								<div class="form-group">
									<label>Mot de passe</label>
									<input type="password" name="password" id="password" class="form-control" error="error-4" placeholder="••••••••••••"   />
								    
                                </div>
								<div class="form-group">
									<label>Confirmer mot de passe</label>
									<input type="password" name="passwordconfirm" id="passwordconfirm" class="form-control"  error="error-7" placeholder="••••••••••••"   />
								  
                                </div>
                                <div class="form-group">
									<label>Avatar</label>
									<input type="file" name="user_image" id="user_image"   onchange="previewImage(event)" />
					<span id="user_uploaded_image"></span>
								</div>
								 
								<div class="form-group text-right">
									<input type="submit" class="btn btn-primary btn-block" name="enregistrer" id="enregistrer" value="CREER VOTRE COMPTE"/>
								</div>
							 
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	 
	</body>
	<script src="./public/js/scripte.js"></script>
</html>