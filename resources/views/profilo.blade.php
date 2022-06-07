@extends('layouts.homepageLayout')
@section('title', 'Profilo utente')
@section('profilo')

<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
      <span class="pull-right"></span>
    <h2>Profilo </h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="row">
        <div id="descrprof">
        <div class="property-info">
            <h3><p class="price"><b> Benvenuto {{ Auth::user()->nome }} {{ Auth::user()->cognome }}</b></p></h3> 
            <h4>In questa sezione puoi visualizzare e modificare tutti i dati inerenti al tuo profilo utente. </h4>
        </div></div>
                <div id="immprof">                
                <img src="{{asset('images/immagineprofilo.jpg')}}" width="width" height="height" alt="alt"/>
               </div>
        
    <div class="row">
        <div class="col-lg-6 col-sm-6">
    <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span><b>Informazioni del profilo utente</b></h4><br>
        
        
        <h5><p><b>Nome:</b> {{ Auth::user()->nome }}</p></h5>
     
        <h5><p><b>Cognome:</b> {{ Auth::user()->cognome }}</p></h5>  
        
        <h5><p><b>Data di nascita:</b>{{ Auth::user()->data_nascita }}</p></h5> 
        
        <h5><p><b>Telefono:</b> {{ Auth::user()->telefono }}</p></h5>
        
        <h5><p><b>Email:</b> {{ Auth::user()->email }}</p></h5>
        
        <h5><p><b>Username:</b> {{ Auth::user()->username }}</p></h5>
        </div>
            </div>
        <div class="col-lg-6 col-sm-6">
            <br> <br> <br> <br>
            @can('isLocatario')
            <h3>Alloggi a te assegnati:</h3>
            @if($assegnato->isempty())
            <p>Ci dispiace, ma al momento nessun alloggio risulta a te assegnato.</p>
            @endif
            
            @isset($assegnato)
            @foreach($assegnato as $ass)
            <p>Congratulazioni l'alloggio {{$ass->tipologia}} in {{$ass->indirizzo}}, {{$ass->citta}} ti è stato assegnato <a style='font-size: 1.5em;  cursor: pointer;' title="Clicca qui per visitare la scheda dell' alloggio" href="{{route('scheda',[$ass->AnnuncioId])}}">&neArr;</a></p>
            
            
            @endforeach
            
            @endisset
            
            
            @endcan
            
        </div>
        </div>
        
                <div class="row">
                    @can('isLoreLario')
        
                       <div class="col-lg-2 col-sm-2 col-lg-offset-0 col-sm-offset-3">
                        <a class='biancati' href="{{ route('viewmodprof') }}">   <button type="submit" class="btn btn-primary" name="Submit">Modifica Profilo</button></a>
                        </div>
                    @endcan
          
                 </div>
        
        <div class="row">
            <br>
                       <div class="col-lg-2 col-sm-2 col-lg-offset-0 col-sm-offset-3">
                           @auth
                                    <button title="Esci dal sito" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</button>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                           @endauth
                           <!-- <button type="submit" class="btn btn-primary" name="Submit">Logout</button>-->
                        </div>
          
                 </div>
        

            
        
</div>

</div>
</div>
</div>

@endsection