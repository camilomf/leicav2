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
Route::resource('/home/places', 'PlaceController',['names'=>['places']])->middleware('auth');
Route::resource('/home/category', 'CategoryController',['names'=>['category']])->middleware('auth');
Route::resource('/home/trademark', 'TrademarkController',['names'=>['trademark']])->middleware('auth');
Route::resource('/home/model', 'ModeloController',['names'=>['model']])->middleware('auth');
Route::resource('/home/inventory', 'InventoryController',['names'=>['inventory']])->middleware('auth');
Route::resource('/home/maintenance_type', 'MaintenanceTypeController',['names'=>['maintenance_type']])->middleware('auth');
Route::resource('/home/items', 'ItemController',['names'=>['items']])->middleware('auth');
// Route::resource('/home/lendings/liable', 'LiableController',['names'=>['liable']])->middleware('auth');
Route::get('/home/lendings/liable/create/{id}', 
    ['as' => 'liable.create', 'uses' => 'LiableController@create'])->middleware('auth');
Route::post('liable.store{id}','LiableController@store')->name('liable.store')->middleware('auth');
//Liable






Route::resource('/home/maintenance/maintenance_plan', 'MaintenancePlanController',['names'=>['maintenance_plan']])->middleware('auth','roles');
Route::resource('/home/maintenance/plan/frequency', 'FrequencyController',['names'=>['frequency']])->middleware('auth','roles');
Route::resource('/home/maintenance/plan/priority', 'PriorityController',['names'=>['priority']])->middleware('auth','roles');


Route::resource('/home/software/plan/study_plan', 'PlanStudyBySoftwareController', [
    'names' => [
        'edit' => 'planbysoftware.edit',
        'update' => 'planbysoftware.update',
    ]   
]);
Route::resource('/home/place/software', 'SoftwareByPlaceController', [
    'names' => [
        'edit' => 'softwarebyplace.edit',
        'update' => 'softwarebyplace.update',
    ]   
]);


Route::get('/home/lendings/lending_register/create/{id}', 
    ['as' => 'lending_register.create', 'uses' => 'LendingRegisterController@create'])->middleware('auth');
Route::get('/home/lendings/lending_register', 'LendingRegisterController@index')->name('lending_register.index')->middleware('auth');
Route::put('lending_register.store{id}','LendingRegisterController@store')->name('lending_register.store')->middleware('auth');
Route::put('lending_register.remove{id}','LendingRegisterController@remove')->name('lending_register.remove')->middleware('auth');





Route::get('/home/maintenance/maintenance_register', 'MaintenanceRegisterController@index')->name('maintenance_register.index')->middleware('auth','roles:User,Admin');
// Route::get('attendance/{id}', ['as' => 'user.attendance', 'uses' => 'UserController@attendance']);
Route::get('/home/maintenance/maintenance_register/register/{id}', 
    ['as' => 'maintenance_register.register', 'uses' => 'MaintenanceRegisterController@register'])->middleware('auth','roles:User,Admin');
Route::post('/home/maintenance/maintenance_register/remove/{id}', 
    ['as' => 'maintenance_register.remove', 'uses' => 'MaintenanceRegisterController@remove'])->middleware('auth','roles:User,Admin');
// Route::resource('//home/maintenance/maintenance_register', 'MaintenanceRegisterController')->name('maintenance_register.store')->middleware('auth','roles:User,Admin');;
Route::put('maintenance_register.store{id}','MaintenanceRegisterController@store')->name('maintenance_register.store')->middleware('auth','roles:User,Admin');


Route::resource('/home/users', 'UsersController',['names'=>['users']])->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');
// Route::view('/home/lendings', 'lendings')->name('lendings')->middleware('auth');
// Route::view('/home/maintenance_regiser', 'maintenance_regiser')->name('maintenance_regiser')->middleware('auth');

Route::get('/home/maintenance_register', function () {
    // $inventories = App\Inventory::where('state_id',5)->orWhere('state_id','3')->get();
})->name('maintenance_register')->middleware('auth','roles:User,Admin');



Route::get('/home/lendings', function(){
    $inventories = App\Inventory::all();
    return view('lendings',compact('inventories'));
})->name('lendings')->middleware('auth');

Route::get('home/maintenance', function () {
    $inventories = App\Inventory::all();
    return view('maintenance',compact('inventories'));
})->name('maintenance')->middleware('auth','roles:User,Admin');

// Route::view('/home/inventory', 'inventory')->name('inventory')->middleware('auth');
//Route::view('/home/study_plan', 'study_plan')->name('study_plan_manage')->middleware('auth');
//Route::view('/home/users_manage', 'users_manage')->name('users_manage')->middleware('auth');


