<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PhotoController;
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






Route::group(['prefix'=>'item'],function(){

    Route::middleware(['auth:sanctum', 'verified'])->
    get('/',[ItemController::class,'index'])->name('item.index');//suziureti sita su health

    Route::middleware(['auth:sanctum', 'verified'])->
    get('/create',[ItemController::class,'create'])->name('item.create');//

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/store',[ItemController::class,'store'])->name('item.store');//

    Route::middleware(['auth:sanctum', 'verified'])->
    get('/edit/{User}',[ItemController::class,'edit'])->name('item.edit');//kursime veliau

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/update/{User}',[ItemController::class,'update'])->name('item.update');//kursime veliau

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/destroy/{User}',[ItemController::class,'destroy'])->name('item.destroy');//kursime veliau
});







Route::group(['prefix'=>'photo'],function(){
    Route::get('/',[PhotoController::class,'index'])->name('photo.index');
    Route::get('/create',[PhotoController::class,'create'])->name('photo.create');
    Route::get('/edit/{User}',[PhotoController::class,'edit'])->name('photo.edit');
    Route::post('/store',[PhotoController::class,'store'])->name('photo.store');
    Route::post('/update/{User}',[PhotoController::class,'update'])->name('photo.update');
    Route::get('/deletePhoto/{Photo}',[PhotoController::class,'deletePhoto'])->name('photo.deletePhoto');

});






Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
