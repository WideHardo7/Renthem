@extends('layouts.homepageLayout')
@section('title', 'Modifica profilo utente')
@section('profilo')

<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
      <span class="pull-right"></span>
    <h2>Modifica profilo </h2>
</div>
</div>
<!-- banner -->

<div class="container">
    
    {{ Form::open (array('route' => 'editutente', 'class' => 'contact-form', 'id'=>'modProfilo')) }}  
        <br><br>
        
            <div class="wrap-input">
                {{ Form::label ('nome', 'Nome:  ')  }}
                {{ Form::text ('nome',' ',['class'=>'input','id'=>'nome']) }}
                @if ($errors->first('nome'))
                    <ul class="errors">
                        @foreach ($errors->get('nome') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif 
        
            </div>
        
        
        <div class="input-group">
            <div class="input-inline">
                {{ Form::label ('cognome', 'Cognome:  ')  }}
                {{ Form::text ('cognome','',['class'=>'input' , 'id'=>'cognome']) }}
                @if ($errors->first('cognome'))
                    <ul class="errors">
                        @foreach ($errors->get('cognome') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        
        <div class="input-group">
            <div class="input-inline">
                {{ Form::label ('data', 'Data di nascita:  ')  }}
                {{ Form::date('data_nascita','',['class' => 'input', 'id' => 'data_nascita']) }}
                @if ($errors->first('data_nascita'))
                    <ul class="errors">
                        @foreach ($errors->get('data_nascita') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        
        <div class="wrap-inputgroup">
            
                {{ Form::label ('telefono', 'Telefono:  ')  }}
                {{ Form::text ('telefono','',[ 'class'=>'input','id'=>'telefono']) }}
                @if ($errors->first('telefono'))
                    <ul class="errors">
                        @foreach ($errors->get('telefono') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif    
            
        </div> 
        
        <div class="input-group">
            <div class="input-inline">
                {{ Form::label ('email', 'E-Mail:  ')  }}
                {{ Form::text ('email', '',['class'=>'input','id'=>'email']) }}
               @if ($errors->first('email'))
                    <ul class="errors">
                        @foreach ($errors->get('email') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif 
            </div>
        </div> 
        
            <div class="input-group">
                {{ Form::label ('password', 'Password:  ')  }}
                {{ Form::password('password',['class' => 'input','id' => 'password','placeholder'=>'Password']) }}
                   @if ($errors->first('password'))
                        <ul class="errors">
                            @foreach ($errors->get('password') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif 
            <div class="input-group">
                {{ Form::label ('password_confirmation', 'Conferma password:  ')  }}
                {{ Form::password('password_confirmation',['class' => 'input', 'id' => 'password-confirm', 'placeholder'=>'Conferma Password']) }}
                   
            </div>
            </div>
        
        
        {{ Form::reset('Annulla modifiche', ['class' => 'button btn-form']) }}
          {{ Form::submit('Aggiorna profilo utente', ['class' => 'form-btn1', 'id'=>'sub-btn']) }} 
    {{ Form::close() }}
    

    <br><br>   
</div>
@endsection
          
