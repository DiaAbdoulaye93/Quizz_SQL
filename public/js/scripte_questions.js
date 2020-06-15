var Ajouter_champ=document.getElementById("ic_supprimer");
var Select_reponse=document.getElementById("liste_type_reponses");
var Affiche_question=document.getElementById("affiche_question");
/*declaration du compteur i*/
var i = 1;
Ajouter_champ.addEventListener('click',Ajout);

/*Fonction qui permet de generer des champs */
function Ajout() 
{
  
   var selecteur=document.getElementById("liste_type_reponses").value;
var t1=document.getElementById("type_text");
var t2=document.getElementById("choix_simple");
var t3=document.getElementById("choix_multiple");

var form = document.getElementById("affiche_question");
   var div = document.createElement("div");
   var divError=document.createElement("div");
   divError.setAttribute('class','error-form');
   divError.id='error'+i; 
   var ident = 'div-'+i;
   div.setAttribute('id', ident);
   var label = document.createElement("input");
   var valuelabel = 'Reponse'+i;
   label.setAttribute('name',valuelabel);
   label.setAttribute('type','button');
   label.setAttribute('value',valuelabel);// class="text-center text-danger"
   label.setAttribute('id',valuelabel);
   label.setAttribute('style', 'class="btn-danger" ');            
  /*Cration champ de texte*/
   var texte = document.createElement("input");
   var valuetexte = 'texte'+i;
   texte.setAttribute('name',valuetexte);
   texte.setAttribute('type','text');
   texte.setAttribute('id',valuetexte);
   texte.setAttribute('error',"error"+i);
   texte.setAttribute('style', 'margin-left:0%;width:50%;margin-top:5%;border-radius:2%');
   /*Creation button radio*/
   var radio = document.createElement("input");
   var valuetexte = 'radio'+i;
  
   radio.setAttribute('type','radio');
  // radio.setAttribute('name',radios);
  radio.setAttribute('name',valuetexte);
  
  radio.setAttribute('id',valuetexte);  
   radio.setAttribute('error',"error"+i);
   // radio.setAttribute('style', 'margin-left:1%;width:2%;margin-top:2.5%;position:absolute;background-color:white');
   /* Creation Du Check Box*/
   var check = document.createElement("input");
   var valuetexte = 'check'+i;
   check.setAttribute('type','checkbox');
   check.setAttribute('name',valuetexte);
   check.setAttribute('id',valuetexte);  
   check.setAttribute('error',"error"+i);
   // check.setAttribute('style', 'margin-left:1%;width:2%;margin-top:3.2%;position:absolute;height:30px;');
    /* Creation boutton de suppression*/
   var bouton = document.createElement("input");
   var value = 'Reponse'+i;
   bouton.setAttribute('name',value);
   bouton.setAttribute('type','button');
   bouton.setAttribute('id',value);
   bouton.setAttribute('onclick','Supp("' + ident + '");');
    bouton.setAttribute('style','background-image:url("./public/images/icones/close.png");background-repeat:no-repeat;height:30px;background-color:white;border:none;width:5%');
  
   /*Debut de la generation des champs en fonction des conditions*/
   if(selecteur=="type_text"){ 
      div.appendChild(label);
      div.appendChild(texte);
      div.appendChild(bouton);
      div.appendChild(divError);
      form.appendChild(div); 
      if(i==1){
       Ajouter_champ.disabled=true;
      } 
   }
  else if(selecteur=="choix_simple"){ 
      div.appendChild(label);
      div.appendChild(texte);
      div.appendChild(radio);
      div.appendChild(bouton);
      div.appendChild(divError);
      form.appendChild(div);  
   }
   else if(selecteur=="choix_multiple"){
      div.appendChild(label);
      div.appendChild(texte);
      div.appendChild(check);
      div.appendChild(bouton);
      div.appendChild(divError);
      form.appendChild(div);  
   }
   i++;
}

/*Fonction qui permet de supprimer un champ*/
function Supp(ident)
{
   var elt = document.getElementById(ident);
   var form = elt.parentNode;
   form.removeChild(elt);
   i=i-1;
   Ajouter_champ.disabled=false;
}


/*Liaison du selecteur de type de  reponse et de l'evenement change*/
Select_reponse.addEventListener("change",reinitialiser_div)

/*Fonction qui permet de reinitialiser la div apres changement d'option select*/
function reinitialiser_div()
{
Affiche_question.innerHTML = "";
i=1
Ajouter_champ.disabled=false;
}

/*Validation coté client du Formulaire */
const inputs=document.getElementsByTagName("input");
for(input of inputs){
input.addEventListener("keyup",function(e){
   if(e.target.hasAttribute('error')){
       var idDivError=e.target.getAttribute("error");
       document.getElementById(idDivError).innerText=""
   }

})
}
$(document).on('submit', '#add-question', function(event)
 
{
  
	 
    event.preventDefault();
    
/*Debut validation des inputs de types text*/
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
  /*Fin validation des inputs de types text*/

  /************ Debut Validation du select *********/
  const select=document.getElementById("liste_type_reponses");
  var error1=false;
  if(select.hasAttribute("error"))
  {
       var idDivError1=select.getAttribute("error");
       if(!select.value)
       {
           document.getElementById(idDivError1).innerText="Selectionner un type de reponse";
           error1=true
       } 
    
   }
    /************ Fin Validation du select *********/

   /************ Validation des inputs de type  radio *********/
   
  const Radio_valide = document.querySelectorAll('input[type="radio"]');
   var error2=false;
   var compteur=0;
   for (const Radio_buton of Radio_valide) {
      
       if (Radio_buton.checked ) {
         error2=false;
           compteur++;
       }

 }
 if(compteur !=1)
 {
 
   for (const Radio_buton of Radio_valide)
   {
     
       if(Radio_buton.hasAttribute("error"))
       {
           {
               var idDivError2=Radio_buton.getAttribute("error");
               document.getElementById(idDivError2).innerText="Cocher la bonne reponse";
               error2=true;
           }

       }     
   }
}
    /************FIN Validation des inputs de type  radio *********/

  /*********** Debut Validation des inputs de type Checkbox ************/


const Check_buttons=document.querySelectorAll('input[type="checkbox"]');
var error3=false;
var compteur1=0;
for (const check_i of Check_buttons)
{ 
       if (check_i.checked) 
       {
            compteur1++;
                
       }
 }
 if(compteur1<=1)
   {
    
       for (const check_i of Check_buttons)
       {
           if(check_i.hasAttribute("error"))
           {
               var idDivError3=check_i.getAttribute("error"); 
               document.getElementById(idDivError3).innerText="Veuillez cocher au minimum deux reponses valides";
               error3=true;
           }
           else
           {
            
               document.getElementById(idDivError3).innerText="";
           }
       }  
      
   }
    /*************Fin Validation des inputs de type Checkbox ************/

if(error || error1||   error2  || error3){
   e.preventDefault();
   return false;
}
var lbl_question = $('#lbl_question').val();
var points = $('#pts_question').val();
var type_reponse = $('#liste_type_reponses').val();
var text=$('#texte'+i).val();
var radio_button=$('#radio'+i).val();
$.ajax({
    url:"./data/insert_question.php",
    method:'POST',
    data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    {
        alert(data);
        $container.load(`${url}`);
        
    }
});
})
