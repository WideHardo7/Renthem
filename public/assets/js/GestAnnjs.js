function elimina($id){
    var token = $("meta[name='csrf-token']").attr("content");
    var idAnn= $id;
    if (confirm("Sei sicuro di voler cancellare l' Annuncio?")){
        $.ajax({
            url: "GestioneAnnunci/"+idAnn,
            type: 'POST',
            data:{
                'id':idAnn,
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

function visint($id){
    var token = $("meta[name='csrf-token']").attr("content"); 
    var idAnn=$id;
    $.ajax({
        type: 'GET',
        url: "GestioneAnnunci/"+idAnn,
        data:{
            'id':idAnn,
            '_token': token           
        },
        dataType:'json',
        success: function(data){ fillmodal (data, idAnn); }
    });
}

function fillmodal(data,id){
   $("tr").remove(".remove");
   $.each(data,function(key,val){
        var dob = new Date(val.data_nascita);
        var today = new Date();
        var dayDiff = Math.ceil((today - dob) / (1000 * 60 * 60 * 24 * 365));
        $("#appendme").append('<tr class="remove"><td>'+val.nome+'</td><td>'+val.cognome+'</td><td>'+dayDiff+'</td><td>'+val.genere+'</td><td><button onclick="openchat()">Chatta</button></td><td><button onclick="assegna('+id+','+val.id+')">Assegna</button></td></tr>');
    });
    $("#myModal").show();
}

function openchat(){
    window.location.replace("Chat");
}

function closemodal($id){
    $("#"+$id+"").hide();
}

function assegna($id, $loca){
    
    var token = $("meta[name='csrf-token']").attr("content");
    var loca=$loca;
    var idAnn= $id;
    if (confirm("Sei sicuro di voler assegnare l' Annuncio?")){
        $.ajax({
            url: "GestioneAnnunci/Assegna/"+idAnn+"&"+loca,
            type: 'POST',
            data:{
                'id':idAnn,               
                "_token":token
                
            },
            success:function(data){
                console.log("funzaionao"+$id);
                window.location.replace(data.redirect);
            },
            error: function(){
                alert("L'alloggio è stato già assegnato");
            }
        });
    }
    else return false;

    
}