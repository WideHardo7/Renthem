@extends('layouts.homepageLayout')
@section('title', 'Gestione annunci')
@section('Chatscript')
@parent
<link rel="stylesheet" href="{{asset('assets/css/chatcss.css')}}">

<script src="{{ asset('assets/js/Chatjs.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

@endsection
@section('gestAlloggi')


    


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
       <meta name='csrf-token' content='{{csrf_token()}}'>
   </header>
   <div class="chat-disponibili">
       @isset($list)
       @foreach($list as $l)
       
       <a id="chat-disp-cliccabile-scritta" onclick="visualizzamessaggi({!!$l->id!!})">
      <div id="chat-disp-cliccabile">
         {{$l->nome}} {{$l->cognome}}
      </div>
    </a>
       @endforeach
       @endisset
   </div>
</aside>
    
   <!-- PARTE DESTRA DELLA FINESTRA DELLA CHAT -->     
<div class="chat-parte-destra">
   <header class="chat-parte-destra-header">
      <div id="chat-parte-destra-header-nome">Lore Lore</div>
      <div id="chat-parte-destra-header-ruolo">Locatore</div>
   </header>
   <div id="contenitore-messaggi">

      <!-- PRIMO MESSAGGIO (RICEVUTO) -->
      <div class="row rimuovi">
         <div class="mess-ricevuto">
            <p>MESSAGGIO RICEVUTO prova prova prova prova prova prova prova prova prova prova prova prova prova prova </p>
            <div>13:55 15/05/2022</div>
         </div>        
      </div>

      <!-- SECONDO MESSAGGIO (INVIATO) -->
      <div class="row rimuovi">
         <div class="mess-inviato">
            <p>MESSAGGIO INVIATO  prova prova prova </p>
            <div>13:55 15/05/2022</div>
         </div>         
      </div>
      
      
   </div>
    
    

   <footer class="zona-scrittura-messaggio" id="textbox">
      <input type="text" id="testomessaggio">
      <input type="button" value="INVIA" onclick="mandamess(2)">
   </footer>
</div>
   
</div>

</div>
@endsection    
