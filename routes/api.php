<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/pinpoint','DroplocController@index');
Route::post('/pinpoint','DroplocController@store');