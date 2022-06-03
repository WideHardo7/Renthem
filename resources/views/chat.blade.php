@extends('layouts.homepageLayout')
@section('title', 'Gestione annunci')
@section('gestAlloggi')

<style> @import "compass/css3";
   @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro);
   body{
   font-family: 'Source Sans Pro', sans-serif;  
   }
   .finestra-intera{
   position:relative;
   margin:50px auto;
   width:840px;
   height:640px;
   border-radius:4px;
   border:1px solid #C1C1BF;
   box-shadow: 0 0 100px hsla(0,0%,0%, .3);
   background:white;
   overflow:hidden;  
   }
   .chat-parte-sinistra{  
   position:absolute;
   width:270px;
   height:100%;
   box-shadow:0 0 4px hsla(0, 0%, 50%, .7);
   background:white;
   z-index:1;
   }
   .chat-parte-sinistra-header{
   height:50px;
   border-bottom:1px solid #F0F0F0;
   }
   .chat-disponibili{
   position:absolute;
   left:0;right:0;
   margin:0;padding:0;}
   .chat-parte-destra{
   position:absolute;
   left:270px;
   right:0;
   bottom:0;
   top:0;
   padding:.625em 1.25em 1.25em 1.25em;
   background:#F2F1EC;  
   z-index:0;
   }
   .chat-parte-destra-header{
   position:relative;
   border-bottom:1px solid hsla(0, 0%, 50%, .1);  
   height:40px; 
   }
   .mess-inviato{
   background-color:#E9F2DC;
   border:1px solid #B7C8A1; 
   float:right;
   margin:.5em .75em;
   padding:.1em .5em;
   display:inline-block;
   text-shadow:0 1px 1px white;
   border:1px solid #CDCDCA;
   box-shadow: 0   1px   1px 0  #CDCDCA;  
   margin-bottom:1px;
   position:relative;
   }
   .mess-ricevuto{
   float:left;
   margin-bottom:1px;
   position:relative;
   display:inline-block;
   margin:.5em .75em;
   padding:.1em .5em;
   border-radius:0;
   text-shadow:0 1px 1px white;
   background-color:#F5F4F1;
   border:1px solid #CDCDCA;
   box-shadow: 0   1px   1px 0  #CDCDCA;  
   overflow:hidden;
   &:after{
   top:0;bottom:0;
   left:0;right:0;
   border-radius:inherit;
   }
   }
   .zona-scrittura-messaggio{
   position:absolute;
   bottom:0;
   left:0;
   width:100%;
   margin-left:20px; 
   }
   .separatore:before,
   .separatore:after {
   content: " "; /* 1 */
   display: table; /* 2 */
   }
   .separatore:after {
   clear: both;
   }
   #scritta{padding:5px;}
   #testomessaggio{width:474px; height:40px;margin-bottom:1px;}
   #contenitore-messaggi{ height: 520px; width: 560px; overflow-y: scroll; padding-right:15px; padding-left:15px;}
   #testomessaggioInChat{margin-bottom:1px; overflow: auto}
   #timeMessagge{font-size:11px; position:relative; }
   #chat-disp-cliccabile{padding-top:5px; padding-left:10px; border: 3px solid rgba(130,197,141,0.5); padding-bottom:2px; margin-bottom:4px; background-color: #ECF6ED;}
   #chat-disp-cliccabile-scritta{ font-weight:bold; }
   #chat-disp-cliccabile-scritta:hover{font-size:14px;} 
   #chat-parte-destra-header-nome{font-weight:bold; font-size:14px;}
   #chat-parte-destra-header-ruolo{font-size:12px;}
</style>

<!-- banner -->
<div class="inside-banner">
   <div class="container">
      <span class="pull-right"></span>
      <h2>Chat</h2>
   </div>
</div>
<!-- banner -->

<div class="container">
    
<br>
<h4> In questa pagina puoi chattare con gli altri utenti. </h4>

<div class="finestra-intera">
<!-- PARTE SINISTRA DELLA FINESTRA DELLA CHAT --> 
<aside class="chat-parte-sinistra">
   <header class="chat-parte-sinistra-header">
      <h3 id="scritta"><b>Chat attive</b></h3>
   </header>
   <div class="chat-disponibili">
      <div id="chat-disp-cliccabile">
         <a id="chat-disp-cliccabile-scritta" href="">UTENTE NUMERO 1</a>
      </div>
      <div id="chat-disp-cliccabile">
         <a id="chat-disp-cliccabile-scritta" href="">UTENTE NUMERO 2</a>
      </div>
      <div id="chat-disp-cliccabile">
         <a id="chat-disp-cliccabile-scritta" href="">UTENTE NUMERO 3</a>
      </div>
   </div>
</aside>
    
   <!-- PARTE DESTRA DELLA FINESTRA DELLA CHAT -->     
<div class="chat-parte-destra">
   <header class="chat-parte-destra-header">
      <div id="chat-parte-destra-header-nome">Lore Lore</div>
      <div id="chat-parte-destra-header-ruolo">Locatore</div>
   </header>
   <div id="contenitore-messaggi">
    @for('blahblah')
      <!-- PRIMO MESSAGGIO (RICEVUTO) -->
      <div class="row">
         <div class="mess-ricevuto">
            <p id="testomessaggioInChat">MESSAGGIO RICEVUTO prova prova prova prova prova prova prova prova prova prova prova prova prova prova </p>
            <div id="timeMessagge">13:55 15/05/2022</div>
         </div>
         <div class="separatore"></div>
      </div>
      @if(inviato)
      <!-- SECONDO MESSAGGIO (INVIATO) -->
      <div class="row">
         <div class="mess-inviato">
            <p id="testomessaggioInChat">MESSAGGIO INVIATO  prova prova prova </p>
            <div id="timeMessagge">13:55 15/05/2022</div>
         </div>
         <div class="separatore"></div>
      </div>
   </div>
    @endif
    @endfor
   <footer class="zona-scrittura-messaggio">
      <input type="text" id="testomessaggio">
      <input type="button" value="INVIA">
   </footer>
</div>
   
</div>

</div>
@endsection    
