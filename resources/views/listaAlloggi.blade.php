@extends('layouts.homepageLayout')
@section('title', 'Gestione annunci')

@section('scriptGestann')
@parent
<script src="{{ asset('assets/js/GestAnnjs.js') }}"></script>
@endsection



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
                            <a class="btn btn-primary bottoni_ancore" href="{{route('modann',[$ad->AnnuncioId])}}">Modifica Annuncio</a><br><br>
                            <meta name='csrf-token' content='{{csrf_token()}}'>
                            <a class="btn btn-primary bottoni_ancore" onclick='elimina({!!$ad->AnnuncioId!!})'>Elimina annuncio</a><br><br>
                            <a class="btn btn-primary bottoni_ancore" onclick='visint({!!$ad->AnnuncioId!!})'>Visualizza interessati</a>
                        </div>
                        
                   </div> 
                   <br><br> 
 @endforeach                    
@endisset()
                   
    <div class='modal' id='myModal' role='dialog' tabindex='-1' aria-hidden='true'>
      <div class='modal-dialog'>
          <div class='modal-content' id='appeF'>
            <div class='modal-header'>       
              <button type='button' class='close' onclick='closemodal("myModal")' aria-label='close' >&times;</button>
              <h4 class='modal-title'>LISTA INTERESSATI</h4>
            </div>
            <div class='modal-body' id='appD'>
                <div class="row">
                    <table id="appendme">
                        <tr>
                            <th>Nome &nbsp;&nbsp;</th> 
                            <th>Cognome &nbsp;&nbsp;</th> 
                            <th>Età &nbsp;&nbsp;</th> 
                            <th>Genere &nbsp;&nbsp;</th> 
                        </tr>
                        
                   
                    
                    
                                         
                                         
                         
                        <tr>
                            <td>Joe &nbsp;&nbsp;</td>
                            <td>Mama &nbsp;&nbsp;</td>
                            <td>18 &nbsp;&nbsp;</td>
                            <td>Ghey &nbsp;&nbsp;</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class='modal-footer'>              
                <button class='form-btn1 btn btn-default' id="chidi" onclick='closemodal("myModal")'>Chiudi</button>
            </div>
          </div>
       </div>
  </div>

    
    
    
    
    
    
 
    
    
          
        <br><br>   
    </div>
@endsection    