<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculatorController;

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
    return redirect(route('calculadora.index'));
});

Route::get('calculadora-de-lucro/receitas', [CalculatorController::class, 'index'])->name('calculadora.index');
Route::get('calculadora-de-lucro/calculadora/{receita}', [CalculatorController::class, 'calculator'])->name('calculadora.calculator');
Route::get('calculadora-de-lucro/resultado', [CalculatorController::class, 'result'])->name('calculadora.result');

Route::get('calculadora-de-lucro/{receita}', [CalculatorController::class, 'calculate'])->name('calculadora.calculate');