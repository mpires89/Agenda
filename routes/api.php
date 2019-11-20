<?php

use Illuminate\Http\Request;

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

Route::group(array('prefix' => 'agenda'), function() {

    Route::get('/contato/{id}', ['uses' => 'Agenda\ContatoController@buscarMensagensPorContato']);
    Route::put('/contato/{id}', ['uses' => 'Agenda\ContatoController@alterarContato']);
    Route::delete('/contato/{id}', ['uses' => 'Agenda\ContatoController@excluirContato']);
    Route::post('/contato', ['uses' => 'Agenda\ContatoController@inserirContato']);
    Route::get('/contato', ['uses' => 'Agenda\ContatoController@buscarTodosContatos']);

    Route::put('/contato/mensagem/{id}', ['uses' => 'Agenda\ContatoController@alterarMensagem']);
    Route::delete('contato/mensagem/{id}', ['uses' => 'Agenda\ContatoController@excluirMensagem']);
    Route::post('contato/mensagem', ['uses' => 'Agenda\ContatoController@inserirMensagem']);
    Route::get('/contato/mensagem/todas', ['uses' => 'Agenda\ContatoController@buscarTodasMensagens']);


});
