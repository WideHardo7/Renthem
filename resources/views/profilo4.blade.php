@extends('layouts.homepageLayout4')
@section('title', 'Profilo utente')
@section('profilo4')

<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
      <span class="pull-right"></span>
    <h2>Profilo utente</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="row">
   
        <div class="property-info">
            <h3><p class="price"><b>Username dell'utente loggato</b></p></h3> 
        </div>

    <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span><b>Informazioni del profilo utente</b></h4> 
        
        <h5><p><ins>Nome:</ins> Nome dell'utente</p></h5>
     
        <h5><p><ins>Cognome:</ins> Cognome dell'utente</p></h5>  
        
        <h5><p><ins>Data di nascita:</ins> Cognome dell'utente</p></h5> 
        
        <h5><p><ins>Telefono:</ins> Cognome dell'utente</p></h5>
        
        <h5><p><ins>Email:</ins> Cognome dell'utente</p></h5>
        
        <h5><p><ins>Username:</ins> Cognome dell'utente</p></h5>
        
                <div class="row">
        
                       <div class="col-lg-2 col-sm-2 col-lg-offset-0 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary" name="Submit">Modifica Profilo</button>
                        </div>
          
                 </div>
        <br>
                        <div class="row">
        
                       <div class="col-lg-2 col-sm-2 col-lg-offset-0 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary" name="Submit">Logout</button>
                        </div>
          
                 </div>
        
</div>
</div>
</div>
</div>


@endsection