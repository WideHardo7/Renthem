@extends('layouts.homepageLayout')
@section('title', 'Modifica Alloggio')


@section('scriptsModann')
@parent
<script src="{{ asset('assets/js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>

$(document).ready(function () {
$tipo="{!!$ann->tipologia!!}";
if ($tipo === "Posto Letto"){    
    $('#PostoL').show();
    $("#Appartament").children().find($(":input")).prop("disabled", true);
} else 
{
    $('#Appartament').show();
    $("#PostoL").children().find($(":input")).prop("disabled", true);
}
});

$(document).ready(function () {
    $('option').mousedown(function (e) {
        e.preventDefault();
        var originalScrollTop = $(this).parent().scrollTop();
        console.log(originalScrollTop);
        $(this).prop('selected', $(this).prop('selected') ? false : true);
        var self = this;
        $(this).parent().focus();
        setTimeout(function () {
            $(self).parent().scrollTop(originalScrollTop);
        }, 0);
        return false;
    });
}
); 

</script>

<script>
$(function () {
    var actionUrl = "{{ route('insertmod') }}";
    var formId = 'formAnnuncio';
    $(":input").on('blur', function (event) {
        var formElementId = $(this).attr('id');
        doElemValidation(formElementId, actionUrl, formId);
    });
    $("#formAnnuncio").on('submit', function (event) {
        event.preventDefault();
        doFormValidation(actionUrl, formId);
    });
});
</script>
@endsection



@section('schedaMod')
<div class="inside-banner">
  <div class="container"> 
      <span class="pull-right"></span>
    <h2>Specifiche Alloggio</h2>
</div>
</div>

<!-- banner -->


<div class="container"><br><br>
    <div class="row"> 
        {{ Form::open(array('route' => ['insertmod',$ann->AnnuncioId], 'id'=>'formAnnuncio', 'files'=>true)) }}                   
                <div class="wrap-input">
                    {{ Form::textarea('descrizione', $ann->descrizione, ['cols'=>135, 'rows' =>5, 'placeholder'=>"Descrizione generale dell'alloggio.", 'id' => 'descrizione']) }}                   
                </div>
        <div id='takeTHIS' hidden="true">{{$ann->AnnuncioId}}</div>
                    {{Form::hidden("tipologia",$ann->tipologia,["id"=>"tipologia"])}}
                    {{Form::hidden("AnnuncioId",$ann->AnnuncioId,["id"=>"AnnuncioId"])}}                    
                <div class="spacer">
                    <div class='row', id='caratteristiche_generale'>
                        <div class='col-lg-6'>

                            <div  class="wrap-input  rs1-wrap-input">
                                {{ Form::label('immagine', 'Immagine', ['class' => 'label-input']) }}
                                {{ Form::file('immagine', ['class' => 'input', 'id' => 'immagine']) }}                               
                            </div>

                            <div class="wrap-input">
                                {{ Form::label('citta', 'Cittá', ['class' => 'label-input']) }}
                                {{ Form::text('citta',$ann->citta, ['class' => 'input', 'id' => 'citta', 'placeholder'=>'es: Ancona']) }}                           

                            </div>
                            <div class="wrap-input">
                                {{ Form::label('zona_quartiere', 'Zona e/o quartiere', ['class' => 'label-input']) }}
                                {{ Form::text('zona_quartiere', $ann->zona_quartiere, ['class' => 'input', 'id' => 'zona_quartiere', 'placeholder'=>'es: Q1']) }}                           

                            </div>
                            <div class="wrap-input">
                                {{ Form::label('indirizzo', 'Indirizzo', ['class' => 'label-input']) }}
                                {{ Form::text('indirizzo',$ann->indirizzo, ['class' => 'input', 'id' => 'indirizzo', 'placeholder'=>'es: via Marco Polo 45']) }}                           

                            </div>
                            <div class="wrap-input">
                                {{ Form::label('importo', 'Canone affitto €/mese ', ['class' => 'label-input']) }}
                                {{ Form::text('importo', $ann->importo, ['class' => 'input', 'id' => 'importo', 'placeholder'=>'es: 400']) }}                           
                            </div>                           
                            <div class="wrap-input">
                                {{ Form::label('eta_minima', 'Etá minima neccessaria', ['class' => 'label-input']) }}
                                {{ Form::text('eta_minima',$ann->eta_minima, ['class' => 'input', 'id' => 'eta_minima', 'placeholder'=>'es: 18']) }}                           
                            </div>
                            
                            <div class="wrap-input">
                                {{ Form::label('genere_richiesto', 'Vincolo genere del locatario')}}
                                {{ Form::select('genere_richiesto', array('uomini' => 'uomini', 'donne' => 'donne', 'non specificato' => 'non specificato'),
                                                                          $ann->genere_richiesto, array('id' => 'genere_richiesto'))}}
                            </div>
                            <div class="wrap-input">
                                {{ Form::label('data_inizio_disponibilita', 'Data inizio disponibilita')}}
                                {{ Form::date('data_inizio_disponibilita',$ann->data_inizio_disponibilita) }}
                            </div>
                            <div class="wrap-input">
                                {{ Form::label('data_fine_disponibilita', 'Data fine disponibilita')}}
                                {{ Form::date('data_fine_disponibilita', $ann->data_fine_disponibilita) }}
                            </div>
                            
                        </div>
                        
                        <!--inizio form APPARTAMENTO-->

                        <div class='col-lg-6'>
                            <div class='desc', id='Appartament' hidden="true">
                                <h4><b><ins>Caratteristiche Appartamento</ins></b></h4>

                                <div class="wrap-input">
                                    {{ Form::label('dimensione', 'Superficie appartamento in mq') }}
                                    {{ Form::text('dimensione', $ann->dimensione, ['class' => 'input', 'id' => 'A_dimensione', 'placeholder'=>'es: 78']) }}                           
                                </div>
                                <div class="wrap-input">
                                    {{ Form::label('A_numero_camere', 'N° camere' )}}
                                    {{ Form::text('A_numero_camere', $ann->A_numero_camere, ['placeholder'=>'es: 3', 'id' => 'A_numero_camere']) }}                           
                                </div>
                                <div class="wrap-input">
                                    {{ Form::label('A_locali_presenti', 'Locali presenti')}}
                                    {{ Form::select('A_locali_presenti[]', array('Studio' => 'Studio', 'Bagno Singolo' => 'Bagno Singolo',
                                                                         'Cucina' => 'Cucina','Sala multiuso' => 'Sala multiuso',
                                                                         'Bagno doppio' => 'Bagno doppio', 'Garage' => 'Garage'),
                                                                          $localarray , array('class' => 'form-control', 'multiple'=>'multiple',
                                                                         'id' => 'A_locali_presenti[]'))}}
                                </div>                                
                                <div class="wrap-input">
                                    {{ Form::label('servizi_inclusi', 'Servizi inclusi')}}
                                    {{ Form::select('servizi_inclusi[]', array('Wi-fi' => 'Wi-fi', 'Parcheggio Riservato' => 'Parcheggio Riservato',
                                                                         'Climatizzatore' => 'Climatizzatore','Ascensore' => 'Ascensore',
                                                                         'Giardino' => 'Giardino' ),
                                                                          $servarray, array('class' => 'form-control', 'multiple'=>'multiple',
                                                                         'id' => 'servizi_inclusi[]'))}}
                                </div>
                            </div>
                            
                            <!--inizio form POSTOO LETTO-->
                            
                            <div class="desc", id='PostoL' hidden="true">
                                <h4><b><ins>Caratteristiche Posto Letto</ins></b></h4>
                                <div class="wrap-input">
                                    {{ Form::label('dimensione', 'Superficie camera in mq') }}
                                    {{ Form::text('dimensione', $ann->dimensione, ['class' => 'input', 'id' => 'C_dimensione', 'placeholder'=>'es: 16']) }}                           
                                </div>
                                <div class="wrap-input">
                                    {{ Form::label('C_numero_posti_letto_in_camera', 'N° Posti letto nella stessa camera' )}}
                                    {{ Form::text('C_numero_posti_letto_in_camera',$ann->C_numero_posti_letto_in_camera, ['placeholder'=>'es: 2']) }}                           
                                </div>
                                <div class="wrap-input">
                                    {{ Form::label('numero_posti_letto_totali', 'N° Posti letto totale nel alloggio')}}
                                    {{ Form::text('numero_posti_letto_totali',$ann->numero_posti_letto_totali, ['placeholder'=>'es: 4']) }}                           
                                </div>                               
                                <div class="wrap-input">
                                    {{ Form::label('servizi_inclusi', 'Servizi inclusi')}}
                                    {{ Form::select("servizi_inclusi[]", array('Angolo Studio' => 'Angolo Studio', 'Bagno in Camera' => 'Bagno in Camera',
                                                                         'minibar' => 'minibar','Wi-fi' => 'Wi-fi','Climatizzatore' => 'Climatizzatore' ),
                                                                         $servarray, array('class' => 'form-control', 'multiple'=>'multiple','id' => 'servizi_inclusi[]' ))}}
                                </div>

                            </div>           
                        </div>    
                    </div>

                    <div class="spacer">



                        <div class="input-group">
                            {{ Form::submit('Crea Nuovo Annuncio', ['class' => 'form-btn1', 'id'=>'pulsante']) }}
                        </div></div>
                    {{ Form::close() }}
     
  </div>
</div> 
@endsection