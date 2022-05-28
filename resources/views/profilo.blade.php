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
        
    
    <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span><b>Informazioni del profilo utente</b></h4> 
        
        <h5><p><b>Nome:</b> {{ Auth::user()->nome }}</p></h5>
     
        <h5><p><b>Cognome:</b> {{ Auth::user()->cognome }}</p></h5>  
        
        <h5><p><b>Data di nascita:</b>{{ Auth::user()->data_nascita }}</p></h5> 
        
        <h5><p><b>Telefono:</b> {{ Auth::user()->telefono }}</p></h5>
        
        <h5><p><b>Email:</b> {{ Auth::user()->email }}</p></h5>
        
        <h5><p><b>Username:</b> {{ Auth::user()->username }}</p></h5>
        
                <div class="row">
                    @can('isLoreLario')
        
                       <div class="col-lg-2 col-sm-2 col-lg-offset-0 col-sm-offset-3">
                           <button type="submit" class="btn btn-primary" name="Submit"><a class='biancati' href="{{ route('viewmodprof') }}">Modifica Profilo</a></button>
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