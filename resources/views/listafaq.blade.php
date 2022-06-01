@extends('layouts.homepageLayout')
@section('title', 'Gestione FAQs')


@section('scriptAFaqs')
@parent

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="{{ asset('assets/js/GestFaqjs.js') }}" ></script>
<script src="{{ asset('assets/js/functions.js') }}" ></script>
<script>
  $(function () {
    var actionUrl = "{{ route('EditFaq') }}";
    var formId = 'formMFaq';
    $(":input").on('blur', function (event) {
        var formElementId = $(this).attr('id');
        doElemValidation(formElementId, actionUrl, formId);
    });
    $("#formMFaq").on('submit', function (event) {
        event.preventDefault();
        doFormValidation(actionUrl, formId);
    });
});
</script>
<script>
 $(function () {
    var actionUrl = "{{ route('Faqadd') }}";
    var formId = 'formadd';
    $(":input").on('blur', function (event) {
        var formElementId = $(this).attr('id');
        doElemValidation(formElementId, actionUrl, formId);
    });
    $("#formadd").on('submit', function (event) {
        event.preventDefault();
        doFormValidation(actionUrl, formId);
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
   <div id="zona2"> <button onclick="openmodal()" class="w3-button w3-xlarge w3-circle w3-teal clicca-e-mostra" ><b>+</b></button> 
      <button class="w3-button w3-xlarge w3-circle w3-teal clicca-e-nascondi">+</button>
   </div>

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
                            <meta name='csrf-token' content='{{csrf_token()}}'>
                            <a class="btn btn-primary bottoni_ancore" onclick='elimina({!!$faq->FaqId!!})' id="faqCanc[{!!$faq->FaqId!!}]" >Elimina Faq</a><br><br>
                            
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
              <button type='button' class='close' onclick='closemodal("myModal")' aria-label='close' >&times;</button>
              <h4 class='modal-title'>MODIFICA FAQ</h4>
            </div>
            {{Form::hidden('FaqId','',['id'=>'faqid'])}}
            <div class='modal-body' id='appD'>
                <div class="row">
                    {{Form::label("sugma","Domanda:")}}
              {{Form::text("domandamaybe","",['id'=>'domandamaybe','class'=>'form-control'])}}
                </div>
                <div class="row">
                    {{Form::label("sugondese","Risposta:")}}
              {{Form::text("rispostamaybe"," ",['id'=>'rispostamaybe','class'=>'form-control'])}}
                </div>
            </div>
            <div class='modal-footer'>              
              {{ Form::submit('Salva', ['class' => 'form-btn1 btn btn-default', 'id'=>'salva']) }}
            </div>
        {{Form::close()}}
          </div>
       </div>
  </div>
        <div class='modal' id='myModalAdd' role='dialog' tabindex='-1' aria-hidden='true'>
      <div class='modal-dialog'>
          <div class='modal-content' id='appeF'>
        {{Form::open(array("route"=>"Faqadd","id"=>"formadd"))}}
            <div class='modal-header'>       
              <button type='button' class='close' onclick='closemodal("myModalAdd")' aria-label='close' >&times;</button>
              <h4 class='modal-title'>MODIFICA FAQ</h4>
            </div>
            {{Form::hidden('FaqId','',['id'=>'faqid'])}}
            <div class='modal-body' id='appD'>
                <div class="row">
                    {{ Form::label ('domanda', 'Domanda:  ')  }}
               {{ Form::textarea ('domanda', '',['class'=>'form-control','id'=>'domanda']) }}
                </div>
                <div class="row">
                    {{ Form::label ('risposta', 'Risposta:  ')  }}
               {{ Form::textarea ('risposta', '',['class'=>'form-control','id'=>'risposta']) }}
                </div>
            </div>
            <div class='modal-footer'>              
              {{ Form::submit('Salva', ['class' => 'form-btn1 btn btn-default', 'id'=>'salvaadd']) }}
            </div>
        {{Form::close()}}
          </div>
       </div>
  </div>
    </div>
@endsection   



