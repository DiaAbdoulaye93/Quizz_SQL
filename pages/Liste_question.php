<html>
	<head>
		<title>liste questions</title>
	
		 
	</head>
	<body>
		<div class="container box">
		 
			<br />
			<div class="table-responsive">
				<br />
				 
 				<table id="liste_questions" class="table table-bordered  ">
					<thead>
						<tr>
						<th width="55%">Libellé question</th>
                        <th width="15%">Type question</th>
							<th width="10%">Nombre de points</th>
							 
							<th width="10%">Modifier</th>
							<th width="10%">Supprimer</th>
						</tr>
					</thead>
					<tbody>
					
					</tbody>
				</table>
				
			</div>
		</div>
	</body>
	<script src="./public/js/scripte.js" ></script>
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

<label>Question</label>
<input type="text" name="question" id="question" class="form-control"  error="error-1" placeholder="****"    />
 
</div>
<div class="form-group">
<label>Points</label>
<input type="text" name="points" id="point" class="form-control" error="error-2" placeholder="Abdoulaye"     />
  
</div>
<div class="form-group" id="affiche_reponse" name="affiche_reponse">
<label>Reponse</label>	 
<input type="text" name="reponse1" id="reponse1" class="form-control" error="error-2" placeholder=" "     />
</div>
				<div class="modal-footer">
					<input type="hidden" name="user_id" id="user_id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="actione" class="btn btn-success" value="Modifier" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
				</div>
			</div>
		</form>
	</div>
</div>
