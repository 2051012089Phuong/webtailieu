<?php

use App\Http\Controllers;

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*

//cu phap: Route::get('ten tren url',[ten controller::class, 'ham xu ly trong controller'])->name('ten tu dat');
//                                                    ^ co the thay bang @ham xu ly

Route::resource('index','DocumentController');

//trang chu la trang cua minh


Route::get('document',[DocumentController::class,'index'])->name('document.index');
Route::get('/',[DocumentController::class,'index'])->name('document.index');
Route::get('/document',[DocumentController::class,'index'])->name('document.index');

//trang xem thong tin tai lieu
Route::get('docs-detail/{documentId}',[DocumentController::class,'getDocumentDetail'])->name('document.docs-detail');

//trang search
Route::get('search',[DocumentController::class,'searchDocument'])->name('document.search');

//trang tai len tai lieu
Route::get('/add-document',[DocumentController::class,'addDocument'])->name('document.add-document');
Route::post('',[DocumentController::class,'insertDocument'])->name('document.insertDocument');

//Route::post('',['as'=>'insert','uses'=>'DocumentController@insertDocument']);


//trang quan ly tai lieu, xoa
Route::get('documentlist',[DocumentController::class,'listDocument'])->name('document.documentList');
Route::get('documentlist/{documentId}',[DocumentController::class,'deleteDocument'])->name('document.deleteDocument');
*/


//code sinh tu dong

/*Route::get('/home', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('home');*/



Route::get('/home',[HomeController::class,'index'])
->middleware('auth')
->name('home');

Route::resource('index','DocumentController');

//trang chu la trang cua minh
Route::get('index',[DocumentController::class,'index'])->name('ndex');
Route::get('/',[DocumentController::class,'index'])->name('index');
Route::get('/index',[DocumentController::class,'index'])->name('index');


Route::get('post',[HomeController::class,'post'])->middleware('auth','admin');

Route::get('401-unauthorized', function () {
    return view('401-unauthorized');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
