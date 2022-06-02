function elimina($id){
    var token = $("meta[name='csrf-token']").attr("content");
    var idFaq= $id;
    if (confirm("Sei sicuro di voler cancellare la Faq?")){
        $.ajax({
            url: "GestioneFaq/"+idFaq,
            type: 'POST',
            data:{
                'id':idFaq,
                "_token":token
                
            },
            success:function(data){
                console.log("funzaionao"+$id);
                window.location.replace(data.redirect)
            }
        });
    }
    else return false;
}

function showmodalForm(id){
    $potato= $("#faq-domanda\\["+id+"\\]").text();
    $mylifeis= $("#faq-risposta\\["+id+"\\]").text();
    $("#domandamaybe").val($potato);
    $("#rispostamaybe").val($mylifeis);
    $("#faqid").val(""+id+"");
    $("#myModal").show();  
    };    
   
function closemodal($id){   
    $("#"+$id).hide();
    };   

function openmodal(){
    $("#myModalAdd").show();
}


