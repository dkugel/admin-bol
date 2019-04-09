<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



Route::get('login', 'AuthController@showLogin'); // Mostrar login
Route::post('login', 'AuthController@postLogin'); // Verificar datos
Route::get('logout', 'AuthController@logOut'); // Finalizar sesión

Route::get('descargar', 'HomeController@Excel'); // Descargar Excel
Route::get('insert','HomeController@ShowRecord');
Route::get('delete','HomeController@ShowRecord');

// Nos indica que las rutas que están dentro de él sólo serán mostradas si antes el usuario se ha autenticado.
Route::group(array('before' => 'auth'), function()
{
    // Esta será nuestra ruta de bienvenida.
    //Route::get('/', function()
    //{
      Route::get('/','HomeController@getData');
      Route::post('/','HomeController@UpdateRecord');
      Route::post('insert','HomeController@InsertRecord');
      Route::post('delete','HomeController@DeleteRecord');
      /* Route::post('/', function(){
        $flag = Input::get('flag');
        if($flag == "1") {
            App::make('HomeController')->UpdateRecord();
        } else {
            App::make('MyController')->InsertRecord();
        }
      }); */
    //});
    // Esta ruta nos servirá para cerrar sesión.
  //  Route::get('logout', 'AuthController@logOut');
});

