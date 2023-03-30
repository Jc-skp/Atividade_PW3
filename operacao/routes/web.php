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
Route::get('/diga seu nome/{name}', function ($name) {
     view('Olá', ['name' => $name]);
})->where('name', '[a-z]{2,}$'); 
Route::get('/operacao/{number1}/{number2}/{operation?}', function ($number1, $number2, $operation = 'todas') {
    switch($operation){
        case $operation == 'todas';
            echo 
                '<p>Soma = '. $number1 + $number2 . 
                '<br>Subtração = '. $number1 - $number2 . 
                '<br>Multiplicação = '. $number1 * $number2 . 
                '<br>Divisão = '. $number1 / $number2;
            break;
        case $operation == 'Soma';
            echo '<p>Soma = '. $number1 + $number2 . '<p>';
            break;
        case $operation == 'Subtração';
            echo '<p>Subtração = '. $number1 - $number2 . '<p>';
            break;
        case $operation == 'Multiplicação';
            echo '<p> Multiplicação = '. $number1 * $number2 . '<p>';
            break;
        case $operation == 'Divisão';
            echo '<p>Divisão = '. $number1 / $number2 . '<p>';
            break;
    }
    return view('operacao', ['number1'=>$number1, 'number2'=>$number2, 'operation'=>$operation]);
})->where('number1', '^[1-9][0-9]?$')
    ->where('number2', '^[1-9][0-9]?$');

