<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Models\Employee;

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



Route::get('/employee',[EmployeeController::class,'index']);
Route::post('/employee/store',[EmployeeController::class,'store'])->name('store');
Route::get('/employee/fetch-all',[EmployeeController::class,'fetchAll'])->name('fetchall');
Route::get('/employee/edit',[EmployeeController::class,'edit'])->name('edit');
Route::post('/employee/update',[EmployeeController::class,'update'])->name('update');
Route::get('/employee/delete',[EmployeeController::class,'delete'])->name('employeeDelete');