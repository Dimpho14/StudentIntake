<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\RezTypeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BuildingController;

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

Route::get('/', [UserController::class, "ShowCorrectHomePage"]);

Route::get('/register-user', [UserController::class, 'ShowRegister']);
Route::post('/register-user', [UserController::class, 'RegisterUser']);
Route::post('/login', [UserController::class, 'logIn']);
Route::post('/logout', [UserController::class, 'logOut']);

Route::get('/create-role', [RolesController::class, 'ShowCreateForm']);
Route::post('/create-role', [RolesController::class, 'CreateNewRole']);

Route::get('/create-city', [cityController::class, 'ShowCities']);
Route::post('/create-city', [cityController::class, 'CreateCity']);

Route::get('/create-gender', [RezTypeController::class, 'ShowGender']);
Route::post('/create-gender', [RezTypeController::class, 'CreateGender']);

Route::get('/create-type', [RezTypeController::class, 'ShowRoomType']);
Route::post('/create-type', [RezTypeController::class, 'CreateRoomType']);

Route::get('/createreztype', [RezTypeController::class, 'ShowRezType']);
Route::post('/createreztype', [RezTypeController::class, 'CreateRezType']);

Route::get('/create-building', [BuildingController::class, 'Showbuildings']);
Route::post('/create-building', [BuildingController::class, 'Createbuilding']);

Route::get('/create-room', [BuildingController::class, 'ShowRooms']);
Route::post('/create-room', [BuildingController::class, 'CreateRooms']);

Route::get('/create-methods', [StudentController::class, 'ShowMethods']);
Route::post('/create-methods', [StudentController::class, 'CreateMethods']);

Route::get('/assign-student', [StudentController::class, 'ShowStudents']);
Route::post('/assign-student', [StudentController::class, 'AssignRoom']);
Route::get('get-room-list', [StudentController::class, 'GetRoomList']);
Route::get('get-gender-room-list', [StudentController::class, 'GetGenderRoomList']);


Route::get('create-doc', [StudentController::class, 'getdoc']);
Route::post('/create-doc', [StudentController::class, 'uploaddoc']);




