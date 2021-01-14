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

/* Route::get('/', function () {
    return view('welcome');
}); */

//a rota verifica se o cara ta logado, se n tiver ele manda para a tela de login
Route::get('/', function () {
	if(Auth::check()){
    	return view('welcome');
	} else {
		return view('auth/login');
	}
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//para onde o usuário vai ser levado ao ser autenticado
Route::get('/user', function()
{
    $user = Auth::user();
    echo "Seja bem vindo, $user->name";
});

//rota do painel
//a rota verifica se o cara ta logado, se n tiver ele manda para a tela de login
Route::get('/', function () {
	if(Auth::check()){
    	return view('welcome');
	} else {
		return view('auth/login');
	}
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//para onde o usuário vai ser levado ao ser autenticado, usando o middleware
Route::get('/panel', function()
{
    echo "Seja bem vindo, Administrator";
})->middleware('require-admin');