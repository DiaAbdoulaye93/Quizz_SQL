<html>
	<head>
		<title>Liste des joueurs</title>
	
		 
	</head>
	<body>
		<div class="container box">
		 
			<br />
			<div class="table-responsive">
				<br />
				 
 				<table id="user_data" class="table table-bordered  ">
					<thead>
						<tr>
						<th width="10%">Image</th>
							<th width="35%">Nom</th>
							<th width="35%">Prénom</th>
							<th width="10%">Pseudo</th>
							<th width="35%">Score</th>
							<th width="35%">Actif</th>
							<th width="10%">Modifier</th>
							<th width="10%">Supprimer</th>
						</tr>
					</thead>
					<tbody>
					
					</tbody id="show_data">
				</table>
				
			</div>
		</div>
	</body>
</html>
  <div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add User</h4>
				</div>
				<div class="modal-body">
				<div class="form-group">

<label>Nom</label>
<input type="text" name="nom" id="nom" class="form-control"  error="error-1" placeholder="Dia"    />
 
</div>
<div class="form-group">
<label>Prénom</label>
<input type="prenom" name="prenom" id="prenom" class="form-control" error="error-2" placeholder="Abdoulaye"     />
  
</div>
<div class="form-group">
<label>Pseudo</label>
<input type="pseudo" name="pseudo" id="pseudo" class="form-control" error="error-3" placeholder="Lazy890"  />
  
</div>
<div class="form-group">
<label>Mot de passe</label>
<input type="password" name="password" id="password" class="form-control" error="error-4" placeholder="••••••••••••"   />
  
</div>
<div class="form-group">
<label>Confirmer mot de passe</label>
<input type="password" name="passwordconfirm" id="passwordconfirm" class="form-control"  error="error-7" placeholder="••••••••••••"  />
<div class="form-group" id="label_type">
<label>type</label>
<input type="number" name="actif" id="actif" class="form-control"  min="0" max="1"     />
  
</div>
					<label>Selectionner une image</label>
					<input type="file" name="user_image" id="user_image" />
					<span id="user_uploaded_image"></span>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="user_id" id="user_id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
				</div>
			</div>
		</form>
	</div>
</div>
<script src="./public/js/scripte.js"></script>