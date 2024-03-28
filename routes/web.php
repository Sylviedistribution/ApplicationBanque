<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarteController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\PackController;
use App\Http\Controllers\RibController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
    Route::get('dashboard', 'dashboard')->name('dashboard');


});

//UtilisateurController routes
Route::controller(UtilisateurController::class)->group(function () {
    Route::get('utilisateurs','index')->name('utilisateurs.list');
    Route::get('utilisateurs/create', 'create')->name('utilisateurs.create');
    Route::get('utilisateurs/show/{id}', 'show')->name('utilisateurs.show');
    Route::post('utilisateurs/store', 'store')->name('utilisateurs.store');
    Route::get('utilisateurs/edit/{id}', 'edit')->name('utilisateurs.edit');
    Route::post('utilisateurs/update/{utilisateur}', 'update')->name('utilisateurs.update');
    Route::get('utilisateurs/destroy/{id}', 'destroy')->name('utilisateurs.destroy');
});

//CompteController routes
Route::controller(CompteController::class)->group(function () {
    Route::get('comptes','index')->name('comptes.list');
    Route::get('comptes/create', 'create')->name('comptes.create');
    Route::post('comptes/store', 'store')->name('comptes.store');
    Route::get('comptes/edit/{id}', 'edit')->name('comptes.edit');
    Route::get('comptes/update/{compte}', 'update')->name('comptes.update');
    Route::get('comptes/destroy/{id}', 'destroy')->name('comptes.destroy');
});

//RibController routes
Route::controller(RibController::class)->group(function () {
    Route::get('ribs','index')->name('ribs.list');
    Route::get('ribs/create', 'create')->name('ribs.create');
    Route::get('ribs/store', 'store')->name('ribs.store');
    Route::get('ribs/edit/{id}', 'edit')->name('ribs.edit');
    Route::post('ribs/update/{ribs}', 'update')->name('ribs.update');
    Route::get('ribs/destroy/{id}', 'destroy')->name('ribs.destroy');
});

//PackController routes
Route::controller(PackController::class)->group(function () {
    Route::get('packs','index')->name('packs.list');
    Route::get('packs/create', 'create')->name('packs.create');
    Route::post('packs/store', 'store')->name('packs.store');
    Route::get('packs/edit/{id}', 'edit')->name('packs.edit');
    Route::post('packs/update/{pack}', 'update')->name('packs.update');
    Route::get('packs/destroy/{id}', 'destroy')->name('packs.destroy');


});

//TranscationController routes
Route::controller(TransactionController::class)->group(function () {
    Route::get('transactions','index')->name('transactions.list');
    Route::get('transactions/create', 'create')->name('transactions.create');
    Route::post('transactions/store', 'store')->name('transactions.store');
    Route::get('transactions/edit/{id}', 'edit')->name('transactions.edit');
    Route::post('transactions/update/{transaction}', 'update')->name('transactions.update');
    Route::get('transactions/destroy/{id}', 'destroy')->name('transactions.destroy');

});

//CarteController routes
Route::controller(CarteController::class)->group(function () {
    Route::get('cartes','index')->name('cartes.list');
    Route::get('cartes/create', 'create')->name('cartes.create');
    Route::post('cartes/store', 'store')->name('cartes.store');
    Route::get('cartes/edit/{id}', 'edit')->name('cartes.edit');
    Route::post('cartes/update/{carte}', 'update')->name('cartes.update');
    Route::get('cartes/destroy/{id}', 'destroy')->name('cartes.destroy');


});

Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
}) -> name('index');
