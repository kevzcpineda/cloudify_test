<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ServiceRecordController;
use App\Http\Controllers\DepartmentController;
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
Route::get('/',[EmployeeController::class, 'index']);
Route::get('/create',[EmployeeController::class, 'create']);
Route::post('/',[EmployeeController::class, 'store']);
Route::get('/{employee}/edit',[EmployeeController::class, 'edit']);
Route::put('/{employee}',[EmployeeController::class, 'update']);
Route::delete('/{employee}',[EmployeeController::class, 'destroy']);

Route::get('/service-record',[ServiceRecordController::class, 'index']);
Route::get('/department',[DepartmentController::class, 'index']);

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return Inertia::render('Dashboard');
//     })->name('dashboard');
// });
