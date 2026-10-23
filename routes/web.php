<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroPersonalController;

Route::get('/', function () {
    return view('cinema3d');
});

Route::post('/registros', [RegistroPersonalController::class, 'store'])->name('registros.store');

    
