@extends('layouts.homepageLayout')
@section('title', 'Gestione FAQs')
@section('gestFaq')
<style>.clicca-e-mostra{cursor: pointer;} .clicca-e-nascondi{cursor: pointer; } .mostra-al-click{display: none;} .clicca-e-nascondi{display: none;}</style>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
      <span class="pull-right"></span>
    <h2>Gestione FAQs</h2>
</div>
</div>
<!-- banner -->

    <div class="container">
        <br>
        <div class="col-8 col-sm-8">
   <div id="zona1">
      <h3>AGGIUNGI FAQ</h3>
   </div>
   <div id="zona2"> <button class="w3-button w3-xlarge w3-circle w3-teal clicca-e-mostra"><b>+</b></button> 
      <button class="w3-button w3-xlarge w3-circle w3-teal clicca-e-nascondi">+</button>
   </div>
    <section class="mostra-al-click">
      <div>
         {{ Form::open(array( 'class' => 'contact-form')) }}
         <div class="input-group">
            <div class="input-inline">
               {{ Form::label ('domanda', 'Domanda:  ')  }}
               {{ Form::textarea ('domanda', '',['class'=>'input','id'=>'domanda']) }}
            </div>
         </div>
         <br>
         <div class="input-group">
            <div class="input-inline">
               {{ Form::label ('risposta', 'Risposta:  ')  }}
               {{ Form::textarea ('risposta', '',['class'=>'input','id'=>'risposta']) }}
            </div>
         </div>
         <br>
         {{ Form::reset('Annulla', ['class' => 'button btn-form']) }}
         {{ Form::submit('Aggiungi FAQ', ['class' => 'button btn-form', 'id'=>'sub-btn']) }}
         {{ Form::close() }}
      </div>
    </section>
    </div>
        <br><br><br><br><br>     
                <div class="row">           
                    @if(@isset($faqs))
                    @foreach ($faqs as $faq)
                    <div class="col-6 col-sm-6">
                    <h4 id="faq-domanda[{!!$faq->FaqId!!}]"><a id="faq-a[{!!$faq->FaqId!!}]" onclick="visualizza({!!$faq->FaqId!!})"><b>{!! $faq->domanda !!}</b></a></h4>
                    <div id="faq-risposta[{!!$faq->FaqId!!}]">{!! $faq->risposta !!} </div>  
                    
       
                    
                    </div>

                        <div class="col-6 col-sm-3">
                            <a class="btn btn-primary bottoni_ancore" href=""  >Modifica Faq</a><br><br>
                            <a class="btn btn-primary bottoni_ancore" href="">Elimina Faq</a><br><br>
                            <hr>
                        </div>
                      @endforeach
                      @endif   
                   </div>    
    </div>
@endsection   


<script>
    document.addEventListener('DOMContentLoaded', function() {
        jQuery(function($){
    $('.clicca-e-mostra').each(function(i){
    $(this).click(function(){ $('.showclick').eq(i).show();
    $('.mostra-al-click').eq(i).show();
    $('.clicca-e-mostra').eq(i).hide();
    $('.clicca-e-nascondi').eq(i).show();
    }); });
    });  


    jQuery(function($){
    $('.clicca-e-nascondi').each(function(i){
    $(this).click(function(){ $('.clicca-e-nascond').eq(i).show();
    $('.mostra-al-click').eq(i).hide();
    $('.clicca-e-nascondi').eq(i).hide();
    $('.clicca-e-mostra').eq(i).show();
    }); });
    });  
    
    
    });
</script>



