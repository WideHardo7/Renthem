
@extends('layouts.homepageLayout')
@section('title', 'Inserimento Nuovo Annuncio')


@section('scripts')
@parent
<script src="{{ asset('assets/js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>

$(document).ready(function () {
    $("input[name=tipologia]").on("click", function () {
        var test = $(this).val();
        
        if (test === "Posto letto") {
            test = "PostoL";
         //   $(".desc").hide();
            $("#" + test).show();
            $("#" + test).children().find($(":input")).prop("disabled", false);
            $("#Appartament").children().find($(":input")).prop("disabled", true);

        } else if (test === "Appartamento") {
            test = "Appartament";
        //    $(".desc").hide();
            $("#" + test).show();
            $("#" + test).children().find($(":input")).prop("disabled", false);
            $("#PostoL").children().find($(":input")).prop("disabled", true);
        }
    });
});


$(document).ready(function () {
    $('option').mousedown(function (e) {
        if(!($(this).parent().attr("disabled"))){
        e.preventDefault();
        var originalScrollTop = $(this).parent().scrollTop();
        console.log(originalScrollTop);
        $(this).prop('selected', $(this).prop('selected') ? false : true);
        var self = this;
        $(this).parent().focus();
        setTimeout(function () {
            $(self).parent().scrollTop(originalScrollTop);
        }, 0);
        return false;};
    });
}
); 

</script>

<script>
$(function () {
    var actionUrl = "{{ route('insertAnnuncio') }}";
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

<style type="text/css">
    .desc {
        display: none;
    }
</style>
@endsection

@section('CreaAnnuncio')
<div class="static">


    <div class="static">
        <div class="container">
            <div class="spacer">

                <h3><b>Dati Generali</b></h3>   

                {{ Form::open(array('route' => 'insertAnnuncio', 'id'=>'formAnnuncio', 'files'=>true)) }}     

                <fieldset>
                    <div id='input-1'>
                        <div class="spacer">
                            <p>Tipologia dell'alloggio</p></div></div>

                    <div id='input-2'>                               
                        {{ Form::radio('tipologia', 'Appartamento', false, ['class' => 'label-input', 'id' => 'Appartamento']) }}
                        {{ Form::label('tipologia', 'Appartamento', ['class' => 'label-input']) }}

                    </div>
                    <div id='input-3'>
                        {{ Form::radio('tipologia', 'Posto letto', false, ['class' => 'label-input', 'id' => 'Posto letto']) }}
                        {{ Form::label('tipologia', 'Posto letto', ['class' => 'label-input']) }}                           
                </fieldset>                
                <div class="wrap-input">
                    {{ Form::textarea('descrizione', '', ['cols'=>135, 'rows' =>5, 'placeholder'=>"Descrizione generale dell'alloggio.", 'id' => 'descrizione']) }}                   
                </div>
                
                
                <div class="spacer">
                    <div class='row', id='caratteristiche_generale'>
                        <div class='col-lg-6'>

                            <div  class="wrap-input  rs1-wrap-input">
                                {{ Form::label('immagine', 'Immagine', ['class' => 'label-input']) }}
                                {{ Form::file('immagine', ['class' => 'input', 'id' => 'immagine']) }}                               
                            </div>

                            <div class="wrap-input">
                                {{ Form::label('citta', 'Cittá', ['class' => 'label-input']) }}
                                {{ Form::text('citta', '', ['class' => 'input', 'id' => 'citta', 'placeholder'=>'es: Ancona']) }}                           

                            </div>
                            <div class="wrap-input">
                                {{ Form::label('zona_quartiere', 'Zona e/o quartiere', ['class' => 'label-input']) }}
                                {{ Form::text('zona_quartiere', '', ['class' => 'input', 'id' => 'zona_quartiere', 'placeholder'=>'es: Q1']) }}                           

                            </div>
                            <div class="wrap-input">
                                {{ Form::label('indirizzo', 'Indirizzo', ['class' => 'label-input']) }}
                                {{ Form::text('indirizzo', '', ['class' => 'input', 'id' => 'indirizzo', 'placeholder'=>'es: via Marco Polo 45']) }}                           

                            </div>
                            <div class="wrap-input">
                                {{ Form::label('importo', 'Canone affitto €/mese ', ['class' => 'label-input']) }}
                                {{ Form::text('importo', '', ['class' => 'input', 'id' => 'importo', 'placeholder'=>'es: 400']) }}                           
                            </div>                           
                            <div class="wrap-input">
                                {{ Form::label('eta_minima', 'Etá minima neccessaria', ['class' => 'label-input']) }}
                                {{ Form::text('eta_minima', '', ['class' => 'input', 'id' => 'eta_minima', 'placeholder'=>'es: 18']) }}                           
                            </div>
                            
                            <div class="wrap-input">
                                {{ Form::label('genere_richiesto', 'Vincolo genere del locatario')}}
                                {{ Form::select('genere_richiesto', array('uomini' => 'uomini', 'donne' => 'donne', 'non specificato' => 'non specificato'),
                                                                          null, array('id' => 'genere_richiesto'))}}
                            </div>
                            <div class="wrap-input">
                                {{ Form::label('data_inizio_disponibilita', 'Data inizio disponibilita')}}
                                {{ Form::date('data_inizio_disponibilita', \Carbon\Carbon::now()) }}
                            </div>
                            <div class="wrap-input">
                                {{ Form::label('data_fine_disponibilita', 'Data fine disponibilita')}}
                                {{ Form::date('data_fine_disponibilita', \Carbon\Carbon::now()) }}
                            </div>
                            
                        </div>
                        
                        <!--inizio form APPARTAMENTO-->

                        <div class='col-lg-6'>
                            <div class='desc', id='Appartament'>
                                <h4><b><ins>Caratteristiche Appartamento</ins></b></h4>

                                <div class="wrap-input">
                                    {{ Form::label('dimensione', 'Superficie appartamento in mq') }}
                                    {{ Form::text('dimensione', '', ['class' => 'input', 'id' => 'A_dimensione', 'placeholder'=>'es: 78']) }}                           
                                </div>
                                <div class="wrap-input">
                                    {{ Form::label('A_numero_camere', 'N° camere' )}}
                                    {{ Form::text('A_numero_camere', '', ['placeholder'=>'es: 3', 'id' => 'A_numero_camere']) }}                           
                                </div>
                                <div class="wrap-input">
                                    {{ Form::label('A_locali_presenti', 'Locali presenti')}}
                                    {{ Form::select('A_locali_presenti[]', array('Studio' => 'Studio', 'Bagno Singolo' => 'Bagno Singolo',
                                                                         'Cucina' => 'Cucina','Sala multiuso' => 'Sala multiuso',
                                                                         'Bagno doppio' => 'Bagno doppio', 'Garage' => 'Garage'),
                                                                          null, array('class' => 'form-control', 'multiple'=>'multiple',
                                                                         'disabled'=>true,'id' => 'A_locali_presenti[]'))}}
                                </div>                                
                                <div class="wrap-input">
                                    {{ Form::label('servizi_inclusi', 'Servizi inclusi')}}
                                    {{ Form::select('servizi_inclusi[]', array('Wi-fi' => 'Wi-fi', 'Parcheggio Riservato' => 'Parcheggio Riservato',
                                                                         'Climatizzatore' => 'Climatizzatore','Ascensore' => 'Ascensore',
                                                                         'Giardino' => 'Giardino' ),
                                                                          null, array('class' => 'form-control', 'multiple'=>'multiple',
                                                                         'disabled'=>true,'id' => 'servizi_inclusi[]'))}}
                                </div>
                            </div>
                            
                            <!--inizio form POSTOO LETTO-->
                            
                            <div class="desc", id='PostoL'>
                                <h4><b><ins>Caratteristiche Posto Letto</ins></b></h4>
                                <div class="wrap-input">
                                    {{ Form::label('dimensione', 'Superficie camera in mq') }}
                                    {{ Form::text('dimensione', '', ['class' => 'input', 'id' => 'C_dimensione', 'placeholder'=>'es: 16']) }}                           
                                </div>
                                <div class="wrap-input">
                                    {{ Form::label('C_numero_posti_letto_in_camera', 'N° Posti letto nella stessa camera' )}}
                                    {{ Form::text('C_numero_posti_letto_in_camera', '', ['placeholder'=>'es: 2']) }}                           
                                </div>
                                <div class="wrap-input">
                                    {{ Form::label('numero_posti_letto_totali', 'N° Posti letto totale nel alloggio')}}
                                    {{ Form::text('numero_posti_letto_totali', '', ['placeholder'=>'es: 4']) }}                           
                                </div>                               
                                <div class="wrap-input">
                                    {{ Form::label('servizi_inclusi', 'Servizi inclusi')}}
                                    {{ Form::select("servizi_inclusi[]", array('Angolo Studio' => 'Angolo Studio', 'Bagno in Camera' => 'Bagno in Camera',
                                                                         'minibar' => 'minibar','Wi-fi' => 'Wi-fi','Climatizzatore' => 'Climatizzatore' ),
                                                                         null, array('class' => 'form-control', 'multiple'=>'multiple','id' => 'servizi_inclusi[]' ))}}
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
        </div>    


        @endsection
