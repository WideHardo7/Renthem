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


// ROUTES LIVELLO 1 (PUBBLICO)


 Route::get('/','PublicController@viewFaqPage' ) -> name('homelvl1');

 Route::get('/Alloggi', 'PublicController@showAlloggi' ) -> name('alloggipub');

 Route::get('/Alloggi/SchedaAlloggio/{Annuncioid}', 'PublicController@schedaAlloggio') -> name('scheda');

 Route::get('login', 'Auth\LoginController@showLoginForm') ->name('login');       

 Route::post('login', 'Auth\LoginController@login');
 
 Route::post('logout', 'Auth\LoginController@logout') -> name('logout');
   
 Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');       

 Route::post('register', 'Auth\RegisterController@register');
 
 //download della documentazione
Route::get('/download', function () {
    return response()->download('doc/Documentazione_progetto.pdf');
})->name('doc');
 


// ROUTES IN COMUNE  TRA UTENTI LOGGATI
    
 Route::get('/Profilo', 'UserController@index') -> name('profilo');
   
 Route::get('/Profilo/Modifica' , 'UserController@ViewEditProfilo') -> name('viewmodprof');  

 Route::post('/Profilo/Modifica', 'UserController@EditUtente')->name('editutente');
 
 Route::get('/Chat','UserController@viewChat') -> name('chat')->middleware('can:isLoreLario');
 
 Route::post('/Chat','UserController@saveMessage') -> name('chatpost')->middleware('can:isLoreLario');
 
 Route::get('/Chat/{id}','UserController@viewMessage') -> name('chatmessage')->middleware('can:isLoreLario');
 



   

   
   
// ROUTES LIVELLO 2   


Route::get('nuovoAnnuncio', 'LocatoreController@showNuovoAnnuncioForm')->name('nuovoAnnuncio'); 
 
 Route::post('insertAnnuncio', 'LocatoreController@insertAnnuncio')->name('insertAnnuncio');
 
Route::get('GestioneAlloggi', 'LocatoreController@showAnnunci')->name('viewAnnunci');
   
Route::get('/GestioneAnnunci/ModificaAnnuncio/{Annuncioid}', 'LocatoreController@ShowFormMod') -> name('modann');

 Route::post('/GestioneAnnunci/ModificaAnnuncio', 'LocatoreController@PostFormMod') -> name('insertmod');
   
 Route::post('/GestioneAnnunci/{Annuncioid}', 'LocatoreController@Delete' ) -> name('cancella');

 Route::get('/GestioneAnnunci/{Annuncioid}', 'LocatoreController@Returnintrest' ) -> name('interessati');
         
 Route::post('/GestioneAnnunci/Assegna/{Annuncioid}&{user_id}', 'LocatoreController@Assegna' ) -> name('assegna');
 

 
   
   
   
   
   
// ROUTES LIVELLO 3 

 


Route::post('/Alloggi/SchedaAlloggio/{Annuncioid}/Opzionamento', 'LocatarioController@setOption') -> name('opzionamento');
   
 Route::post('/Alloggi/SchedaAlloggio/{Annuncioid}/Messaggio', 'LocatarioController@sendMessage') -> name('mandamessaggio');
 
 Route::get('filtro', 'LocatarioController@filtro') -> name('filtro');



   
   
   
// ROUTES LIVELLO 4

 Route::get('/GestioneFaq', 'AdminController@ViewEditFaq') -> name('viewEditFaq');
 
 Route::post('/GestioneFaq', 'AdminController@EditFaq') -> name('EditFaq');
 
 Route::post('/GestioneFaq/Add', 'AdminController@AggiungiFaq') -> name('Faqadd');
 
 Route::post('/GestioneFaq/{id}', 'AdminController@EliminaFaq') -> name('EliminaFaq');
 
 Route::get('/Statistiche', 'AdminController@ViewStats') -> name('viewStats'); 
 
 Route::post('/Statistiche', 'AdminController@ViewStatsbyFilter') -> name('viewStatsbyfiler');
 
