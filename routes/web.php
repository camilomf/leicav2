<?php

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

//use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes(['register'=>false]);

Route::resource('/home/study_plan/career', 'CareerController',['names'=>['career']])->middleware('auth');
Route::resource('/home/study_plan/plan', 'StudyPlanController',['names'=>['plan']])->middleware('auth');
Route::resource('/home/software_type', 'SoftwareTypeController',['names'=>['software_type']])->middleware('auth');
Route::resource('/home/software', 'SoftwareController',['names'=>['software']])->middleware('auth');

//Route::resource('/home/software/plan/study_plan', 'PlanStudyBySoftwareController',['names'=>['planbysoftware']])->middleware('auth');
Route::resource('/home/software/plan/study_plan', 'PlanStudyBySoftwareController', [
    'names' => [
        'edit' => 'planbysoftware.edit',
        'update' => 'planbysoftware.update',
    ]
]);


Route::resource('/home/users', 'UsersController',['names'=>['users']])->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');
Route::view('/home/lendings', 'lendings')->name('lendings')->middleware('auth');

Route::resource('/home/maintenance', 'MaintenanceViewController',['name'=>['maintenance']])->middleware('auth','roles');

//Route::view('/home/maintenance', 'maintenance')->name('maintenance')->middleware('auth','roles');

Route::view('/home/inventory', 'inventory')->name('inventory')->middleware('auth');
//Route::view('/home/study_plan', 'study_plan')->name('study_plan_manage')->middleware('auth');
//Route::view('/home/users_manage', 'users_manage')->name('users_manage')->middleware('auth');

