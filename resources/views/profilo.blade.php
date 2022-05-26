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
   
        <div class="property-info">
            <h3><p class="price"><b> Benvenuto {{ Auth::user()->nome }} {{ Auth::user()->cognome }}</b></p></h3> 
        </div>

    <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span><b>Informazioni del profilo utente</b></h4> 
        
        <h5><p><ins>Nome:</ins> {{ Auth::user()->nome }}</p></h5>
     
        <h5><p><ins>Cognome:</ins> {{ Auth::user()->cognome }}</p></h5>  
        
        <h5><p><ins>Data di nascita:</ins>{{ Auth::user()->data_nascita }}</p></h5> 
        
        <h5><p><ins>Telefono:</ins> {{ Auth::user()->telefono }}</p></h5>
        
        <h5><p><ins>Email:</ins> {{ Auth::user()->email }}</p></h5>
        
        <h5><p><ins>Username:</ins> {{ Auth::user()->username }}</p></h5>
        
                <div class="row">
        
                       <div class="col-lg-2 col-sm-2 col-lg-offset-0 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary" name="Submit">Modifica Profilo</button>
                        </div>
          
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