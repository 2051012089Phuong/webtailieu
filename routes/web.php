<?php

use App\Http\Controllers;

use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\PasswordController;

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
    return view('index');
});

//phan chung cho moi doi tuong (khong can login)

Route::resource('index', 'DocumentController');

//trang chu la trang cua minh
Route::get('index', [DocumentController::class, 'index'])->name('ndex');
Route::get('/', [DocumentController::class, 'index'])->name('index');
Route::get('/index', [DocumentController::class, 'index'])->name('index');

//trang search
Route::get('search', [DocumentController::class, 'searchDocument'])->name('searchdocs');

//trang xem thong tin tai lieu
Route::get('docs-detail/{documentId}', [DocumentController::class, 'getDocumentDetail'])->name('docs-detail');

// //trang tai len tai lieu
// Route::get('/add-document',[DocumentController::class,'addDocument'])->middleware('auth')->name('add-document');
// Route::post('',[DocumentController::class,'insertDocument'])->middleware('auth')->name('insertDocument');

// //trang quan ly tai lieu, xoa
// Route::get('documentlist',[DocumentController::class,'listDocument'])->middleware('auth','admin')->name('documentlist');
// Route::get('documentlist/{documentId}',[DocumentController::class,'deleteDocument'])->middleware('auth','admin')->name('deleteDocument');

//phan quyen
//tuy theo vai tro login ma co giao dien khac nhau


Route::get('/home', [HomeController::class, 'index'])
    ->middleware('auth')
    ->name('home');

//Route::get('post',[HomeController::class,'post'])->middleware('auth','admin');

// Route::get('userlist',[DocumentController::class,'listUser'])->middleware('auth','admin')->name('userlist');
// Route::get('edit-role/{id}',[HomeController::class,'editRole'])->middleware('auth','admin')->name('edit-role');
// Route::put('role-update/{id}',[HomeController::class,'roleUpdate'])->middleware('auth','admin')->name('role-update');


//chuyen muc chi danh cho thanh vien da dang nhap
Route::middleware('auth')->group(function () {
    
    //trang thong tin tai khoan
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    //trang chinh sua thong tin tai khoan
    Route::get('/edit-userprofile', [ProfileController::class, 'editUserProfile'])->name('edit-userprofile');
    Route::patch('/editing-userprofile', [ProfileController::class, 'update'])->name('profile.update');

    //trang xoa tai khoan
    Route::get('/delete-account', [ProfileController::class, 'deleteUserProfile'])->name('delete-account');
    //Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //Route::delete('', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/deleting-account', [ProfileController::class, 'deletingAccount'])->name('deletingAccount');

    //trang doi mat khau
    Route::get('/edit-password', [PasswordController::class, 'resetPassword'])->name('edit-password');
    //Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //Route::delete('', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Route::put('password', [NewPasswordController::class, 'update'])->name('password.update');
    Route::put('editing-password', [PasswordController::class, 'update'])->name('update-password');


    //trang tai len tai lieu
    Route::get('/add-document', [DocumentController::class, 'addDocument'])->middleware('auth')->name('add-document');
    Route::post('', [DocumentController::class, 'insertDocument'])->middleware('auth')->name('insertDocument');

    //trang quan ly tai lieu cua chi user
    Route::get('userdocumentlist', [DocumentController::class, 'userListDocument'])->name('user-documentlist');
    //Route::post('user-deletingdocument', [DocumentController::class, 'userDeleteDocument'])->name('user-deletingdocument');
    Route::get('userdocumentlist/{documentId}', [DocumentController::class, 'userDeleteDocument'])->name('user-deleteDocument');
});

//chuyen muc chi danh cho admin
Route::middleware('admin')->group(function () {

    //trang quan ly toan bo tai lieu
    Route::get('documentlist', [DocumentController::class, 'listDocument'])->name('documentlist');
    Route::get('documentlist/{documentId}', [DocumentController::class, 'deleteDocument'])->name('deleteDocument');

    //trang quan ly nguoi dung he thong
    Route::get('userlist', [DocumentController::class, 'listUser'])->name('userlist');
    Route::get('edit-role/{id}', [HomeController::class, 'editRole'])->name('edit-role');
    Route::put('role-update/{id}', [HomeController::class, 'roleUpdate'])->name('role-update');
});


//khac

//redirect loi
Route::get('401-unauthorized', function () {
    return view('401-unauthorized');
});

Route::get('suspended-login', function () {
    return view('suspended-login');
});

require __DIR__ . '/auth.php';

