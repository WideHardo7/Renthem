@extends('layouts.homepageLayout')



@section('Registrazione')
<div class="spacer">
<div class="row" >
        
    <div class="col-lg-5"></div>
    <div class="col-lg-7" >
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Registrazione</p>
            
                        <fieldset>
                        <div id='input-1'>
                            
                            <p>Sei uno studente o un gestore?</p></div>
                            <div id='input-2'><input type="radio" id='locatore' name="ruolo" value="Locatore">
                            <label for="locatore">Studente</label>
                            </div>
                            <div id='input-3'><input type="radio" id='locatario' name="ruolo" value="Locatario">
                            <label for="locatario">Gestore</label></div>
                            </fieldset>
                            
            
			<div class="input-group">
				<input type="text" placeholder="Nome" name="nome" value="" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Cognome" name="cognome" value="" required>
			</div>
            
                        <div class="input-group">
                                
                            <div id="input-4"><p>Data di nascita</p></div>
                            <div id="input-5"><input type="date" placeholder="Data di nascita" name="datanascita" value="" required></div>
			</div>
            
                        <div class="input-group">
                        <div id="input-4"><p>Genere</p></div>
                        <div id="input-5"> <select required><option>Maschio</option><option>Femmina</option></select> </div>
                        </div>
                 
            
                        <div class="input-group">
				<input type="text" placeholder="Telefono" name="telefono" value="" required>
			</div>
            
                        <div class="input-group">
				<input type="email" placeholder="Email" name="email" value="" required>
                        </div>
                        <div class="input-group">
				<input type="text" placeholder="Username" name="username" value="" required>
			</div>
			
                        <div class="input-group">
				<input type="password" placeholder="Password" name="password" value="" required>
			</div>
            
                        <div class="input-group">
				<input type="password" placeholder="Conferma Password" name="cpassword" value="" required>
			</div>
            
			<div class="input-group">
                            <button name="submit" id='pulsante'><a href="">Registrati</a></button>
			</div>
			<p class="login-register-text">Possiedi già un'account? <a href="{{route('login')}}">Accedi qui</a>.</p>
		</form>
	</div>
    </div>
</div>
    </div>

@endsection
