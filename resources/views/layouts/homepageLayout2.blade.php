
<!DOCTYPE html>
<html lang="en">
    <head>   
        
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Gruppo 16">
        <meta name="description" content="Sito della Renthem">
        <meta name="keywords" content="case, appartamenti, affitto, camere, studenti">
        
        @include('layouts.stylelayout')
        <title>Renthem | @yield('title','HomePage')</title>
    </head>
    <body>
        <div id="wrapper">
            
            <div id="navbar">
                @include('layouts/navbar_locatore')
            </div>
            <!-- end #header -->
            
            <div id="menu">
                @include('layouts/menu_locatori')
            </div>
            <!-- end #menu -->
            
            <div id="page">                
                    <div id="home">
                        @yield('homepage2') 
                        <div style="clear: both;">&nbsp;</div>
                    </div>                
            </div>
            
            <div id="page">                
                    <div id="home">
                        @yield('profilo2') 
                        <div style="clear: both;">&nbsp;</div>
                    </div>                
            </div>
            
            <div id="login">                
                    <div id="home">
                        @yield('login')
                        <div style="clear: both;">&nbsp;</div>
                    </div>                
            </div>
            
            <div id="page">                
            <div id="home">
                        @yield('Registrazione')
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