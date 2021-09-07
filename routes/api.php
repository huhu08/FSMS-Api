<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\TemplateController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Route::resource('department',DepartmentController::class);
//Routes for department table
 Route::get('/department',[DepartmentController::class,'index']);
 Route::post('/department',[DepartmentController::class,'store']);
 Route::get('/department/search/{name}', [DepartmentController::class, 'search']);
 Route::put('/department/{id}', [DepartmentController::class, 'update']);
 Route::delete('/department/{id}', [DepartmentController::class, 'destroy']);
 
//Routes for Procedure
Route::get('/procedure',[ProcedureController::class,'index']);
Route::post('/procedure',[ProcedureController::class,'store']);
Route::get('/procedure/search/{name}', [ProcedureController::class, 'search']);
Route::put('/procedure/{id}', [ProcedureController::class, 'update']);
Route::delete('/procedure/{id}', [ProcedureController::class, 'destroy']);

//Routes for Template
Route::get('/template',[TemplateController::class,'index']);
Route::post('/template',[TemplateController::class,'store']);
Route::get('/template/search/{name}', [TemplateController::class, 'search']);
Route::put('/template/{id}', [TemplateController::class, 'update']);
Route::delete('/template/{id}', [TemplateController::class, 'destroy']);
