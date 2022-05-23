<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')
        ->name('register');






// ROUTES LIVELLO 1

 Route::get('/','PublicController@viewFaqPage' ) -> name('homelvl1');

 Route::get('/Alloggi', 'PublicController@showAlloggi' ) -> name('alloggipub');

 Route::get('/Alloggi/SchedaAlloggio/{Annuncioid}',controller here)->name('scheda');

// Route::get('login', 'Auth\LoginController@showLoginForm')
//        ->name('login');

// Route::post('login', 'Auth\LoginController@login');
   
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')
//        ->name('register');

// Route::post('register', 'Auth\RegisterController@register');*/




// ROUTES IN COMUNE (MAYBE)
    
// Route::get('/Profilo', controller here) -> name('profilo');
   
// Route::get('/Profilo/Modifica', controller here) -> name('profilo');  

// Route::post('/Profilo/Modifica', controller here) -> name('profilo.store');
   
// Route::post('logout', 'Auth\LoginController@logout') -> name('logout'); 

// Route::get('/Chat',controller here) -> name(chat);   

// Route::get('/Chat/{UserId}',controller here) -> name(chatutente);
   
// Route::post('/Chat/{UserId}',controller here) -> name(chatutente.store); 
 

   

   
   
// ROUTES LIVELLO 2   
   
// Route::get('/', controller here ) -> name('homelvl2');
   
// Route::get('/CreaAnnuncio', controller here) -> name('creaannuncio');
   
// Route::post('/CreaAnnuncio', controller here) -> name('creaannuncio.store');
   
// Route::get('/GestioneAnnunci', controller here) -> name('gestann');
   
// Route::get('/GestioneAnnunci/ModificaAnnuncio/{Annuncioid}', controller here) -> name('modann');

// Route::post('/GestioneAnnunci/ModificaAnnuncio/{Annuncioid}', controller here) -> name('modann.store');
   
// Route::get('/GestioneAnnunci/Annuncio/{Annuncioid}', controller here) -> name('schedaannunciolocatore');
   
// Route::get('/GestioneAnnunci/Annuncio/{Annuncioid}/Interessati', controller here) -> name('interessati');

// Route::get('/GestioneAnnunci/Annuncio/{Annuncioid}/Interessati/{UserId}', controller here) -> name('chatinteressato');
   
// Route::post('/GestioneAnnunci/Annuncio/{Annuncioid}/Interessati/{UserId}', controller here) -> name('chatinteressato.store');
 
   
   
   
   
   
// ROUTES LIVELLO 3 

// Route::get('/', controller here ) -> name('homelvl3');   
   
// Route::get('/Alloggi',controller here) -> name('alloggilocatario');

// Route::get('/Alloggi/SchedaAlloggio/{Annuncioid}', controller here) -> name('schedaalloggiolocatario');

// Route::get('/Alloggi/SchedaAlloggio/{Annuncioid}/Messaggio', controller here) -> name('mandamessaggio');
   
// Route::post('/Alloggi/SchedaAlloggio/{Annuncioid}/Messaggio', controller here) -> name('mandamessaggio.store');



   
   
   
// ROUTES LIVELLO 4

// Route::get('/', controller here ) -> name('homelvl4');   

// Route::get('/admin', 'AdminController@index')->name('admin');
        
// Route::get('/GestioneFaq', controller here) -> name(gestionefaqs);




// Rotte per l'autenticazione
// Route:get('/Admin/Faqmng, controller here)->name('adminfaq');
// Rotte per la registrazione
   

   Route::view('/where', 'where')
         ->name('where');

   Route::view('/who', 'who')
        ->name('who');
    
 

// Rotte inserite dal comando artisan "ui vue --auth" 
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
/*
   Route::get('/selTopCat/{topCatId}/selCat/{catId}', 'PublicController@showCatalog3')
        ->name('catalog3');

   Route::get('/selTopCat/{topCatId}', 'PublicController@showCatalog2')
        ->name('catalog2');

   Route::get('/admin/newproduct', 'AdminController@addProduct')
        ->name('newproduct');


   Route::get('/user', 'UserController@index')               forse utilizzabile forse no
        ->name('user')->middleware('can:isUser');

   Route::post('/admin/newproduct', 'AdminController@storeProduct')
        ->name('newproduct.store');*/
