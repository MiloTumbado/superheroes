<?php
use Illuminate\Support\Facades\Route;
Route::get('/',function(){return redirect()->route('superheroes.index');});
Route::get('/superheroes/trash','SuperheroController@trash')->name('superheroes.trash');
Route::post('/superheroes/{id}/restore','SuperheroController@restore')->name('superheroes.restore');
Route::resource('superheroes','SuperheroController');
