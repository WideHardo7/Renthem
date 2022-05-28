@extends('layouts.homepageLayout')

@section('login')
 
<div class="container">
<div class="spacer">
<div class="row" >
        
    <div class="col-lg-5"></div>
    <div class="col-lg-7" > 
       {{ Form::open(array('route' => 'login', 'class' => 'contact-form')) }}
       
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
                            
			<!--	<input type="text" placeholder="Username" name="username" value="" required> --> 
                            
                        {{ Form::text('username', '', ['class' => 'input','id' => 'username', 'placeholder' => 'Username']) }}
                            @if ($errors->first('username'))
                                 <ul class="errors">
                                    @foreach ($errors->get('username') as $message)
                                        <li>{{ $message }}</li>
                                    @endforeach
                                 </ul>
                            @endif
			</div>
			<div class="input-group">
                            
			<!--	<input type="password" placeholder="Password" name="password" value="" required> -->
                            
                        {{ Form::password('password', ['class' => 'input', 'id' => 'password','placeholder' => 'Password']) }}
                            @if ($errors->first('password'))
                                <ul class="errors">
                                    @foreach ($errors->get('password') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            @endif
			</div>
			<div class="input-group">
                            
                            <!--<button name="submit" id="pulsante"><a href="">Login</a></button>-->
                            
                            {{ Form::submit('Login', ['class' => 'form-btn1', 'id'=>"pulsante"]) }}
			</div>
                
                    <p class="login-register-text">Non hai un account? <a href="{{route('register')}}">Registrati qua</a>.</p>
		
                {{ Form::close() }}
       </div>
	</div>

</div>
</div>
@endsection
