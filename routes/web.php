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

// ROTTA  CHE GESTISCE LA HOMEPAGE VISIBILE AGLI UTENTI
Route::get("/", "HomeController@index")->name("index");

//ROTTA CHE GESTIRA' I POST PER L'UTENTE GENERICO

Route::resource("/posts" , "PostController");

// SERIE DI ROTTE CHE GESTISCONO TUTTO IL MECCANISMO DI AUTENTICAZIONE
Auth::routes();

// SERIE DI ROTTE CHE GESTISCONO IL BACKOFFICE
// Route::get('/admin', 'HomeController@index')->name('admin');
Route::middleware("auth")->prefix("admin")->namespace("Admin")->name("admin.")
    ->group(function(){
        // PAGINA DI ATTERRAGGIO DOPO IL LOGIN (CON IL PREFIX, L'URL E L'ADMIN)
        Route::get("/", "HomeController@index")->name("index");

        Route::resource("/posts", "PostController");
        Route::resource("/categories", "CategoryController");
    });



