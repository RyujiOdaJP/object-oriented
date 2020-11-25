<?php

use DSL\Collection;
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

Route::get('/hello/{id}', 'HelloController@index');

Route::get('/purchase', 'Purchase\PurchaseController@index');

Route::get('/dice', 'Dice\DiceController@rollDouble');

Route::get('/lessons/{lesson}', 'LessonController@show')->name('lesson.show');

//Route::get('/calc', function (){
//
//    echo (new Collection(range(0, 100)))
//        ->filter(function($v){ return $v % 2 === 0; })
//        ->map(function($v){ return $v ** 2; })
//        ->filter(function($v){ return $v > 20; })
//        ->sum()
//    ;
//});
