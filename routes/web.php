<?php
    Route::get('/r1/{a}/{b}', function ($a, $b) {
        return $a*$b;
    });   

    Route::get('/r2/{a}/{b?}', function ($a, $b = 5) {
        return $a*$b;
    });

    Route::get('/r3/{a}/{b?}', function ($a, $b = 5) {
        return $a*$b;
    })->where('a', '[0-9]+');

    Route::get('/rutas', 'RutasController@update');
    Route::get('/rutas/{a}/{b}', 'pruebas\RutasController@multiplicacion');

    Route::resource('ninos', 'Res\NinosController');