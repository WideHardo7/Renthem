
@extends('layouts.homepageLayout')
@section('title', 'Alloggi')

@section('scriptsCat')
@parent
<script src="{{ asset('assets/js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>

$(document).ready(function () {
    $("input[name=tipologia]").on("click", function () {
        var test = $(this).val();
        if (test === "Posto letto") {
            test = "PostoL";
            $(".desc").hide();
            $("#" + test).show();
            $("#" + test).children().find($(":input")).prop("disabled", false);
            $("#Appartament").children().find($(":input")).prop("disabled", true);
        } else if (test === "Appartamento") {
            test = "Appartament";
            $(".desc").hide();
            $("#" + test).show();
            $("#" + test).children().find($(":input")).prop("disabled", false);
            $("#PostoL").children().find($(":input")).prop("disabled", true);
        }
    });
});

$(document).ready(function () {
$valore=$("input[name=tipologia]").val();
 if ($valore === "Posto letto") {
    test = "PostoL";
    $(".desc").hide();
    $("#" + test).show();
    $("#" + test).children().find($(":input")).prop("disabled", false);
    $("#Appartament").children().find($(":input")).prop("disabled", true);}
 else if($valore==="Appartamento"){
    test = "Appartament";
    $(".desc").hide();
    $("#" + test).show();
    $("#" + test).children().find($(":input")).prop("disabled", false);
    $("#PostoL").children().find($(":input")).prop("disabled", true);
}
}
);

$(document).ready(function () {
    $('option').mousedown(function (e) {
        if (!($(this).parent().attr("disabled"))) {
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
        }
        ;
    });
}
);
</script>

<style type="text/css">
    .desc {
        display: none;
    }
</style>
@endsection

@section('catalogo')
<!-- banner -->
<div class="inside-banner">
    <div class="container"> 
        <span class="pull-right"></span>
        <h2>Trova l'alloggio che fa per te!</h2>
    </div>
</div>
<!-- banner -->


<div class="container">
    <div class="properties-listing spacer">
        <div class="row">


            @can('isLocatario')  
            <div class="col-lg-3 col-sm-4" id="filtroDati">                
                <div class="search-form"><h4><span class="glyphicon glyphicon-search"></span> Cerca per</h4>
                    {{ Form::open(array('route' => 'filtro', 'id'=>'formFiltro', 'method' => 'get')) }}   
                    
                    {{Form::hidden('tipologia',null)}}

                    {{ Form::radio('tipologia', 'Appartamento', false, ['class' => 'label-input', 'id' => 'Appartamento']) }}
                    {{ Form::label('tipologia', 'Appartamento', ['class' => 'label-input']) }}

                    {{ Form::radio('tipologia', 'Posto letto', false, ['class' => 'label-input', 'id' => 'Posto letto']) }}
                    {{ Form::label('tipologia', 'Posto letto', ['class' => 'label-input']) }}<br><br>

                    {{ Form::label('min_price', 'Prezzo min', ['class' => 'label-input']) }}
                    {{ Form::text('min_price', '', ['class' => 'input', 'id' => 'min_price', 'placeholder'=>'es: 0']) }}
                    @if ($errors->first('min_price'))
                    <ul class="errors">
                        @foreach ($errors->get('min_price') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif 
                    {{ Form::label('max_price', 'Prezzo max', ['class' => 'label-input']) }}
                    {{ Form::text('max_price', '', ['class' => 'input', 'id' => 'max_price', 'placeholder'=>'es: 2000']) }}<br>
                    @if ($errors->first('max_price'))
                    <ul class="errors">
                        @foreach ($errors->get('max_price') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif 


                    {{ Form::label('citta', 'Cittá', ['class' => 'label-input']) }}
                    {{ Form::text('citta', '', ['class' => 'input', 'id' => 'citta', 'placeholder'=>'es: Ancona']) }}<br>
                    @if ($errors->first('citta'))
                    <ul class="errors">
                        @foreach ($errors->get('citta') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif 

                    {{ Form::label('data_inizio_permanenza', 'Data inizio permaneza')}}
                    {{ Form::date('data_inizio_permanenza', \Carbon\Carbon::now()), ['class' => 'input', 'id' => 'data_inizio_permanenza',] }}





                    <!--inizio form APPARTAMENTO-->                        
                    <div class='desc', id='Appartament' hidden="true">                 
                        <div class="wrap-input">
                            {{ Form::label('dimensione', 'Superficie appartamento in mq:') }}
                            {{ Form::text('dimensione', '', ['class' => 'input', 'id' => 'dimensione', 'placeholder'=>'es: 78']) }}<br>
                            @if ($errors->first('dimensione'))
                            <ul class="errors">
                                @foreach ($errors->get('dimensione') as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                            @endif 
                        </div>
                        <div class="wrap-input">
                            {{ Form::label('A_numero_camere', 'Numero camere:' )}}
                            {{ Form::text('A_numero_camere', '', ['placeholder'=>'es: 3', 'id' => 'A_numero_camere']) }}<br>
                            @if ($errors->first('A_numero_camere'))
                            <ul class="errors">
                                @foreach ($errors->get('A_numero_camere') as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                            @endif 
                        </div>
                        <div class="wrap-input">
                            {{ Form::label('numero_posti_letto_totali', "N° Posti letto totale nell'appartamento")}}
                            {{ Form::text('numero_posti_letto_totali', '', ['placeholder'=>'es: 4']) }}<br>
                            @if ($errors->first('numero_posti_letto_totali'))
                            <ul class="errors">
                                @foreach ($errors->get('numero_posti_letto_totali') as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                        <div class="wrap-input">
                            {{ Form::label('A_locali_presenti', 'Locali presenti')}}
                            {{ Form::select('A_locali_presenti[]', array('Studio' => 'Studio', 'Bagno Singolo' => 'Bagno Singolo',
                                                                         'Cucina' => 'Cucina','Sala multiuso' => 'Sala multiuso',
                                                                         'Bagno doppio' => 'Bagno doppio', 'Garage' => 'Garage'),
                                                                          null, array('class' => 'form-control', 'multiple'=>'multiple',
                                                                         'id' => 'A_locali_presenti[]'))}}
                        </div>                               
                        <div class="wrap-input">
                            {{ Form::label('servizi_inclusi', 'Servizi inclusi')}}
                            {{ Form::select('servizi_inclusi[]', array('Wi-fi' => 'Wi-fi', 'Parcheggio Riservato' => 'Parcheggio Riservato',
                                                                         'Climatizzatore' => 'Climatizzatore','Ascensore' => 'Ascensore',
                                                                         'Giardino' => 'Giardino' ),
                                                                          null, array('class' => 'form-control', 'multiple'=>'multiple',
                                                                         'id' => 'servizi_inclusi[]'))}}                                
                        </div></div>

                    <!--inizio form posto letto-->

                    <div class="desc", id='PostoL' hidden="true">                        
                        <div class="wrap-input">
                            {{ Form::label('dimensione', 'Superficie camera in mq') }}
                            {{ Form::text('dimensione', '', ['class' => 'input', 'id' => 'dimensione', 'placeholder'=>'es: 16']) }}
                            @if ($errors->first('dimensione'))
                            <ul class="errors">
                                @foreach ($errors->get('dimensione') as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                        <div class="wrap-input">
                            {{ Form::label('C_numero_posti_letto_in_camera', 'N° Posti letto nella stessa camera' )}}
                            {{ Form::text('C_numero_posti_letto_in_camera', '', ['placeholder'=>'es: 2']) }}
                            @if ($errors->first('C_numero_posti_letto_in_camera'))
                            <ul class="errors">
                                @foreach ($errors->get('C_numero_posti_letto_in_camera') as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                        <div class="wrap-input">
                            {{ Form::label('numero_posti_letto_totali', 'N° Posti letto totale nel alloggio')}}
                            {{ Form::text('numero_posti_letto_totali', '', ['placeholder'=>'es: 4']) }}<br>
                            @if ($errors->first('numero_posti_letto_totali'))
                            <ul class="errors">
                                @foreach ($errors->get('numero_posti_letto_totali') as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>                            
                        <div class="wrap-input">
                            {{ Form::label('servizi_inclusi', 'Servizi inclusi')}}
                            {{ Form::select("servizi_inclusi[]", array('Angolo Studio' => 'Angolo Studio', 'Bagno in Camera' => 'Bagno in Camera',
                                                                         'minibar' => 'minibar','Wi-fi' => 'Wi-fi','Climatizzatore' => 'Climatizzatore' ),
                                                                         null, array('class' => 'form-control', 'multiple'=>'multiple'
                                                                         ,'id' => 'servizi_inclusi[]'  ))}}  
                        </div></div>




                    <div class="input-group">
                        {{ Form::submit('Cerca', ['class' => 'form-btn1', 'id'=>'pulsante']) }}
                    </div> 

                    {{ Form::close() }}

                </div>
            </div>           


            <div class="col-lg-9 col-sm-8">
                @endcan
                @can('isAnybutlario') 
                <div class="col-lg-9 col-sm-8 col-lg-offset-2">
                    @endcan 

                    @guest 
                    <div class="col-lg-9 col-sm-8 col-lg-offset-2">
                        @endguest

                        <div class="row">
                            
                            @if($ads->isempty())
                            <h3>"Nessun risultato trovato in base ai filtri inseriti."</h3>
                            @endif

                            @isset($ads)
                            @foreach ($ads as $ad)
                            <!-- properties -->
                            <div class="col-lg-4 col-sm-6">
                                <div class="properties">
                                    <div class="image-holder"><img src="{{ asset('images/properties/' . $ad->immagine) }}" class="img-responsive" alt="properties">
                                        @if($ad->assegnato)
                                        <div class="status sold">Non Disponibile</div>
                                        @endif

                                    </div>
                                    <h4 class="vert">{{$ad->tipologia}}</h4>
                                    <h5 >{{$ad->citta}}</h5>
                                    <p class="price">{{$ad->importo}}€</p>
                                    <a class="btn btn-primary bottoni_ancore" href="{{route('scheda',[$ad->AnnuncioId])}}">DETTAGLIO</a>

                                </div>
                            </div>
                            @endforeach

                            @endisset()

                        </div>
                        <div class="row">
                            <div class="center">
                                <div class="pagination">
                                    @include('pagination.paginator', ['paginator' => ($ads->appends($_GET))])
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div> 


        </div><!-- row -->            
    </div><!-- spacer -->        
</div><!-- container -->
@endsection
