<?php

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


Route::get('series', 'SeriesController@index')->name('listando-series-adicionadas');
Route::get('series/criar', 'SeriesController@create')->name('adiciona-serie');
Route::post('series/criar', 'SeriesController@store')->name('salvando-nova-serie');
Route::DELETE('series/{id}', 'SeriesController@delete');
Route::post('series/{id}/editaNome','SeriesController@editaNome');

Route::get('series/{serieId}/temporadas', 'TemporadasController@index');

//Route::get('temporadas/{temporada}/episodios', 'EpisodiosController@index')->name('exibindo-lista-episodios');
Route::resource('episodios', 'EpisodiosController');
