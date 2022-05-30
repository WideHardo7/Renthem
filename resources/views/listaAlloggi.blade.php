@extends('layouts.homepageLayout')
@section('title', 'Gestione annunci')
@section('gestAlloggi')

<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
      <span class="pull-right"></span>
    <h2>Gestione annunci</h2>
</div>
</div>
<!-- banner -->

    <div class="container">
        <h4>Gestisci i tuoi annunci, modifica, elimina o visualizza chi è interessato al tuo annuncio e assegna l'offerta al miglior acquirente. </h4>
        <br><br>
        
         
        @isset($ads)
                    @foreach ($ads as $ad)
                    
                    <div class="row">
                        <div class="col-6 col-sm-6">
                            <div class="image-holder"><img src="{{ asset('images/properties/' . $ad->immagine) }}" class="img-responsive" alt="properties">
                            @if($ad->assegnato)
                            <div class="status sold">Alloggio già assegnato</div>
                            @endif
                            </div>                               
                        </div>

                        <div class="col-6 col-sm-3">
                            <h4><a>{{$ad->tipologia}}</a> in {{$ad->indirizzo}}, {{$ad->citta}}</h4>
                            <a class="btn btn-primary bottoni_ancore" href="{{route('scheda',[$ad->AnnuncioId])}}">Info annuncio</a><br><br>
                            <a class="btn btn-primary bottoni_ancore" href="">Modifica Annuncio</a><br><br>
                            <a class="btn btn-primary bottoni_ancore" href="">Elimina annuncio</a><br><br>
                            <a class="btn btn-primary bottoni_ancore" href="">Visualizza interessati</a>
                        </div>
                        
                   </div> 
                   <br><br> 

                    @endforeach
                    
                      @endisset()
                  
    
    
    
    
    
    
 
    
    
          
        <br><br>   
    </div>
@endsection    