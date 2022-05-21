@extends('layouts.homepageLayout')

@section('login')
 
<div class="container">
<div class="spacer">
<div class="row" >
        
    <div class="col-lg-5"></div>
    <div class="col-lg-7" >
       
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Username" name="username" value="" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="" required>
			</div>
			<div class="input-group">
                            <button name="submit" id="pulsante"><a href="">Login</a></button>
			</div>
			<p class="login-register-text">Non hai un account? <a href="register">Registrati qua</a>.</p>
		</form>
	</div>
</div>

</div>
</div>
@endsection
