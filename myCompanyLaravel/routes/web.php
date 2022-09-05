<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\companyController;
use App\Http\Controllers\employeeController;

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


/*companyController */
Route::group(['prefix'=>'company'],function(){
    route::get('all',[companyController::class,'all'])->name('company.test');
    route::get('create',[companyController::class,'create'])->name('company.create');
    route::get('show/{companyId}',[companyController::class,'show'])->name('company.show');
});

/*employeeController */
Route::group(['prefix'=>'employee'],function(){
    route::get('create',[employeeController::class,'create'])->name('employee.create');
    route::get('show',[employeeController::class,'show'])->name('employee.show');
    route::get('read',[employeeController::class,'read'])->name('employee.read');
    route::get('update',[employeeController::class,'update'])->name('employee.update');
});
