<?php

use App\Http\Controllers\EmployeController;
use App\Http\Controllers\UserController;
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
    return view('connexion');
});

Route::post('/logIn', [UserController::class, 'logIn']);

Route::get('/accueil', [EmployeController::class, 'index']);

Route::get('/create', [EmployeController::class, 'create']);
Route::post('/storeData', [EmployeController::class, 'storeData']);

Route::get('/edit/{id}', [EmployeController::class, 'edit']);
Route::put('/updateData/{id}', [EmployeController::class, 'updateData']);

Route::get('/details/{id}', [EmployeController::class, 'show']);
Route::get('/employe/{id}/attestation', [EmployeController::class, 'attestation']);
// Route::get('/employe/{id}/attestation', [UserController::class, 'index']);


Route::get('/delete/{id}', [EmployeController::class, 'delete']);


