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
        success: function(data){
            visualizzaconv(data);
            textbox(idAnn);
        }
    });
}

function visualizzaconv(data){   
    $("div").remove(".rimuovi");
    $.each(data,function(key,val){
    if((data.sender)==true){
    $("#contenitore-messaggi").append('<div class="row rimuovi"><div class="mess-inviato"><p>'+val.messaggio+'</p><div>'+val.ora+'</div></div></div>');
    } else {
    $("#contenitore-messaggi").append('<div class="row rimuovi"><div class="mess-ricevuto"><p>'+val.messaggio+'</p><div>'+val.ora+'</div></div></div>');    
    }
});
}

function textbox(id){
    $("textbox").empty();
    $("textbox").append('<input type="text" id="testomessaggio"><input type="button" value="INVIA" onclick="mandamess('+id+')">');
}

function mandamess($id){
    var testo=$("#testomessaggio").val();
    var token = $("meta[name='csrf-token']").attr("content"); 
    var ricevente= $id;
    $.ajax({
        type: 'POST',
        url: "Chat",
        dataType:'json',
        data:{
            'testo': testo,
            '_token': token,    
            'idricevente': ricevente
                    
        },        
        success: function(data){
            window.location.replace(data.redirect);
        }
    });
    
}