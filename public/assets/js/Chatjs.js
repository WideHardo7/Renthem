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
        success: function(data){ visualizzaconv(data); }
    });
}

function visualizzaconv(data){
    $("div").remove(".rimuovi");
    $.each(data,function(key,val){
    if((data.sender)==true){
    $("#contenitore-messaggi").append('<div class="row rimuovi"><div class="mess-inviato"><p>'+data.messaggio+'</p><div>'+data.ora+'</div></div></div>');
    } else {
    $("#contenitore-messaggi").append('<div class="row rimuovi"><div class="mess-ricevuto"><p>'+data.messaggio+'</p><div>'+data.ora+'</div></div></div>');    
    }
});
}
