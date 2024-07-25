<?php

use Illuminate\Support\Facades\Route;


// 必ずview('welcome')を返すようにする
Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
