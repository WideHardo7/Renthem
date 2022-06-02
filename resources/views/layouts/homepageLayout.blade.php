
<!DOCTYPE html>
<html lang="en">
    <head>        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Gruppo 16">
        <meta name="description" content="Sito della Renthem">
        <meta name="keywords" content="case, appartamenti, affitto, camere, studenti">      
        <title>Renthem | @yield('title','HomePage')</title>
        @include('layouts.stylelayout') 
        @show
        @section('scripts')
        @show
        @section('MProfiloscripts')
        @show     
        @section('homeScripts')
        @show
        @section('scriptAFaqs')
        @show
        @section('scriptsModann')
        @show
        @section('scriptGestann')
        @show
    </head>    
    <body>
        <div id="wrapper">
            
            <div id="navbar">
                @include('layouts/navbar_public')
            </div>
            <!-- end navbar -->
            
            <div id="menu">
                @include('layouts/menu_public')
            </div>
            <!-- end menu -->
            
            <div id="page">                
                    <div id="home">
                        @yield('homepage') 
                        @yield('chat')
                        @yield('profilo')
                         @yield('Registrazione')
                         @yield('login')
                         @yield('CreaAnnuncio') 
                         @yield('gestAlloggi') 
                          @yield('gestFaq') 
                          @yield('schedaMod')
                          @yield('stats') 
            
           
                    </div>                
            </div>
            <!-- end content -->
                     
            
            <div id="footer">
                @include('layouts/footer')
            </div> 
            <!-- end footer -->
        </div>
    </body>
</html>
