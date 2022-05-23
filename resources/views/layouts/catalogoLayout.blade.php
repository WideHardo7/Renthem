<!DOCTYPE html>
<html lang="en">
    <head>        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Gruppo 16">
        <meta name="description" content="Sito della Renthem">
        <meta name="keywords" content="case, appartamenti, affitto, camere, studenti">
        
        @extends('layouts.stylelayout')
        
        
<!--        
   <script src="{{ asset('js/app.js') }}" defer></script>
   <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
   <link href="{{ asset('css/owl.theme.default.css') }}" rel="stylesheet">
   <link href="{{ asset('style.css') }}" rel="stylesheet">
    -->    
           
   
</head>
        
        <title>Renthem | @yield('title','Catalogo Alloggi')</title>
    
    <body>
        <div id="wrapper">
            
            <div id="navbar">
                @include('layouts/navbar_public')
            </div>
            <!-- end #header -->
            
            <div id="menu">
                @include('layouts/menu_public')
            </div>
            <!-- end #menu -->
            
            <div id="page">                
                    <div id="home">
                        @yield('catalogo')
                        <div style="clear: both;">&nbsp;</div>
                    </div>                
            </div>
            <!-- end #content -->
            
            <div id="footer">
                @include('layouts/footer')
            </div>
            <!-- end #footer -->
        </div>
    </body>
</html>