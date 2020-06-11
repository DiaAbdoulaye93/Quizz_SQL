  
  <script src="../jquery-slim.min.js"></script>
 
    
    <link rel="stylesheet" href="../public/bootstrap/bootstrap.min.css">
    <script src="../public/js/jquery.js"></script>
		<script src="../public/bootstrap/bootstrap.min.js"></script>
<div class="container">
<div class="table-responsive">
    <div id="live_data">
 
     
    </div>
</div>
</div>
<script>
    $(document).ready(function(){
       function fetch_data()
       {
           $.ajax({
                  url:"../data/recuperation.php",
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
            url:"../data/edit.php",
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
        edit_data(id,nom, "nom");
    });

    $(document).on('blur', '.prenom' , function() {
        var id=$(this).data("id2");
        var prenom=$(this).text();
        edit_data(id,prenom, "prenom");
    });
    
    $(document).on('click','.btn_delete',function(){
        var del_id= $(this).attr('id3');
        var $ele = $(this).parent().parent();
        $.ajax({
            type:'POST',
            url:'../data/supprimer.php',
            data:{'del_id':del_id},
            success: function(data){
                 if(data=="YES"){
                    $ele.fadeOut().remove();
                    fetch_data();
                 }else{
                        alert("can't delete the row")
                 }
             }

            });
        });
 
/* $(document).on('click', '.btn_delete', function(){
     var id=$(this).data("id3");
     if(comfirm("Veux tu supprimer cet utilisateur"))
     {
        $.ajax({

        url:"../data/supprimer.php",
        method:"POST",
        data:{id:id},
        dataType:"text",
        success:function(data)
            {
                alert(data);
                fetch_data();
            }
     });
     }
     
    });*/    
    });
    
</script>
   <script src="../jquery.min.js"></script>
<?php
?>