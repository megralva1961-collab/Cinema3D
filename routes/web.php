<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroPersonalController;

Route::get('/', function () {
    return redirect()->route('registros.index');
});

Route::resource(
    'registros', 
    RegistroPersonalController::class
);

    
