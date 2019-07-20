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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('listaAlunos','AlunoController@listALuno');
Route::get('mostraAluno/{id}','AlunoController@showALuno');
Route::post('criaAluno','AlunoController@createALuno');
Route::put('atualiza/{id}','AlunoController@updateALuno');
Route::delete('deletaAluno/{id}','AlunoController@deleteALuno');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('listaProfessor','ProfessorController@listProfessor');
Route::get('mostraProfessor/{id}','ProfessorController@showProfessor');
Route::post('criaProfessor','ProfessorController@createProfessor');
Route::put('atualizaProfessor/{id}','ProfessorController@updateProfessor');
Route::delete('deletaProfessor/{id}','ProfessorController@deleteProfessor');
