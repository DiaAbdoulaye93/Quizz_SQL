
   $(document).ready(function(){
   
function fetch_data()
{
    $.ajax({
           url:"../../data/recuperation.php",
           method:"POST",
           success:function(data)
           {
               $('#live_data').html(data);
           }
    });
}
fetch_data();



function edit_data(id,text, column_name)
{
    $.ajax({
        url:"edit.php",
        method:"POST",
        data:{id:id, text:text, column_name:column_name},
        dataType:"text",
        success:function(data)
        {
            alert(data);
        }
    });
}
$(document).on('blur', '.nom' , function()
{
    var id=$(this).data("id1");
    var nom=$(this).text();
    edit_data(id,text, "nom");
});

$(document).on('blur', '.prenom' , function()
{
    var id=$(this).data("id2");
    var prenom=$(this).text();
    edit_data(id,text, "prenom");
});
$(document).on('click', 'btn_delete',function(){
 var id=$(this).data("id3");
 if(comfirm("Veux tu supprimer cet utilisateur"))
 {
    $.ajax({
    url:"supprimer.php";
    data:{id:id},
    dataType:"text",
    success:function(data)
        {
            alert(data);
            fetch_data()
        }
 });
 }
 
});
$('#inscription').click(function(e){
    const form = $('#form');
   
        fileContentLoader(form,'pages/inscription.php');
    
});

});
