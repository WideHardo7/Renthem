
@extends('layouts.homepageLayout')
@section('title', 'Inserimento Nuovo Annuncio')


@section('scripts')

@parent


<script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>

$(document).ready(function () {
    $("input[name=tipo]").on("click", function () {


        var test = $(this).val();
        if (test === "Posto letto") {
            test = "Postoletto";
            $(".desc").hide();
            $("#" + test).show();

        } else if (test === "Appartamento") {
            test = "Appartamento";
            $(".desc").hide();
            $("#" + test).show();
        }
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

                {{ Form::open(array('route' => 'insertAnnuncio', 'class' => 'contact-form', 'id'=>'form Annuncio')) }}     

                <fieldset>
                    <div id='input-1'>
                        <div class="spacer">
                            <p>Tipologia dell'alloggio</p></div></div>

                    <div id='input-2'>                               
                        {{ Form::radio('tipo', 'Appartamento',false, ['class' => 'input', 'id' => 'Appartamento1']) }}
                        {{ Form::label('tipo', 'Appartamento', ['class' => 'label-input']) }}

                    </div>
                    <div id='input-3'>
                        {{ Form::radio('tipo', 'Posto letto', false, ['class' => 'input', 'id' => 'Posto_letto']) }}
                        {{ Form::label('tipo', 'Posto letto', ['class' => 'label-input']) }}                           
                </fieldset>

                <div class="wrap-input">

                    {{ Form::textarea('bio', null, ['cols'=>135, 'rows' =>5, 'placeholder'=>"Descrizione generale dell'alloggio."]) }}                   
                </div>

                <div class="spacer">

                    <div class='row'>
                        <div class='col-lg-6'>

                            <div  class="wrap-input  rs1-wrap-input">
                                {{ Form::label('image', 'Immagine', ['class' => 'label-input']) }}
                                {{ Form::file('image', ['class' => 'input', 'id' => 'immagine']) }}
                                @if ($errors->first('immagine'))
                                <ul class="errors">
                                    @foreach ($errors->get('immagine') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>

                            <div class="wrap-input">
                                {{ Form::label('citta', 'Cittá', ['class' => 'label-input']) }}
                                {{ Form::text('citta', '', ['class' => 'input', 'id' => 'citta', 'placeholder'=>'es: Ancona']) }}                           

                            </div>
                            <div class="wrap-input">
                                {{ Form::label('zona', 'Zona e/o quartiere', ['class' => 'label-input']) }}
                                {{ Form::text('zona', '', ['class' => 'input', 'id' => 'zona', 'placeholder'=>'es: Q1']) }}                           

                            </div>
                            <div class="wrap-input">
                                {{ Form::label('indirizzo', 'Indirizzo', ['class' => 'label-input']) }}
                                {{ Form::text('indirizzo', '', ['class' => 'input', 'id' => 'indirizzo', 'placeholder'=>'es: via Marco Polo 45']) }}                           

                            </div>
                            <div class="wrap-input">
                                {{ Form::label('canone_affitto', 'Canone affitto €/mese ', ['class' => 'label-input']) }}
                                {{ Form::text('canone_affitto', '', ['class' => 'input', 'id' => 'cannone_affitto', 'placeholder'=>'es: 400']) }}                           
                            </div>
                            
                            <div class="wrap-input">
                                {{ Form::label('periodo', 'Periodi di affitto proposto')}}
                                 
                                {{ Form::select('periodo', array('i1' => '3 mesi', 'i2' => '6 mesi',
                                                                         'i3' => '1 anno','i4' => '2 anni'), ['class' => 'form-control', 'multiple'])}}
                                
                            </div>
                            
                        </div>

                        
                        <div class='col-lg-6'>
                            <div class='desc', id='Appartamento'>
                                <h4><b><ins>Caratteristiche Appartamento</ins></b></h4>
                                
                                <div class="wrap-input">
                                {{ Form::label('Sup', 'Superficie appartamento in mq') }}
                                {{ Form::text('Sup', '', ['class' => 'input', 'id' => 'Sup', 'placeholder'=>'es: 78']) }}                           

                            </div>
                                
                                <div class="wrap-input">
                                {{ Form::label('ncamere', 'N° camere' )}}
                                {{ Form::text('ncamere', '', ['placeholder'=>'es: 3']) }}                           

                            </div>
                                
                                <div class="wrap-input">
                                {{ Form::label('npostolettoTot', 'N° Posti letto totali')}}
                                {{ Form::text('npostolettoTot', '', ['placeholder'=>'es: 4']) }}                           

                            </div>
                                
                                <div class="wrap-input">
                                {{ Form::label('servizi_inclusi', 'Servizi Inclusi')}}
                                 
                                {{ Form::select('servizi_inclusi', array('i1' => 'Wi-fi', 'i2' => 'Parcheggio',
                                                                         'i3' => 'Climatizzatore','i4' => 'Ascensore',
                                                                         'i5' => 'Giardino' ), ['class' => 'form-control', 'multiple'])}}
                                
                            </div>
                                
                                <div class="wrap-input">
                                {{ Form::label('locali_presenti', 'Locali Presenti')}}
                                 
                                {{ Form::select('locali_presenti', array('i1' => 'Cucina', 'i2' => 'Studio',
                                                                         'i3' => 'Bagno doppio','i4' => 'bagno singolo','i5' => 'Sala multiuso',
                                                                         'i6' => 'Mansarda','i7' => 'Garage',
                                                                         'i8' => 'Lavanderia'), ['class' => 'form-control', 'multiple'])}}
                                
                            </div>
                                

                                
                                
                                
                            </div>


                            <div class="desc", id='Postoletto'>
                                <h4><b><ins>Caratteristiche Posto Letto</ins></b></h4>

                                  <div class="wrap-input">
                                {{ Form::label('Sup', 'Superficie camera in mq') }}
                                {{ Form::text('Sup', '', ['class' => 'input', 'id' => 'Sup', 'placeholder'=>'es: 16']) }}                           

                            </div>
                                
                                <div class="wrap-input">
                                {{ Form::label('ncamere', 'N° Posti letto nella stessa camera' )}}
                                {{ Form::text('ncamere', '', ['placeholder'=>'es: 2']) }}                           

                            </div>
                                
                                <div class="wrap-input">
                                {{ Form::label('npostolettoTot', 'N° Posti letto totale nel alloggio')}}
                                {{ Form::text('npostolettoTot', '', ['placeholder'=>'es: 4']) }}                           

                            </div>
                                
                                <div class="wrap-input">
                                {{ Form::label('servizi_inclusi', 'Servizi Inclusi')}}
                                 
                                {{ Form::select('servizi_inclusi', array('i1' => 'Wi-fi', 'i2' => 'Bagno in camera',
                                                                         'i3' => 'Climatizzatore','i4' => 'Minibar',
                                                                         'i5' => 'Angolo studio' ), ['class' => 'form-control', 'multiple'])}}
                                
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
