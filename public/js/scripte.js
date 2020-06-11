$(document).ready(function(){
	$('#enregistrer').val("Ajouter");
	$('#add_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').text("Ajouter un Administrateur");
		$('#action').val("Ajouter");
		$('#operation').val("Ajouter");
		$('#user_uploaded_image').html('');
	});
	
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"./data/fetch.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 3, 4],
				"orderable":false,
			},
		],

	});

	$(document).on('click', '#enregistrer', function(event){
		alert('ok');
		event.preventDefault();
		var nom = $('#nom').val();
		var prenom = $('#prenom').val();
		var pseudo = $('#pseudo').val();
		var pass = $('#password').val();
		var passwordconfirm = $('#passwordconfirm').val();
	 
		var extension = $('#user_image').val().split('.').pop().toLowerCase();
		if(extension != '')
		{
			if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1)
			{
				alert("Invalid Image File");
				$('#user_image').val('');
				return false;
			}
		}	
		if(pass != passwordconfirm )
		{
			alert("Confirmation password requise");
			return false;
		}
		if(nom != '' && prenom != '' && pseudo != '' && pass != '' && passwordconfirm != '')
		{
			$.ajax({
				url:"./data/insert.php",
				method:'POST',
			 
				success:function(data)
				{
					alert(data);
				 
					 
				}

			});
		}
		else
		{
			alert("Tout les champs sont obligatoirs");
		}
	});
	
	$(document).on('click', '.update', function(){
		var user_id = $(this).attr("id");
		$.ajax({
			url:"./data/fetch_single.php",
			method:"POST",
			data:{user_id:user_id},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				
				$('#nom').val(data.nom);
				$('#prenom').val(data.prenom);
				$('#pseudo').val(data.pseudo);
				$('#password').val(data.pass);
				$('#passwordconfirm').val(data.passwordConfirm);
				$('.modal-title').text("Modifier un joueur");
				$('#user_id').val(user_id);
				$('#actif').val(data.actif);
				$('#user_uploaded_image').html(data.user_image);
				$('#action').val("Modifier");
				$('#operation').val("Modifier");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var user_id = $(this).attr("id");
		if(confirm("VOULEZ VOUS VRAIMENT SUPPRIMER CET UTILISATEUR..!"))
		{
			$.ajax({
				url:"./data/delete.php",
				method:"POST",
				data:{user_id:user_id},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;	
		}
	});
	$(".nav-link").on("click",function(){
		//Récuperation du lien sur lequel l'admin à cliquer
			$lien_encour=$(this);
	   //Récuperation de l'url sauvegarder dans l'attribut lien
			const url= $lien_encour.attr("lien");
	   //Récuperation de la partie droite de la page layout_admin.php      
			const $container=$("#container-admin"); 
			//Vider le Condenu avant de Faire le Load
			  $container.html("")
			  $container.load(`${url}`);
 
			 
 
 })
 $("#inscription").on("click",function(){
	//Chargent de la vue Inscription dans le fichier layout.php
const container=$("#container"); 
$container.html("")
  container.load(`${URL_ROOT}=inscription`);
})
	
});