<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ObraController;
use App\Http\Controllers\ExposicaoController;
use App\Http\Controllers\LogisticaController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('artists', ArtistController::class);
    Route::resource('obras', ObraController::class);
    Route::resource('exposicoes', ExposicaoController::class);
    Route::resource('logisticas', LogisticaController::class);
});

require __DIR__.'/auth.php';
