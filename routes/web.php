<?php

use App\Http\Controllers\AlbumController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadrController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LinkListController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TableListController;
use App\Http\Controllers\User\ProfileController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('test', TestController::class);

//Приветственная страница потом заменить с /index на /
Route::view('/', 'index.index')->name('index');

Route::view('home', 'home.index')->name('home');

// Страница регистрации в сервисе, сделать доступ по ссылке
Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');

// Страница авторизации в сервисе
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login.store');


//Исправить маршут get('profile/{id}', [ProfileController::class, 'index'])->name('profile')
// Route::get('profile/{id}', [ProfileController::class, 'index'])->name('profile');
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::view('settings', 'settings.index')->name('settings');
Route::view('shop-list', 'shop-list.index')->name('shop-list');


//Страницы связанные с показом карточек рецептов
Route::get('cards/{card}', [CadrController::class, 'index'])->name('cards');
Route::get('cards/{card}/create', [CadrController::class, 'create'])->name('cards.create');
Route::get('cards/{card}/{id}', [CadrController::class, 'show'])->name('cards.show');
Route::post('cards/{card}', [CadrController::class, 'store'])->name('cards.store');
Route::get('cards/{card}/edit', [CadrController::class, 'edit'])->name('cards.edit');
Route::put('cards/{card}/{id}', [CadrController::class, 'update'])->name('cards.update');
Route::delete('cards/{card}/{id}', [CadrController::class, 'delete'])->name('cards.delete');


//Страницы связанные с показом шаблона альбом
Route::get('album/{albumName}', [AlbumController::class, 'index'])->name('album');


//Страницы связанные с показом шаблона список-таблица
Route::get('table/{tableName}', [TableListController::class, 'index'])->name('table-list');
Route::get('table/{tableName}/create', [TableListController::class, 'create'])->name('table-list.create');
Route::get('table/{tableName}/{id}/edit', [TableListController::class, 'edit'])->name('table-list.edit');
Route::put('table/{id}', [TableListController::class, 'update'])->name('table-list.update');
Route::delete('table/{tableName}', [TableListController::class, 'delete'])->name('table-list.delete');


//Страницы связанные с показом шаблона список-ссылки
Route::get('list/{listName}', [LinkListController::class, 'index'])->name('link-list');
