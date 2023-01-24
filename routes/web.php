<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MaterielController;
use App\Http\Controllers\DashboardController;

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

Route::get('/user', [ClientController::class, 'index']);
Route::get('/materiel/create', [MaterielController::class, 'create']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/TotauxByClient', [DashboardController::class, 'totauxByClient']);
Route::get('/dashboard/createMaterielClient', [DashboardController::class, 'createMaterielOnClient']);
Route::get('/dashboard/exercice', [DashboardController::class, 'exercice']);

Route::post('/materiel/insert', [MaterielController::class, 'insert']);
Route::post('/dashboard/assignMaterielOnClient', [DashboardController::class, 'assignMaterielOnClient']);