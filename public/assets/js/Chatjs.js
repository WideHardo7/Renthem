function visualizzamessaggio($id){
     var token = $("meta[name='csrf-token']").attr("content"); 
    var idAnn=$id;
    $.ajax({
        type: 'GET',
        url: "Chat/"+idAnn,
        data:{
            
            '_token': token           
        },
        dataType:'json',
        success: function(data){ visualizzaconv (data); }
    });
}

function visualizzaconv(data){
    
}
