<form method="post"  id="add-question" name="add-question"  enctype="multipart/form-data" >
<div  class="container box">
<br>
<div class="form-group">
<label for="" class="col-sm-2 control-label"> Saiisir libellé de la question:</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="lbl_question" name="lbl_question" error="error-1">
<span class="error-form" id="error-1"></span>
</div>
<div class="form-group">
<br><br><br><label for="" class="col-sm-2  control-label">Nombre de points:</label>
<div class="col-sm-4">
<input type="number" class="form-control" id="pts_question" name="pts_question" error="error-2">
<span class="error-form" id="error-2"></span>
</div>
<div class="form-group">
<br><br><br><label for="" class="col-sm-2  control-label">Type de réponse:</label>
<div class="col-sm-7">
<select name="liste_type_reponses" id="liste_type_reponses" class="col-sm-6" style="height:37px" error="error-3">
<option value=""></option>
<option value="type_text" id="type_text">Reponse type text</option>
<option value="choix_simple"  id="choix_simple">Réponse a choix simple</option>
<option value="choix_multiple"  id="choix_multiple">Réponse a choix multiple</option>
</select>
<!-- <input id="ic_supprimer" type="button"  style="background-image:url('./public/images/icones/cliqueajout.png');" > -->
<img src="./public/images/icones/cliqueajout.png" alt="" id="ic_supprimer">
<span class="error-form" id="error-3"></span>
</div>
</div>
<div class="col-sm-7"  id="affiche_question">
</div>
<div class="form-group">
<input type="submit" class="btn btn-primary" value="Enregistrer la question" name="soumission" id="soumission">
</div>
</div>
<script src="./public/js/scripte_questions.js" ></script>
 
</form>