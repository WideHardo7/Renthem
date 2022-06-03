@extends('layouts.homepageLayout')
@section('title', 'HomePage')

@section('homeScripts')
@parent
<script src="{{ asset('js/functions.js') }}" ></script>

<script>
    function visualizza(id){
    var faqrispid= "faq-risposta["+id+"]";
    var hfaq= document.getElementById(faqrispid);
    hfaq.hidden= (hfaq.hidden)? false:true;
    }
/*    $(document).ready(function () {
    $(".prova").on("click", function(e){
    $(this).find($(".nascosto")).toggle();
    });
});*/
</script>
<style>
    .prova{
        cursor: pointer;
    }
</style>
@endsection


@section('homepage')
<div class="homepage">
    
            <div id="slider" class="sl-slider-wrapper">

        <div class="sl-slider">
        
          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-9"></div>                                   
              <h2>Crea il tuo annuncio per posto letto o appartamento</h2>
            </div>
          </div>
          
          <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-10"></div>
              <h2>Decine di annunci disponibili</h2>            
            </div>
          </div>
          
          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-8"></div>
              <h2>Tante offerte per appartamenti interi o stanze singole</h2>
             
            </div>
          </div>
          
          <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-7"></div>
              <h2>Scegli la zona più confortevole per te</h2>
              
            </div>
          </div>                
        </div><!-- /sl-slider -->

        <nav id="nav-dots" class="nav-dots">
          <span class="nav-dot-current"></span>
          <span></span>
          <span></span>
          <span></span>         
        </nav>
      </div><!-- /slider-wrapper -->
</div>

   
<div class="container">
  <div class="spacer">
    <div class="row">
      <div class="col-lg-6 col-sm-9", id="aboutContatti">
        <h3><b>About Us</b></h3>
        <p><big>Renthem è il miglior portale immobiliare per gli studenti. È stato lanciato nel 2022, 
            con l’obiettivo di offrire la migliore piattaforma 
            per la pubblicazione e la ricerca di annunci immobiliari designati per studenti universitari.<br> 
            La documentazione del progetto è disponibile <a href="{{ route('doc') }}"><b>qui</b></a>.</big><br></p>
        <h3><b>Note d'uso</b></h3>
        <p><big>In questo sito è possibile visualizzare annunci per l'affitto di appartamenti o posti letto per studenti,
        ed effettuando il log-in è possibile mettere in affitto tali alloggi, oppure opzionarli mettendosi successivamente 
        in contatto con i rispettivi proprietari. La ricerca dell'alloggio ideale è facilitata, grazie anche ad un filtraggio
        che i vari utenti loggati come studenti possono usufruire.</big><br></p>
        
            <h3><b>Contatti</b></h3>
      <p><big>Per informazioni sul sito, sulla pubblicazione degli annunci e altre info:<br><br> 
            Elisa Pace: <b>elisa.pace@affitti.it</b> <br> 
        Leonardo Pescetti: <b>leonardo.pescetti@affitti.it</b> </big><br></p>
      </div>
      <div class="col-lg-6 col-sm-9", id="faq">                
        <h3><b>FAQ</b></h3>
               @if(@isset($faqs))
            <div id="faq-singola">
                @foreach ($faqs as $faq)
                <div class="prova">        
                    <h4 id="faq-domanda[{!!$faq->FaqId!!}]"><a id="faq-a[{!!$faq->FaqId!!}]" onclick="visualizza({!!$faq->FaqId!!})"><b>{!! $faq->domanda !!}</b></a></h4>
                    <div id="faq-risposta[{!!$faq->FaqId!!}]" class="nascosto" hidden>{!! $faq->risposta !!} </div>                       
                </div>
                @endforeach
            </div>
                @endif
      </div>
        
    </div>
  </div>
</div>

@endsection
