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
            //window.location.replace(data.redirect);
            mantieniChat(testo);
        },
        error: function(){
            alert("Non puoi inviare un messaggio se non hai una chat già aperta con un altro utente");
        }
    });
    
}

function cambianome($nome,$cognome,$username){
    $('#chat-parte-destra-header-nome').text($nome+' '+$cognome);
    $("#chat-parte-destra-header-username").text($username);
}

function mantieniChat($testo){
     
     

        function format(cambio){
            if(cambio < 10)
             {cambio   = "0"+cambio;}
            return cambio;
       }

       const d = new Date();
       var anno= d.getFullYear();
       var mese=d.getMonth()+1;
       var mese=format(mese);
       var giorno=d.getDate();
        var giorno=format(giorno);
       var ora=d.getHours();
       var ora=format(ora);
       var minuti=d.getMinutes();
       var minuti=format(minuti);
       var secondi=d.getSeconds();
       var secondi=format(secondi)

       var today= ""+anno+"-"+mese+"-"+giorno+" "+ora+":"+minuti+":"+secondi+"";
       
      $("#contenitore-messaggi").append('<div class="row rimuovi"><div class="mess-inviato"><p>'+$testo+'</p><div>'+today+'</div></div></div>');
}