<!DOCTYPE html>

<html lang="en">  
    <head>        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Gruppo 16">
        <meta name="description" content="Sito della Renthem">
        <!-- CATALOGO -->
        <meta name="keywords" content="case, appartamenti, affitto, camere, studenti">               
        <title>Renthem | @yield('title','Catalogo Alloggi')</title>
         @include('layouts.stylelayout')
</head>                   
    <body>
        <div id="wrapper">
            
            <div id="navbar">
                @include('layouts/navbar_admin')
            </div>
            <!-- end navbar -->
            
            <div id="menu">
                @include('layouts/menu_admin')
            </div>
            <!-- end menu -->
            
            <div id="page">                
                    <div id="home">
                        @yield('catalogo4')
                        <div style="clear: both;">&nbsp;</div>
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