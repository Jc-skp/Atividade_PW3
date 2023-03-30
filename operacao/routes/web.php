<?php

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
Route::get('/hello/{name}', function ($name) {
    return view('hello', ['name' => $name]);
})->where('name', '^[A-Z][a-z]{2,}$'); // Aceita apenas letras, sendo a primeira maiúscula, e contendo mais de duas letras.
Route::get('/conta/{number1}/{number2}/{operation?}', function ($number1, $number2, $operation = null) {
    return view('conta', ['number1'=>$number1, 'number2'=>$number2, 'operation'=>$operation]);
})->where('number1', '^[1-9][0-9]?$')
    ->where('number2', '^[1-9][0-9]?$'); // Aceita números, que não podem começar com 0, opcional a quantidade de dígitos numéricos.

Route::get('/idade/{year}/{month?}/{day?}', function ($year, $month = null, $day = null) {
    $actualDate = date("d-m-Y");
    return view('idade', ['year'=>$year, 'month'=>$month, 'day'=>$day, 'actualDate'=>$actualDate]);
    {{list($actualDay, $actualMonth, $actualYear) = explode("-", $actualDate);}}
    return view('idade', ['year'=>$year, 'month'=>$month, 'day'=>$day, 'actualYear'=>$actualYear, 'actualMonth'=>$actualMonth, 'actualDay'=>$actualDay]);
})->where('year', '[0-9]{4}')
    ->where('month', '[0-9]{1,2}?')
        ->where('day', '[0-9]{1,2}?');