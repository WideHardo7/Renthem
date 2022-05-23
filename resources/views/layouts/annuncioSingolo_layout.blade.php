<!DOCTYPE html>
<html lang="en">
    <head>        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Gruppo 16">
        <meta name="description" content="Sito della Renthem">
        <meta name="keywords" content="case, appartamenti, affitto, camere, studenti">
        <title>Annuncio</title>
        @extends('layouts.stylelayout')       
    </head>
    <body>
        <div id="navbar">
                @include('layouts/navbar_public')
            </div>
            <!-- end #header -->
            
            <div id="menu">
                @include('layouts/menu_public')
            </div>
<div class="inside-banner">
  
</div>
</div>
<!-- banner -->


<div class="container"><br><br>
    <div class="Tipo appartamento opostoletto"> 
        <h3>Posto letto</h3>
    </div>
    <div class="property-images">
          <a href="index.php"><img src="images/slider/9.png" alt="Realestate"></a>
        </div> 
</div>
   
<div class="container">
  <div class="spacer">
      <div class="row"><br>
        
      <div class="col-lg-6 col-sm-6">   
           <div class="property-info">
            <p class="price">200€</p>
            <p class="area"><span class="glyphicon glyphicon-map-marker">                    
                </span> via Marco Polonara 12, Ancona</p>
        </div>
          <div class="spacer"><h3><span class="glyphicon glyphicon-th-list"></span>Dettagli alloggio</h3> 
              
              <h5><p>Descrizione<br>
                      Posto letto in camera singola molto spaziosa e moderna.</p></h5>
                 <p><h5>Numero posti letto totale nell'abitazione: 3<br>
                 Numero posti letto in camera: 2<br>
                 Servizi: angolo studio, minibar, bagno in camera<br>               
                  </p></h5>              
              <h5><p>Vincoli di Locazione<br>
                 Periodo disponibilita': da 15/09/2022 al 15/12/2020<br>
                 Eta' minima: 18<br>
                 Genere: solo donne<br></h5>                                 
              </p>
         </div>          
      </div>
        
          
      <div class="col-lg-6 col-sm-6">
          <div class="contatta">
              <h6><span class="glyphicon glyphicon-envelope"></span>Contatta</h6>
              <form role="form">
                 <input type="text" class="form-control" placeholder="Nome Completo"/>
                 <input type="text" class="form-control" placeholder="username"/>               
                 <textarea rows="8" class="form-control" placeholder="testo"></textarea>
                 <button type="submit" class="btn btn-primary" name="Submit">Send Message</button>
              </form>
          </div>
      </div>
      </div>        
  </div>
</div>  
 </body>
</html>