<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\datacon;
use App\Http\Controllers\Content;
use App\Http\Controllers\Profilecon;
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



Route::post('/save', [datacon::class, 'Signup']);
Route::post('/login', [datacon::class, 'Login']);
Route::get('/Delete/{id}', [Profilecon::class,'DeleteContent']);
Route::post('/updatecontent/{id}',[Profilecon::class,'UpdateContent']);
Route::post('/updateprofile/{id}',[Profilecon::class,'UpdateUser']);
Route::get('/Userprofile/{username}',[Profilecon::class,'Userview']);
Route::get('/',[datacon::class,'Guest']);
Route::get('/removesession',[Content::class,'Removesession']);
Route::get('/{id}',[datacon::class,'View']);

Route::get('/users/{id}', [datacon::class, 'profile'])->name('user.index');
Route::post('/newcontent', [Content::class, 'savecontent']);



