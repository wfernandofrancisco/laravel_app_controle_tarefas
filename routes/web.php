<?php

use App\Mail\MensagemTesteMail;
use Illuminate\Support\Facades\Route;

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

/*
Route::get('acesso-negado', function () {
    return view('acesso-negado');
});
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('tarefa', 'App\Http\Controllers\TarefaController')->middleware('auth');

Route::get('mensagem-teste', function (){
   // return new MensagemTesteMail();
   Mail::to('wfernandofrancisco@gmail.com')->send(new MensagemTesteMail());
   return 'email enviado com sucesso!';
});