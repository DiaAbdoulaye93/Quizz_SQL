 const URL_ROOT="index.php?action";
 $(document).ready(function(){
	$('#add_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').text("Ajouter un Administrateur");
		$('#actione').val("Ajouter");
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

	var dataTables = $('#liste_questions').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"./data/show_questions.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 3, 4],
				"orderable":false,
			},
		],

	});

	$(document).on('submit', '#user_form', function(event){
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
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#user_form')[0].reset();
					$('#userModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Tout les champs sont obligatoirs");
		}
	});
	//aJOUR USER
	$(document).on('submit', '#formulaire_inscription', function(event){
	 
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
				url:"./data/add_user.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
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
				$('#actif').val(data.actif);
				$('#user_id').val(user_id);
				$('#user_uploaded_image').html(data.user_image);
				$('#actione').val("Modifier");
				$('#operation').val("Edit");
			}
		})
	});



	$(document).on('click', '.update_question', function(){
	 
		var user_id = $(this).attr("id");
		$.ajax({
			url:"./data/modifier_question.php",
			method:"POST",
			data:{user_id:user_id},
			dataType:"json",
			success:function(data)
			{
				$('.modal-title').text("Details de la question");
				$('#userModal').modal('show');
		
				$('#question').val(data.question);
			  $('#point').val(data.point);
			 
				$('#user_id').val(user_id);
				$('#reponse1').val(data.reponse1);
				$('#actione').val("Modifier");
				$('#operation').val("Edit");
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
	$error_conexion=$("#error-connexion");
	$error_conexion.fadeOut(2000);
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
	 
const $container=$("#container"); 
$container.html("")
  $container.load(`${URL_ROOT}=inscription`);
   
//  alert("ok");
})
$("#connexion-form").submit((event)=>{ 
	event.preventDefault();
	
	$form=$("#connexion-form")
	url = $form.attr("action" );
	//Faire ici la Validation du Formulaire
//alert(url);
$.post(url,  $form.serialize() ,
	   function(data, status){
			 if(data.trim()!="error"){
				
			 window.location.replace(`${URL_ROOT}=${data}`)
			 }else{
				$error_conexion.show();
			 }
	   // 
	  });  
	  
})
const $btn_deconnexion=$("#btn_deconnexion")
//Traitement de Déconnexion
$btn_deconnexion.on("click",()=>{
	$.get(`${URL_ROOT}=deconnexion`, (data, status)=>{
			 window.location.replace("index.php")
		});
  })




});
  

