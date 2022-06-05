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


// ROUTES LIVELLO 1
//Route::get('/test','LocatoreController@Returnintrest');

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
 


// ROUTES IN COMUNE (MAYBE)
    
 Route::get('/Profilo', 'UserController@index') -> name('profilo');
   
 Route::get('/Profilo/Modifica' , 'UserController@ViewEditProfilo') -> name('viewmodprof');  

 Route::post('/Profilo/Modifica', 'UserController@EditUtente')->name('editutente');
 
 
// Route::post('/Profilo/Modifica', controller here) -> name('profilo.store');
   
 

 Route::get('/Chat','UserController@viewChat') -> name('chat')->middleware('can:isLoreLario');  
 

// Route::get('/Chat/{UserId}',controller here) -> name(chatutente);
   
// Route::post('/Chat/{UserId}',controller here) -> name(chatutente.store); 
 

   

   
   
// ROUTES LIVELLO 2   
Route::get('filtro', 'LocatarioController@filtro') -> name('filtro');

Route::get('nuovoAnnuncio', 'LocatoreController@showNuovoAnnuncioForm')->name('nuovoAnnuncio'); 
 
 Route::post('insertAnnuncio', 'LocatoreController@insertAnnuncio')->name('insertAnnuncio');
 
 Route::get('GestioneAlloggi', 'LocatoreController@showAnnunci')->name('viewAnnunci');

   
// Route::get('/CreaAnnuncio', controller here) -> name('creaannuncio');
   
// Route::post('/CreaAnnuncio', controller here) -> name('creaannuncio.store');
   
// Route::get('/GestioneAnnunci', controller here) -> name('gestann');
   
 Route::get('/GestioneAnnunci/ModificaAnnuncio/{Annuncioid}', 'LocatoreController@ShowFormMod') -> name('modann');

 Route::post('/GestioneAnnunci/ModificaAnnuncio', 'LocatoreController@PostFormMod') -> name('insertmod');
   
 Route::post('/GestioneAnnunci/{Annuncioid}', 'LocatoreController@Delete' ) -> name('cancella');

 Route::get('/GestioneAnnunci/{Annuncioid}', 'LocatoreController@Returnintrest' ) -> name('interessati');
         
 Route::post('/GestioneAnnunci/Assegna/{Annuncioid}&{user_id}', 'LocatoreController@Assegna' ) -> name('assegna');
 
// Route::get('/GestioneAnnunci/Annuncio/{Annuncioid}/Interessati', controller here) -> name('interessati');

// Route::get('/GestioneAnnunci/Annuncio/{Annuncioid}/Interessati/{UserId}', controller here) -> name('chatinteressato');
   
// Route::post('/GestioneAnnunci/Annuncio/{Annuncioid}/Interessati/{UserId}', controller here) -> name('chatinteressato.store');
 
   
   
   
   
   
// ROUTES LIVELLO 3 

 


Route::post('/Alloggi/SchedaAlloggio/{Annuncioid}/Opzionamento', 'LocatarioController@setOption') -> name('opzionamento');
   
 Route::post('/Alloggi/SchedaAlloggio/{Annuncioid}/Messaggio', 'LocatarioController@sendMessage') -> name('mandamessaggio');



   
   
   
// ROUTES LIVELLO 4

 Route::get('/GestioneFaq', 'AdminController@ViewEditFaq') -> name('viewEditFaq');
 
 Route::post('/GestioneFaq', 'AdminController@EditFaq') -> name('EditFaq');
 
 Route::post('/GestioneFaq/Add', 'AdminController@AggiungiFaq') -> name('Faqadd');
 
 Route::post('/GestioneFaq/{id}', 'AdminController@EliminaFaq') -> name('EliminaFaq');
 
 Route::get('/Statistiche', 'AdminController@ViewStats') -> name('viewStats'); 
 
// Route::get('/', controller here ) -> name('homelvl4');   

// Route::get('/admin', 'AdminController@index')->name('admin');
        
// Route::get('/GestioneFaq', controller here) -> name(gestionefaqs);




// Rotte per l'autenticazione
// Route:get('/Admin/Faqmng, controller here)->name('adminfaq');
// Rotte per la registrazione
   

   Route::view('/where', 'where')
         ->name('where');

  
    
 

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
// {{Form::close()}}
//   {{Form::open(array("route"=>["EliminaFaq",'id'=>$faq->FaqId],"id"=>"FaqDel"))}}
 //                           {{Form::hidden('FaqId',$faq->FaqId,['id'=>'faqiddel'])}}
