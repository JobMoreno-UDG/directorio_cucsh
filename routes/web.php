<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginaController;


Route::get('/',[PaginaController::class,'index'])->name('inicio');

//Route::resource('pagina', PaginaController::class);
Route::get('/pagina/{edificio}',[PaginaController::class,'show'])->name('pagina.edificio');
Route::get('/pagina/{edificio}/{info}',[PaginaController::class,'info'])->name('pagina.info');

Route::post('/pagina',[PaginaController::class,'buscador'])->name('buscador');