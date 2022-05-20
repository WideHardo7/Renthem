
<!DOCTYPE html>
<html lang="en">
    <head>        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Gruppo 16">
        <meta name="description" content="Sito della Renthem">
        <meta name="keywords" content="case, appartamenti, affitto, camere, studenti">
        
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
        <title>HomePage</title>
    </head>
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
                        @yield('homepage')
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