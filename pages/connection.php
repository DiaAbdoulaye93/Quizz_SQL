<?php
	
	$message=$message1=$pseudo=$pass=$echec="";	
	 
	if(isset($_POST['submit']))
	{	
		$pseudo = $_POST['pseudo'];
		$pass = $_POST['password'];
		 	
		$str = "SELECT * FROM utilisateur WHERE pseudo ='$pseudo' and pass='$pass'";
		$result = mysqli_query($con,$str);
		if((mysqli_num_rows($result))!=1) 
		{
		 	echo "<center><h3><script>alert('Mot de pass incorrect ');</script></h3></center>";
		//	header("refresh:0;url=index.php");
		}
		else
		{
            $_SESSION['pseudo']=$pseudo;
			$row=mysqli_fetch_array($result);
			$_SESSION['name']=$row[1];
		 	$_SESSION['prenom']=$row[2];
            if($row[6]=="superadmin")
            {
                echo "<center><h3><script>alert('Connexion Ok ');</script></h3></center>";
              header('location: index.php?lien=accueil'); 
            }
		
							
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Connexion</title>
		 
        <style type="text/css">
         
          </style>
	</head>

	<body>
	<form method="post" action="" enctype="multipart/form-data" id="form-connexion">	
		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
						<center> <h5 style="font-family: Noto Sans;">CONNEXION </h5><h4 style="font-family: Noto Sans;">QUIZZ EN LIGNE</h4></center><br>
						
								<div class="form-group">
									 
									<input type="text" name="pseudo" error="error-1" class="form-control" placeholder="Nom User"  value="<?php echo $pseudo ?>">
									<div class="error-form" id="error-1"></div>
									<span style='color:red' ><?php  echo $message ?></span>
								</div>
								<div class="form-group">
									 
									<input type="password" name="password" error="error-2" class="form-control" placeholder="••••••••••"  value="<?php echo $pass ?>">
									<div class="error-form" id="error-2"></div>
									<span style='color:red' ><?php  echo $message1 ?></span>
								</div>  
								<div class="form-group text-right">
									<input class="btn btn-primary btn-block" name="submit" type="submit"  value="CONNEXION" id="button"/>
								</div>
								<div class="lien_inscrip">
									<span class="text-muted"></span> <a href="index.php?lien=inscription">S'inscrire pour Jouer</a>
								</div>
		
						</div>
					</div>
				</div>
			</div>
		</section>
		<script>
const inputs=document.getElementsByTagName("input");
for(input of inputs){
    input.addEventListener("keyup",function(e){
        if(e.target.hasAttribute('error')){
            var idDivError=e.target.getAttribute("error");
            document.getElementById(idDivError).innerText=""
        }
     
    })
}
document.getElementById("form-connexion").addEventListener("submit",function(e){
    const inputs=document.getElementsByTagName("input");
    var error=false;
    for(input of inputs){
        if(input.hasAttribute("error")){
            var idDivError=input.getAttribute("error");
            if(!input.value){
                document.getElementById(idDivError).innerText="Ce Champ est obligatoire";
                error=true
            } 
         
        }
       }
    if(error){
        e.preventDefault();
        return false;
    }
})
   
 


</script>
</form>	
	</body>
</html>