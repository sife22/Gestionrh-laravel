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

Route::get('/', [EmployeController::class, 'connexion'])->middleware('alreadylogged');;

Route::post('/logIn', [UserController::class, 'logIn']);
Route::get('/logOut', [UserController::class, 'logOut']);

Route::get('/accueil', [EmployeController::class, 'index'])->middleware('havetolog');

Route::get('/create', [EmployeController::class, 'create'])->middleware('havetolog');
Route::post('/storeData', [EmployeController::class, 'storeData'])->middleware('havetolog');

Route::post('/findOne', [EmployeController::class, 'findOne'])->middleware('havetolog');
Route::get('/edit/{id}', [EmployeController::class, 'edit'])->middleware('havetolog');
Route::put('/updateData/{id}', [EmployeController::class, 'updateData'])->middleware('havetolog');

Route::get('/conge/{id}', [EmployeController::class, 'conge'])->middleware('havetolog');
Route::post('/setConge/{id}', [EmployeController::class, 'setConge'])->middleware('havetolog');

Route::get('/details/{id}', [EmployeController::class, 'show'])->middleware('havetolog');
Route::get('/employe/{id}/attestation', [EmployeController::class, 'attestation'])->middleware('havetolog');
// Route::get('/employe/{id}/attestation', [UserController::class, 'index']);


Route::get('/delete/{id}', [EmployeController::class, 'delete'])->middleware('havetolog');


