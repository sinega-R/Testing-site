<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/frames', function () {
    return view('frame');
})->name('frames');
Route::get('/window',function(){
    return view('window');
})->name('window');
Route::get('/drag', function(){
    return view('drag');
})->name('drag');

Route::get('/alert', function(){
    return view('alert');
})->name('alert');
Route::get('/table', function(){
    return view('table');

})->name('table');
Route::get('/button',function(){
    return view('button');
})->name('button');
Route::get('\hyperlink',function(){
    return view('hyperlink');
})->name('hyperlink');
Route::get('\checkbox',function(){
    return view('checkbox');
})->name('checkbox');
Route::get('\wait',function(){
    return view('wait');
})->name('wait');
Route::get('dropdown',function(){
  return view('dropdown');
})->name('dropdown');
Route::get('\radio',function(){
    return view('radio');
})->name('radio');
Route::get('textbox',function(){
    return view('textbox');
})->name('textbox');
Route::get('grid',function(){
    return view('grid');
})->name('grid');

