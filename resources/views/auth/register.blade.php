@extends('layouts.homepageLayout')



@section('Registrazione')
<div class="static">
    <div class="container">
<div class="spacer">
<div class="row" >
        
    <div class="col-lg-7 col-lg-offset-5" >
	<div class="container">
		{{ Form::open(array('route' => 'register', 'class' => 'contact-form')) }}
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Registrazione</p>
            
                        <fieldset>
                        <div id='input-1'>
                            
                            <p>Sei uno studente o un gestore?</p></div>
                            <div id='input-2'>
                                
                                {{ Form::radio('role', 'locatore', ['class' => 'input', 'id' => 'locatore']) }}
                                {{ Form::label('locatore', 'Gestore', ['class' => 'label-input']) }}
                            <!--    <input type="radio" id='locatore' name="ruolo" value="Locatore"> 
                            <label for="locatore">Studente</label> -->
                            </div>
                            <div id='input-3'>
                                {{ Form::radio('role', 'locatario', ['class' => 'input', 'id' => 'locatario']) }}
                                {{ Form::label('locatario', 'Studente', ['class' => 'label-input']) }}
                            <!--<input type="radio" id='locatario' name="ruolo" value="Locatario">
                            <label for="locatario">Gestore</label></div> -->
                            </fieldset>
                            
            
			<div class="wrap-input">
                            {{ Form::text('nome', '', ['class' => 'input', 'id' => 'nome', 'placeholder'=>'Nome']) }}
                            @if ($errors->first('nome'))
                                <ul class="errors">
                                    @foreach ($errors->get('nome') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <!--	<input type="text" placeholder="Nome" name="nome" value="" required> -->
			</div>
			<div class="wrap-input">
                            {{ Form::text('cognome', '', ['class' => 'input', 'id' => 'cognome', 'placeholder'=>'Cognome']) }}
                            @if ($errors->first('cognome'))
                            <ul class="errors">
                                @foreach ($errors->get('cognome') as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                            @endif
				<!--<input type="text" placeholder="Cognome" name="cognome" value="" required> -->
			</div>
            
                        
                                
                        <div id="input-4"><p>Data di nascita</p></div>
                            <div id="input-5">
                                {{ Form::date('datanascita','',['class' => 'input', 'id' => 'datanascita']) }}
                                @if ($errors->first('datanascita'))
                                <ul class="errors">
                                    @foreach ($errors->get('datanascita') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                                <!-- <input type="date" placeholder="Data di nascita" name="datanascita" value="" required>-->
                            </div>
			
            
                        <div class="input-group">
                        <div id="input-4"><p>Genere</p></div>
                        <div id="input-5">
                          {{Form::select('genere',['maschio'=>'Maschio', 'femmina'=>'Femmina'])}}
                         <!-- <select required><option>Maschio</option><option>Femmina</option></select>  -->
                        </div>
                        </div>
                 
            
                        
                        <div class="wrap-input">
                            {{ Form::text('telefono', '', ['class' => 'input', 'id' => 'telefono', 'placeholder'=>'Telefono']) }}
                            @if ($errors->first('telefono'))
                            <ul class="errors">
                                @foreach ($errors->get('telefono') as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                            @endif
			<!--	<input type="text" placeholder="Telefono" name="telefono" value="" required> -->
                        </div>
			
            
                        <div class="input-group">
                            {{ Form::text('email', '', ['class' => 'input','id' => 'email', 'placeholder'=>'E-mail']) }}
                            @if ($errors->first('email'))
                            <ul class="errors">
                                @foreach ($errors->get('email') as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                            @endif
			<!--	<input type="email" placeholder="Email" name="email" value="" required> -->
                        </div>
                        <div class="input-group">
                            {{ Form::text('username', '', ['class' => 'input','id' => 'username','placeholder'=>'Username']) }}
                            @if ($errors->first('username'))
                            <ul class="errors">
                                @foreach ($errors->get('username') as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                            @endif
			<!--	<input type="text" placeholder="Username" name="username" value="" required> -->
			</div>
			
                        <div class="input-group">
                            {{ Form::password('password', ['class' => 'input','id' => 'password','placeholder'=>'Password']) }}
                            @if ($errors->first('password'))
                            <ul class="errors">
                                @foreach ($errors->get('password') as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                            @endif

			</div>
            
                        <div class="input-group">
                            {{ Form::password('password_confirmation',['class' => 'input', 'id' => 'password-confirm', 'placeholder'=>'Conferma Password']) }}
                   
                        </div>
            
			<div class="input-group">
                            {{ Form::submit('Registra', ['class' => 'form-btn1', 'id'=>'pulsante']) }}
                        <!--  <button name="submit" id='pulsante'><a href="">Registrati</a></button> -->
			</div>
			<p class="login-register-text">Possiedi già un'account? <a href="{{route('login')}}">Accedi qui</a>.</p>
		 {{ Form::close() }}
	</div>
    </div>
</div>
    </div>
</div>
</div>

@endsection
