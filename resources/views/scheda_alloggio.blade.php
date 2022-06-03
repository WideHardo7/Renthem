@extends('layouts.schedannuncioSingolo_layout')
@section('title', 'Dettaglio Alloggio')
@section('scheda')

<div class="inside-banner">
  <div class="container"> 
      <span class="pull-right"></span>
    <h2>Specifiche Alloggio</h2>
</div>
</div>

<!-- banner -->


<div class="container"><br><br>
    <div class="row"> 
        <div class="col-lg-5 col-sm-5">
        <h3><b>{{$ann->tipologia}} in zona {{$ann->zona_quartiere}}, {{$ann->citta}}</b></h3>
     </div>
       
    </div>
    <div class="row"> 
       
        <div class="col-lg-4 col-sm-4"> <h4><b>Annuncio inserito da:</b> <i>{{$lore->nome}} {{$lore->cognome}}</i></h4> </div>
    </div>
    
    <div class="property-images">
          <img src="{{ asset('images/properties/' . $ann->immagine) }}" alt="Realestate">
        </div>
    
     
</div>
   
<div class="container">
  <div class="spacer">
       @if($ann->assegnato)
          <h3 class="evidenziati">ASSEGNATO in data:{{$ann->data_assegnazione}}</h3>                      
        @endif
      
      <div class="row"><br>
        
      <div class="col-lg-6 col-sm-6">   
           <div class="property-info">
               <h3><p class="price">{{$ann->importo}}€/ <sub>al mese</sub></p></h3>
            <p class="area"><span class="glyphicon glyphicon-map-marker">                    
                </span> {{$ann->indirizzo}}, {{$ann->citta}}</p>
        </div>
          <div class="contorno-box box-3">
          <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span><b>Dettagli alloggio</b></h4> <br>
              
              <h5><p><ins><b>Descrizione</b></ins><br><br>
                      {!!$ann->descrizione!!}</p></h5>
              @if($ann->tipologia =='Appartamento')
              <hr>
              <p><h5><ins><b>Caratteristiche</b></ins><br><br>
                  Superficie Appartamento: {{$ann->dimensione}} m<sup>2</sup><br>
                     Numero di camere nell'appartamento: {{$ann->A_numero_camere}}<br> 
                     Numero posti letto totale nell'abitazione: {{$ann->numero_posti_letto_totali}}<br></p></h5>
              
              <p><h5><ins><b>Locali Presenti</b></ins><br><br>
                  @if(is_null($ann->A_locali_presenti))
                  Non specificati
                  @endif
                  <ul>
                      @foreach($ann->A_locali_presenti as $locali)
                      <li>{{$locali}}</li>
                      @endforeach
                  </ul><br></h5></p>
              
              <p><h5><ins><b>Servizi Inclusi</b></ins><br><br>
                  @if(is_null($ann->servizi_inclusi))
                  Non specificati
                  @endif
                  <ul>
                      @foreach($ann->servizi_inclusi as $service)
                      <li>{{$service}}</li>
                      @endforeach
                  </ul><br></h5></p>
              
                                             
              
              
                     @else
                     
               <p><h5><ins>Caratteristiche</ins><br><br>
                  Superficie Camera: {{$ann->dimensione}} m<sup>2</sup><br>
                  Numero di posti letto complessivi nell'alloggio: {{$ann->numero_posti_letto_totali}}<br> 
                  Numero di posti letto in camera: {{$ann->C_numero_posti_letto_in_camera}}<br></p></h5>
                     
                 
                 <p><h5><ins><b>Servizi Inclusi</b></ins><br><br>
                  @if(is_null($ann->servizi_inclusi))
                  Non specificati
                  @endif
                  <ul>
                      @foreach($ann->servizi_inclusi as $service)
                      <li>{{$service}}</li>
                      @endforeach
                  </ul><br></h5></p>
                  
              @endif
              
               <h5><p><ins><b>Vincoli di Locazione</b></ins><br><br>
                 Periodo disponibilita': da {{$ann->data_inizio_disponibilita}} al {{$ann->data_fine_disponibilita}}<br>
                 Eta' minima: {{$ann->eta_minima?? "Non specificato"}}<br>
                 Alloggio riservato a : {{$ann->genere_richiesto?? "Non specificato"}}<br></p></h5> 
         </div> 
          </div>
      </div>
        
       @can('isLocatario')   
      <div class="col-lg-6 col-sm-6">
          <div class="contatta">
              <h5><span class="glyphicon glyphicon-envelope"></span>Per ulteriori informazioni  contatta il gestore dell'alloggio</h5>
             
       <!--SEZIONE FROM INVIO MESSAGGIO-->       
    {{ Form::open (array('route' => array('mandamessaggio', $ann->AnnuncioId), 'class' => 'contact-form', 'id'=>'invMessaggio')) }}  
        <br><br>
        
           
         <div class="wrap-input">
             
                    {{ Form::textarea('contenuto', '', [ 'rows' =>8, 'class' => "form-control", 'placeholder'=>"Scrivi qui un messaggio al Gestore", 'id' => 'contenuto']) }}     
                    
                     @if ($errors->first('contenuto'))
                    <ul class="errors">
                        @foreach ($errors->get('contenuto') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif 
                
                </div>
         <div class="wrap-input">
               {{ Form::hidden ('idlocatore', $lore->id ,['class'=>'input','id'=>'idlocatore']) }}
               </div>
        
        
            {{ Form::submit('Invia Messaggio', ['class' => 'btn btn-primary', 'id'=>'sub-btn']) }} 
    {{ Form::close() }}
                                
               <!--  <textarea rows="8" class="form-control" placeholder="Messaggio"></textarea>
                 <button type="submit" class="btn btn-primary" name="Submit">Invia Messaggio</button>
              </form>-->
          </div>
          
          <hr><br>
        <!--SEZIONE FORM OPZIONAMENTO-->
          <h4><p>Pensi che sia l'appartamento giusto per te? 
                  Allora opziona subito l'offerta!</p></h4>
         
              
                <div class="row">
                    {{ Form::open (array('route' => array('opzionamento', $ann->AnnuncioId), 'class' => 'contact-form', 'id'=>'setOpzione')) }}
                   
                    <div class="wrap-input">
               {{ Form::hidden ('idlocatore', $lore->id ,['class'=>'input','id'=>'idlocatore']) }}
               </div>
                    <div class="col-lg-6 col-sm-6 col-lg-offset-3 col-sm-offset-3">
                            {{ Form::submit('Opziona Offerta', ['class' => 'btn btn-primary', 'id'=>'sub-btn']) }} 
                            <!--<button type="submit" class="btn btn-primary" name="Submit">Opziona Offerta</button>-->
                        </div>
                  {{ Form::close() }}
                 </div>
          @endcan
           
      </div>
      </div>
     
  </div>
</div> 
@endsection