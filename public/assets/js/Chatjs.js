function visualizzamessaggi($id,$roleloggato,$nome,$cognome,$username){
    var token = $("meta[name='csrf-token']").attr("content");
    var nome= $nome;var cognome=$cognome; var username=$username;
    
    var role= $roleloggato;
    var idAnn=$id;
    $.ajax({
        type: 'GET',
        url: "Chat/"+idAnn,
        data:{          
            '_token': token           
        },
        dataType:'json',
        success: function(data){
            visualizzaconv(data, role);
            textbox(idAnn);
            cambianome(nome,cognome,username);
        }
    });
}

function visualizzaconv(data, role){   
    $("div").remove(".rimuovi");
    $.each(data,function(key,val){
        
    if(role=='locatario'){    
        if ((val.sender)==false){
        $("#contenitore-messaggi").append('<div class="row rimuovi"><div class="mess-inviato"><p>'+val.contenuto+'</p><div>'+val.created_at+'</div></div></div>');
        } else {
        $("#contenitore-messaggi").append('<div class="row rimuovi"><div class="mess-ricevuto"><p>'+val.contenuto+'</p><div>'+val.created_at+'</div></div></div>');    
        }
    };
    
   if(role=='locatore'){    
        if ((val.sender)==true){
        $("#contenitore-messaggi").append('<div class="row rimuovi"><div class="mess-inviato"><p>'+val.contenuto+'</p><div>'+val.created_at+'</div></div></div>');
        } else {
        $("#contenitore-messaggi").append('<div class="row rimuovi"><div class="mess-ricevuto"><p>'+val.contenuto+'</p><div>'+val.created_at+'</div></div></div>');    
        }
    };
});
}

function textbox(id){
    $("#textbox").empty();
    $("#textbox").append('<input type="text" id="testomessaggio"><input type="button" value="INVIA" onclick="mandamess('+id+')">');
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

function cambianome($nome,$cognome,$username){
    $('#chat-parte-destra-header-nome').text($nome+' '+$cognome);
    $("#chat-parte-destra-header-username").text($username);
}