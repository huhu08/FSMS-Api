<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\ObjectiveController;
use App\Http\Controllers\MasterAuditController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MachineListController;
use App\Http\Controllers\PackingController;
use App\Http\Controllers\ProductDistributionPlanController;
use App\Http\Controllers\ProductRequestController;
use App\Http\Controllers\SparePartController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\DetailRecordController;
use App\Http\Controllers\MasterRecordController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\CorrectiveActionController;
use App\Http\Controllers\DetailsNonConformityController;
use App\Http\Controllers\ImplementationFollowUpController;
use App\Http\Controllers\MasterNonConformityController;
use App\Http\Controllers\NonConformityStatusController;
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
 Route::get('/department/{id}', [DepartmentController::class, 'show']);
 
//Routes for Procedure
Route::get('/procedure',[ProcedureController::class,'index']);
Route::post('/procedure',[ProcedureController::class,'store']);
Route::get('/procedure/search/{name}', [ProcedureController::class, 'search']);
Route::put('/procedure/{id}', [ProcedureController::class, 'update']);
Route::delete('/procedure/{id}', [ProcedureController::class, 'destroy']);

//Routes for Template
Route::get('/template',[TemplateController::class,'index']);
Route::get('/template/{id}',[TemplateController::class,'show']);
Route::post('/template',[TemplateController::class,'store']);
Route::get('/template/search/{name}', [TemplateController::class, 'search']);
Route::put('/template/{id}', [TemplateController::class, 'update']);
Route::delete('/template/{id}', [TemplateController::class, 'destroy']);

//Route for users
Route::resource('user', UserController::class);

//Route for assigne role
Route::post('user-roles', [UserController::class , 'role']);

//Route for activation
Route::get('activation', [UserController::class , 'activate']);


//Route for deactivation
Route::get('deactivation', [UserController::class , 'deactivate']);


//Route for objectives
Route::resource('objectives', ObjectiveController::class);

//Route for Master Audit
Route::resource('master-audit', MasterAuditController::class);

//Route for UserRole
Route::resource('user-role', UserRoleController::class);

//Route for Area
Route::resource('area', AreaController::class);

//Route for Item
Route::resource('item', ItemController::class);

//Route for Machine List
Route::resource('machine-list', MachineListController::class);

//Route for Packing
Route::resource('packing', PackingController::class);

//Route for product distribution plan
Route::resource('product-distribution-plan', ProductDistributionPlanController::class);

//Route for product request
Route::resource('product-request', ProductRequestController::class);

//Route for spare part
Route::resource('spare-part', SparePartController::class);

//Route for unit
Route::resource('unit', UnitController::class);


//Route for Master Record
Route::resource('master-record', MasterRecordController::class);


//Route for Details Record
Route::resource('details-record', DetailRecordController::class);


//Route for field
Route::resource('field', FieldController::class);

//Route for nonconformity status
Route::resource('nonconformity-status', NonConformityStatusController::class);

//Route for master nonconformity
Route::resource('master-nonconformity', MasterNonConformityController::class);


//Route for ImplementationFollowUpController
Route::resource('implementation', ImplementationFollowUpController::class);

//Route for DetailsNonConformityController
Route::resource('details-nonconformity', DetailsNonConformityController::class);

//Route for CorrectiveActionController
Route::resource('corrective-action', CorrectiveActionController::class);

//Route for product distribution plan
Route::resource('product-distribution', ProductDistributionPlanController::class);

//Route for sign-up
Route::post('sign-up', [SignupController::class , 'register']);

//Route for sign-in
Route::post('sign-in', [SignupController::class , 'login']);
