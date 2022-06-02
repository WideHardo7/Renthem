@extends('layouts.homepageLayout')
@section('title', 'Visualizzazione Statistiche')
@section('stats')

<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
      <span class="pull-right"></span>
    <h2>Visualizzazione Statistiche</h2>
</div>
</div>
<!-- banner -->

<div class="container">
        <br>
        <h4>Seleziona l'intervallo temporale e la tipologia di annuncio desiderati per visualizzare delle statistiche.</h4>
        <br>
        {{ Form::open (array(/*'route' => 'editutente',*/ 'class' => 'contact-form', 'id'=>'viewStats' , 'method'=> 'GET')) }}
        
                <div class="input-group">
            <div class="input-inline">
                {{ Form::label ('data-inizio', 'Inizio periodo di riferimento: ')  }}
                {{ Form::date('data-inizio','',['class' => 'input', 'id' => 'data-inizio']) }}
                @if ($errors->first('data-inizio'))
                    <ul class="errors">
                        @foreach ($errors->get('data-inizio') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        
                <div class="input-group">
            <div class="input-inline">
                {{ Form::label ('data-fine', 'Fine periodo di riferimento: ')  }}
                {{ Form::date('data-fine','',['class' => 'input', 'id' => 'data-fine']) }}
                @if ($errors->first('data-fine'))
                    <ul class="errors">
                        @foreach ($errors->get('data-fine') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        
                <fieldset>
                    <div id='input-1'>
                        <div class="spacer">
                            <p>Tipologia degli annunci:</p></div></div>

                                                  
                        {{ Form::radio('tipologia', 'Appartamento', ['class' => 'label-input', 'id' => 'Appartamento']) }}
                        {{ Form::label('tipologia', 'Appartamento', ['class' => 'label-input']) }}
                    
                        {{ Form::radio('tipologia', 'Posto letto', ['class' => 'label-input', 'id' => 'Posto letto']) }}
                        {{ Form::label('tipologia', 'Posto letto', ['class' => 'label-input']) }}   
 
                        {{ Form::radio('tipologia', 'Tutti', ['class' => 'label-input', 'id' => 'tutti']) }}
                        {{ Form::label('tipologia', 'Tutti', ['class' => 'label-input']) }}  
                </fieldset> 
        
        {{ Form::reset('Annulla filtraggio', ['class' => 'button btn-form']) }}
        {{ Form::submit('Visualizza statistiche', ['class' => 'form-btn1', 'id'=>'sub-btn']) }} 
        {{ Form::close() }}
        
        <ul id="risultati-stats">
            <li>Numero offerte totali: </li>
            <li>Numero di offerte opzionate: </li>
            <li>Numero di offerte assegnate: </li>
        </ul>
        
    </div>

@endsection