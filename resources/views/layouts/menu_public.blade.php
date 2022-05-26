<div class="container">

<!-- home Starts -->
<div class="header">
<a href="{{route('homelvl1')}}"><img src="{{asset('images/logo_1.png')}}" alt="Realestate"></a>

              <ul class="pull-right">
                  <!--ancora alloggi usata da tutti gli utenti-->
                  <li><a href="{{route('alloggipub')}}"><b>Alloggi</b></a></li>
                  
                   <!--ancora crea annuncio usata da utenti non loggati(guest)-->
                  @guest
                <li><a href="{{route('login')}}"><b>Crea Annuncio</b></a></li> 
                @endguest
                
                 <!--ancore per locatore -->
                 @can('isLocatore') 
                <li><a href=""><b>Crea Annuncio</b></a></li> 
                 <li><a href=""><b>Gestione Annunci</b></a></li> 
                @endcan
                
                 <!--ancora chat per locatari e locatori-->
                @can('isLoreLario')
                <li><a href=""><b>Chat</b></a></li> 
                @endcan
                 
                  <!--ancore per admin-->
                 @can('isAdmin')
                <li><a href=""><b>Gestione Faq</b></a></li> 
                <li><a href=""><b>Statistiche</b></a></li> 
                @endcan
              </ul>

</div>
<!-- #Header Starts -->
</div>