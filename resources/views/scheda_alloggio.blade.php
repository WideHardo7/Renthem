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
    <div class="Tipo appartamento opostoletto"> 
        <h3><b>{{$ann->tipologia}} in Zona: {{$ann->zona_quartiere}}</b></h3>
    </div>
    
    <div class="property-images">
          <img src="{{ asset('images/properties/' . $ann->immagine) }}" alt="Realestate">
        </div>
     
</div>
   
<div class="container">
  <div class="spacer">
      <div class="row"><br>
        
      <div class="col-lg-6 col-sm-6">   
           <div class="property-info">
               <h3><p class="price">{{$ann->importo}}€/ <sub>al mese</sub></p></h3>
            <p class="area"><span class="glyphicon glyphicon-map-marker">                    
                </span> {{$ann->indirizzo}}, {{$ann->citta}}</p>
        </div>
          <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span><b>Dettagli alloggio</b></h4> 
              
              <h5><p><ins>Descrizione</ins><br><br>
                      {{$ann->descrizione}}</p></h5>
              @if($ann->tipologia =='Appartamento')
              <hr>
              <p><h5><ins>Caratteristiche</ins><br><br>
                  Superficie Appartamento: {{$ann->dimensione}} m<sup>2</sup><br>
                     Numero di camere nell'appartamento: {{$ann->A_numero_camere}}<br> 
                     Numero posti letto totale nell'abitazione: {{$ann->A_numero_posti_letto}}<br></p></h5>
              
              <p><h5><ins>Servizi</ins><br><br>
                  Superficie Camaera: {{$ann->dimensione}} m<sup>2</sup><br>
                     Numero di posti letto nell'appartamento: {{$ann->C_numero_posti_letto}}<br> 
                     Numero posti letto in camera: {{$ann->A_numero_posti_letto}}<br></p></h5>
              
              <h5><p><ins>Vincoli di Locazione</ins><br><br>
                 Periodo disponibilita': da {{$ann->data_inizio_disponibilità}} al {{$ann->data_fine_disponibilità}}<br>
                 Eta' minima: {{$ann->eta_minima}}<br>
                 Alloggio riservato a : {{$ann->genere_richiesto?? "Non specificato"}}<br></p></h5>                                 
              
              
                     @else
                     
                     <p><h5><ins>Caratteristiche</ins><br><br>
                  Superficie Camaera: {{$ann->dimensione}} m<sup>2</sup><br>
                     Numero di posti letto nell'appartamento: {{$ann->C_numero_posti_letto}}<br> 
                     Numero posti letto in camera: {{$ann->A_numero_posti_letto}}<br></p></h5>
                     
                 
                 Servizi: angolo studio, minibar, bagno in camera<br>               
                                
              <h5><p>Vincoli di Locazione<br>
                 Periodo disponibilita': da 15/09/2022 al 15/12/2020<br>
                 Eta' minima: 18<br>
                 Genere: solo donne<br></h5>                                 
              </p>
              @endif
         </div>          
      </div>
        
       @can('isLocatario')   
      <div class="col-lg-6 col-sm-6">
          <div class="contatta">
              <h5><span class="glyphicon glyphicon-envelope"></span>Per ulteriori informazioni  contatta il gestore dell'alloggio</h5>
              <form role="form">
                 <input type="text" class="form-control" placeholder="Username Locatore"/>
                 <input type="text" class="form-control" placeholder="Oggetto"/>               
                 <textarea rows="8" class="form-control" placeholder="Messaggio"></textarea>
                 <button type="submit" class="btn btn-primary" name="Submit">Invia Messaggio</button>
              </form>
          </div>
          
          <hr><br>
          <h4><p>Pensi che sia l'appartamento giusto per te? 
                  Allora opziona subito l'offerta!</p></h4>
          
              
                <div class="row">
        
                       <div class="col-lg-6 col-sm-6 col-lg-offset-3 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary" name="Submit">Opziona Offerta</button>
                        </div>
          
                 </div>
          @endcan
           
      </div>
      </div>
     
  </div>
</div> 
@endsection