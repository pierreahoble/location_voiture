<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BienController;
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\MediaController;
use App\Http\Controllers\Api\MarqueController;
use App\Http\Controllers\Api\ModeleController;
use App\Http\Controllers\Api\TypeBiensController;
use App\Http\Controllers\Api\UserBiensController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\MarqueBiensController;
use App\Http\Controllers\Api\ModeleBiensController;
use App\Http\Controllers\Api\BienAllMediaController;
use App\Http\Controllers\Api\CaracteristiqueController;
use App\Http\Controllers\Api\BienCommentairesController;
use App\Http\Controllers\Api\BienCaracteristiquesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::apiResource('biens', BienController::class);

        // Bien Caracteristiques
        Route::get('/biens/{bien}/caracteristiques', [
            BienCaracteristiquesController::class,
            'index',
        ])->name('biens.caracteristiques.index');
        Route::post('/biens/{bien}/caracteristiques', [
            BienCaracteristiquesController::class,
            'store',
        ])->name('biens.caracteristiques.store');

        // Bien All Media
        Route::get('/biens/{bien}/all-media', [
            BienAllMediaController::class,
            'index',
        ])->name('biens.all-media.index');
        Route::post('/biens/{bien}/all-media', [
            BienAllMediaController::class,
            'store',
        ])->name('biens.all-media.store');

        // Bien Commentaires
        Route::get('/biens/{bien}/commentaires', [
            BienCommentairesController::class,
            'index',
        ])->name('biens.commentaires.index');
        Route::post('/biens/{bien}/commentaires', [
            BienCommentairesController::class,
            'store',
        ])->name('biens.commentaires.store');

        Route::apiResource(
            'caracteristiques',
            CaracteristiqueController::class
        );

        Route::apiResource('marques', MarqueController::class);

        // Marque Biens
        Route::get('/marques/{marque}/biens', [
            MarqueBiensController::class,
            'index',
        ])->name('marques.biens.index');
        Route::post('/marques/{marque}/biens', [
            MarqueBiensController::class,
            'store',
        ])->name('marques.biens.store');

        Route::apiResource('all-media', MediaController::class);

        Route::apiResource('modeles', ModeleController::class);

        // Modele Biens
        Route::get('/modeles/{modele}/biens', [
            ModeleBiensController::class,
            'index',
        ])->name('modeles.biens.index');
        Route::post('/modeles/{modele}/biens', [
            ModeleBiensController::class,
            'store',
        ])->name('modeles.biens.store');

        Route::apiResource('types', TypeController::class);

        // Type Biens
        Route::get('/types/{type}/biens', [
            TypeBiensController::class,
            'index',
        ])->name('types.biens.index');
        Route::post('/types/{type}/biens', [
            TypeBiensController::class,
            'store',
        ])->name('types.biens.store');

        Route::apiResource('users', UserController::class);

        // User Biens
        Route::get('/users/{user}/biens', [
            UserBiensController::class,
            'index',
        ])->name('users.biens.index');
        Route::post('/users/{user}/biens', [
            UserBiensController::class,
            'store',
        ])->name('users.biens.store');
    });
