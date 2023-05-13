<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BienController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\CaracteristiqueController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::resource('biens', BienController::class);
        Route::resource('caracteristiques', CaracteristiqueController::class);
        Route::resource('marques', MarqueController::class);
        Route::get('all-media', [MediaController::class, 'index'])->name(
            'all-media.index'
        );
        Route::post('all-media', [MediaController::class, 'store'])->name(
            'all-media.store'
        );
        Route::get('all-media/create', [
            MediaController::class,
            'create',
        ])->name('all-media.create');
        Route::get('all-media/{media}', [MediaController::class, 'show'])->name(
            'all-media.show'
        );
        Route::get('all-media/{media}/edit', [
            MediaController::class,
            'edit',
        ])->name('all-media.edit');
        Route::put('all-media/{media}', [
            MediaController::class,
            'update',
        ])->name('all-media.update');
        Route::delete('all-media/{media}', [
            MediaController::class,
            'destroy',
        ])->name('all-media.destroy');

        Route::resource('modeles', ModeleController::class);
        Route::resource('types', TypeController::class);
        Route::resource('users', UserController::class);
    });
