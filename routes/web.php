<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/

//Ruta para que todos los usuarios entren al dashboard
Route::group(['middleware' => ['auth']], function()
{
  Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');  
});

//Ruta para todo los usuarios entren al menu en el dashboard
//Route::group(['middleware' => ['auth', 'role:user']], function()
Route::group(['middleware' => ['auth']], function()
{
  Route::get('/dashboard/menu', 'App\Http\Controllers\DashboardController@menu')->name('dashboard.menu');  
});

//Ruta para todo los usuarios entren a la reservacion en el dashboard
//Route::group(['middleware' => ['auth', 'role:user']], function()
Route::group(['middleware' => ['auth']], function()
{
  Route::get('/dashboard/reservacion', 'App\Http\Controllers\DashboardController@reservacion')->name('dashboard.reservacion');  
});

//Ruta para todo los usuarios administradores entren al menu de administrar usuario en el dashboard
//Route::group(['middleware' => ['auth', 'role:user']], function()
Route::group(['middleware' => ['auth']], function()
{
  Route::get('/dashboard/administrarusuario', [UserController::class,'administrarusuario'])->name('dashboard.administrarusuario'); 
  Route::get('cu', [UserController::class,'create']) -> name('cu');
  Route::post('su', [UserController::class,'store']) -> name('su');
  Route::delete('du/{id}', [UserController::class,'destroy']) -> name('du');
  Route::get('su', [UserController::class,'show']) -> name('su');
  Route::get('eu/{id}', [UserController::class,'edit']) -> name('eu');
  Route::put('uu/{id}', [UserController::class,'update']) -> name('uu');
});

//Ruta para todo los usuarios administradores entren al menu de administrar producto en el dashboard
//Route::group(['middleware' => ['auth', 'role:user']], function()
Route::group(['middleware' => ['auth']], function()
{
  Route::get('/dashboard/administrarproducto', 'App\Http\Controllers\DashboardController@administrarproducto')->name('dashboard.administrarproducto');  
});

//Ruta para todo los usuarios administradores entren al menu de administrar factura en el dashboard
//Route::group(['middleware' => ['auth', 'role:user']], function()
Route::group(['middleware' => ['auth']], function()
{
  Route::get('/dashboard/administrarfactura', 'App\Http\Controllers\DashboardController@administrarfactura')->name('dashboard.administrarfactura');  
});

//Ruta para todo los usuarios administradores entren al menu de administrar reservacion en el dashboard
//Route::group(['middleware' => ['auth', 'role:user']], function()
Route::group(['middleware' => ['auth']], function()
{
  Route::get('/dashboard/administrarreservacion', 'App\Http\Controllers\DashboardController@administrarreservacion')->name('dashboard.administrarreservacion');  
});
require __DIR__.'/auth.php';
