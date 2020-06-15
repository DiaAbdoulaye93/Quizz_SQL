 
	<form  method="post" action="index.php?action=connexion" enctype="multipart/form-data"  id="connexion-form">	
		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
						<center> <h5 style="font-family: Noto Sans;">CONNEXION </h5><h4 style="font-family: Noto Sans;">QUIZZ EN LIGNE</h4></center><br>
						<span  class="text-center text-danger" id="error-connexion">Login ou mot de passe incorrecte</span>
								<div class="form-group">
									 
									<input type="text" name="login" error="error-1" class="form-control" placeholder="Nom User"  value="<?php // echo $pseudo ?>">
									<div class="error-form" id="error-1" style='color:red' ></div>
								 
								</div>
								<div class="form-group">
									 
									<input type="password" name="password" error="error-2" class="form-control" placeholder="••••••••••"  value="<?php //echo $pass ?>">
									<div class="error-form" id="error-2" style='color:red' ></div>
								 
								
									<div class="form-group">      </div>  
							
								</div>
								<div class="form-group text-right">
									<input class="btn btn-primary btn-block" name="submit" type="submit"  value="CONNEXION" id="btn-connection"  />
								</div>
								<div class="lien_inscrip">
								<!-- <input type="button" id="inscription" name="inscription" value="incription"> -->
								<a id="inscription" lien="index.php?action=inscription" href="#" >S'inscrire pour jouer</a>
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
document.getElementById("connexion-form").addEventListener("submit",function(e){
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
 