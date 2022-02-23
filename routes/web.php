<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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




Route::get('/', function(){
	return view('Login.login');
})->name('/')->middleware('guest');

Route::get('/home',  function(){
		$tipo=Auth::user()->getAttributes()["id_tipo"];
        return view('plantilla', compact('tipo'));
})->middleware('auth')->name('home');

Route::post('/ingresar', 'LoginController@ingresar');
Route::post('/logout', 'LoginController@logout')->middleware('auth');
Route::get('/recuperar',function(){
	return view('Login.recuperar');
});


Route::get('/register', 'LoginController@registration');
Route::post('/registerform', 'LoginController@customRegistration');
Route::resource('/supervisor','SupervisorController')->except('show')->middleware('auth.admin');
Route::get('supervisor/consultar','SupervisorController@consulta_data');




