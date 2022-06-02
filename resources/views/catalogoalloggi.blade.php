
@extends('layouts.catalogoLayout')
@section('title', 'Alloggi')
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
                    
                        
                     
                     
                        {{ Form::label('tipologia', 'Tipo Alloggio')}}
                        {{ Form::select('tipologia', array('Appartamento' => 'Appartamento', 'Posto Letto' => 'Posto Letto'), array('id' => 'tipologia'))}}<br>
                                              
                    
                        {{ Form::label('citta', 'Cittá', ['class' => 'label-input']) }}
                        {{ Form::text('citta', '', ['class' => 'input', 'id' => 'citta', 'placeholder'=>'es: Ancona']) }}<br> 
                                                
                        {{ Form::label('data_inizio_permanenza', 'Data inizio permaneza')}}
                        {{ Form::date('data_inizio_permanenza', \Carbon\Carbon::now()) }}
                            
                           
                            
                        
                        
                        <!--inizio form APPARTAMENTO-->                        
                                                 
                                
                                   {{ Form::label('dimensione', 'Superficie appartamento in mq:') }}
                                   {{ Form::text('dimensione', '', ['class' => 'input', 'id' => 'dimensione', 'placeholder'=>'es: 78']) }}<br>                           
                                
                                
                                    {{ Form::label('A_numero_camere', 'Numero camere:' )}}
                                    {{ Form::text('A_numero_camere', '', ['placeholder'=>'es: 3', 'id' => 'A_numero_camere']) }}<br>                           
                                
                                
                                    {{ Form::label('A_locali_presenti', 'Locali presenti')}}
                                    {{ Form::select('A_locali_presenti[]', array('Studio' => 'Studio', 'Bagno Singolo' => 'Bagno Singolo',
                                                                         'Cucina' => 'Cucina','Sala multiuso' => 'Sala multiuso',
                                                                         'Bagno doppio' => 'Bagno doppio', 'Garage' => 'Garage'),
                                                                          null, array('class' => 'form-control', 'multiple'=>'multiple',
                                                                         'disabled'=>true,'id' => 'A_locali_presenti[]'))}}
                                                               
                                
                                    {{ Form::label('servizi_inclusi', 'Servizi inclusi')}}
                                    {{ Form::select('servizi_inclusi[]', array('Wi-fi' => 'Wi-fi', 'Parcheggio Riservato' => 'Parcheggio Riservato',
                                                                         'Climatizzatore' => 'Climatizzatore','Ascensore' => 'Ascensore',
                                                                         'Giardino' => 'Giardino' ),
                                                                          null, array('class' => 'form-control', 'multiple'=>'multiple',
                                                                         'disabled'=>true,'id' => 'servizi_inclusi[]'))}}                                
                            
                            
                            <!--inizio form POSTOO LETTO-->
                            
                                                            
                                
                                    {{ Form::label('dimensione', 'Superficie camera in mq') }}
                                    {{ Form::text('dimensione', '', ['class' => 'input', 'id' => 'dimensione', 'placeholder'=>'es: 16']) }}                           
                                
                                
                                    {{ Form::label('C_numero_posti_letto_in_camera', 'N° Posti letto nella stessa camera' )}}
                                    {{ Form::text('C_numero_posti_letto_in_camera', '', ['placeholder'=>'es: 2']) }}                           
                                
                                
                                    {{ Form::label('numero_posti_letto_totali', 'N° Posti letto totale nel alloggio')}}
                                    {{ Form::text('numero_posti_letto_totali', '', ['placeholder'=>'es: 4']) }}<br>                           
                                                               
                                
                                    {{ Form::label('servizi_inclusi', 'Servizi inclusi')}}
                                    {{ Form::select("servizi_inclusi[]", array('Angolo Studio' => 'Angolo Studio', 'Bagno in Camera' => 'Bagno in Camera',
                                                                         'minibar' => 'minibar','Wi-fi' => 'Wi-fi','Climatizzatore' => 'Climatizzatore' ),
                                                                         null, array('class' => 'form-control', 'multiple'=>'multiple'
                                                                         ,'id' => 'servizi_inclusi[]','disabled'=>true  ))}}                                
                            
                       
                            
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
                    <!--Paginazione-->
                    <div class="center">
                        <div class="pagination">
                            @include('pagination.paginator', ['paginator' => $ads])
                        </div>
                    </div>
                    @endisset()
                    
                  




           
                        </div>
                    </div>
                </div>
            </div> 


        </div><!-- row -->            
    </div><!-- spacer -->        
</div><!-- container -->
@endsection
