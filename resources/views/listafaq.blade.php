@extends('layouts.homepageLayout')
@section('title', 'Gestione FAQs')


@section('scriptAFaqs')
@parent

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="{{ asset('assets/js/GestFaqjs.js') }}" ></script>
<script>   
    function showmodalForm(id){
    $potato= $("#faq-domanda\\["+id+"\\]").text();
    $mylifeis= $("#faq-risposta\\["+id+"\\]").text();
    $("#domandamaybe").val($potato);
    $("#rispostamaybe").val($mylifeis);
    $("#myModal").show();  
    };
   
    function closemodal(){   
    $("#myModal").hide;
    };
      

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

    

@endsection

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

<div class="container" id="appendmodal">
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
                            <h4 id="faq-domanda[{!!$faq->FaqId!!}]"><a id="faq-a[{!!$faq->FaqId!!}]"><b id="faqb[{!!$faq->FaqId!!}]">{{$faq->domanda}}</b></a></h4>
                    <div id="faq-risposta[{!!$faq->FaqId!!}]">{!! $faq->risposta !!} </div>                   
                    </div> 
                        <div class="col-6 col-sm-3">
                            <a class="btn btn-primary bottoni_ancore" onclick='showmodalForm({!!$faq->FaqId!!})' id="faqEdit[{!!$faq->FaqId!!}]" >Modifica Faq</a><br><br>
                            <a class="btn btn-primary bottoni_ancore" onclick='' id="faqCanc[{!!$faq->FaqId!!}]" >Elimina Faq</a><br><br>
                            <hr>
                        </div>
                      @endforeach
                      @endif   
                   </div>
    <div class='modal' id='myModal' role='dialog' tabindex='-1' aria-hidden='true'>
      <div class='modal-dialog'>
          <div class='modal-content' id='appeF'>
        {{Form::open(array("route"=>"EditFaq","id"=>"formMFaq"))}}
            <div class='modal-header'>       
              <button type='button' class='close' onclick='closemodal()' id='chiuditi' aria-label='close' >&times;</button>
              <h4 class='modal-title'>MODIFICA FAQ</h4>
            </div>
            <div class='modal-body' id='appD'>
                <div class="row">
                    {{Form::label("sugma","Domanda:")}}
              {{Form::text("domanda","",['id'=>'domandamaybe','class'=>'form-control'])}}
                </div>
                <div class="row">
                    {{Form::label("sugondese","Risposta:")}}
              {{Form::text("risposta"," ",['id'=>'rispostamaybe','class'=>'form-control'])}}
                </div>
            </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-default' data-bs-dismiss='modal'>Close</button>
            </div>
        {{Form::close()}}
          </div>
       </div>
  </div>
    </div>
@endsection   



