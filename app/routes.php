<?php

Route::get('/','HomeController@home');
Route::any('/ligacao/obter',['as'=>'home.ligacoes','uses'=>'HomeController@ligacoes']);
Route::get('/cidade/cadastrar',['as'=>'cidade.cadastrar','uses'=> 'CidadesController@cadastrarHome']);
Route::post('/cidade/salvar',['as'=>'cidades.salvar','uses'=>'CidadesController@salvar']);
Route::get('/ligacao/cadastrar',['as'=>'ligacao.cadastar','uses'=>'LigacaoController@cadastrar']);
Route::post('/ligacao/salvar',['as'=>'ligacao.salvar','uses'=>'LigacaoController@salvar']);