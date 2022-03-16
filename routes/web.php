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


Route::post('password/email', 'LoginController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');


Route::post('/ingresar', 'LoginController@ingresar');
Route::post('/logout', 'LoginController@logout')->middleware('auth');
Route::get('/recuperar',function(){
	return view('Login.recuperar');
});


Route::get('/register', 'LoginController@registration');
Route::post('/registerform', 'LoginController@customRegistration');
Route::resource('/supervisor','SupervisorController')->except('show')->middleware('auth.admin');
Route::get('supervisor/consultar','SupervisorController@consulta_data')->middleware('auth.admin');

Route::resource('/local','LocalController')->except('show')->middleware('auth.admin');
Route::get('local/consultar','LocalController@consulta_data')->middleware('auth.admin');

Route::resource('/vendedor','VendedorController')->except('show')->middleware('sup.admin');
Route::get('vendedor/consultar','VendedorController@consulta_data')->middleware('sup.admin');

Route::resource('/producto','ProductoController')->except('show')->middleware('sup.admin');
Route::get('producto/consultar','ProductoController@consulta_data')->middleware('sup.admin');
Route::get('producto/info/{id}','ProductoController@consultar')->middleware('sup.admin');

Route::resource('/promociones','PromocionesController')->except('show')->middleware('sup.admin');
Route::get('promociones/consultar','PromocionesController@consulta_data')->middleware('sup.admin');

Route::resource('/ventas','VentasController')->except('show')->middleware('sup.admin');
Route::get('ventas/consultar/{vendedor}/{estado}/{fec1}/{fec2}/{checked}','VentasController@consulta_data')->middleware('sup.admin');
Route::get('ventas/info/{id}','VentasController@consultar')->middleware('sup.admin');