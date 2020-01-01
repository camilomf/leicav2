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


Auth::routes(['register'=>false , 'reset' => false]);

Route::resource('/home/study_plan/career', 'CareerController',['names'=>['career']])->middleware('auth');
Route::resource('/home/study_plan/plan', 'StudyPlanController',['names'=>['plan']])->middleware('auth');
Route::resource('/home/software_type', 'SoftwareTypeController',['names'=>['software_type']])->middleware('auth');
Route::resource('/home/software', 'SoftwareController',['names'=>['software']])->middleware('auth');
Route::resource('/home/category', 'CategoryController',['names'=>['category']])->middleware('auth');
Route::resource('/home/trademark', 'TrademarkController',['names'=>['trademark']])->middleware('auth');
Route::resource('/home/model', 'ModeloController',['names'=>['model']])->middleware('auth');

Route::resource('/home/maintenance_type', 'MaintenanceTypeController',['names'=>['maintenance_type']])->middleware('auth','roles');


Route::get('/home/lendings/liable/create/{id}',
    ['as' => 'liable.create', 'uses' => 'LiableController@create'])->middleware('auth');
Route::post('liable.store{id}','LiableController@store')->name('liable.store')->middleware('auth');


Route::resource('/home/maintenance/maintenance_plan', 'MaintenancePlanController',['names'=>['maintenance_plan']])->middleware('auth','roles');
Route::resource('/home/maintenance/plan/frequency', 'FrequencyController',['names'=>['frequency']])->middleware('auth','roles');
Route::resource('/home/maintenance/plan/priority', 'PriorityController',['names'=>['priority']])->middleware('auth','roles');

//Actualizar software por plan de estudio
Route::resource('/home/software/plan/study_plan', 'PlanStudyBySoftwareController', [
    'names' => [
        'edit' => 'planbysoftware.edit',
        'update' => 'planbysoftware.update',
    ]
])->middleware('auth','roles:Admin,User');

Route::resource('/home/software/place', 'SoftwareByPlaceController',[
    'names' => [
        'edit' => 'softwarebyplace.edit',
        'update' => 'softwarebyplace.update',
    ]
])->middleware('auth','roles:Admin,User');

//Route::get('/home/software/place/{id}/edit','SoftwareByPlaceController@edit')->name('softwarebyplace.edit')->middleware('auth','roles:Admin,User');
//Route::put('/software/place','SoftwareByPlaceController@update')->name('softwarebyplace.update')->middleware('auth','auth','roles:Admin,User');


Route::get('/home/lendings/lending_register/create/{id}',
    ['as' => 'lending_register.create', 'uses' => 'LendingRegisterController@create'])->middleware('auth','roles:User,Admin');
Route::get('/home/lendings/lending_register', 'LendingRegisterController@index')->name('lending_register.index')->middleware('auth');
Route::put('lending_register.store{id}','LendingRegisterController@store')->name('lending_register.store')->middleware('auth','roles:User,Admin');
Route::put('lending_register.remove{id}','LendingRegisterController@remove')->name('lending_register.remove')->middleware('auth','roles:User,Admin');


Route::get('/home/maintenance/maintenance_register', 'MaintenanceRegisterController@index')->name('maintenance_register.index')->middleware('auth');
Route::get('/home/maintenance/maintenance_register/register/{id}',
    ['as' => 'maintenance_register.register', 'uses' => 'MaintenanceRegisterController@register'])->middleware('auth','roles:User,Admin');
Route::post('/home/maintenance/maintenance_register/remove/{id}',
    ['as' => 'maintenance_register.remove', 'uses' => 'MaintenanceRegisterController@remove'])->middleware('auth','roles:User,Admin');
Route::put('maintenance_register.store{id}','MaintenanceRegisterController@store')->name('maintenance_register.store')->middleware('auth','roles:User,Admin');


Route::resource('/home/users', 'UsersController',['names'=>['users']])->middleware('auth');
Route::get('/home/users/edit_password/{id}',
    ['as' => 'users.editPassword', 'uses' => 'UsersController@editPassword'])->middleware('auth','roles:User,Admin');
Route::put('users.update_password{id}','UsersController@updatePassword')->name('users.updatePassword')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');


Route::get('/home/maintenance_register', function () {
})->name('maintenance_register')->middleware('auth');

Route::get('/home/software_by_study_plan',function(){
    // $careers = App\Career::where('id','!=',1)->get();
    $careers = App\Career::get();
    $places = App\Place::where('id','!=',1)->get();
    return view('inventory.study_plan',compact('careers','places'));
})->name('softwarebystudy_plan')->middleware('auth');


Route::get('/home/lendings', function(){
    $inventories = App\Inventory::all();
    return view('lendings',compact('inventories'));
})->name('lendings')->middleware('auth');

Route::get('home/maintenance', function () {
    $inventories = App\Inventory::all();
    return view('maintenance',compact('inventories'));
})->name('maintenance')->middleware('auth');


//Route::resource('/home/inventory', 'InventoryController',['names'=>['inventory']])->middleware('auth');
Route::get('/home/inventory','InventoryController@index')->name('inventory.index')->middleware('auth');
Route::get('/home/inventory/create','InventoryController@create')->name('inventory.create')->middleware('auth','roles:Admin,User');
Route::get('/home/inventory/{id}/edit','InventoryController@edit')->name('inventory.edit')->middleware('auth','auth','roles:Admin,User');
Route::get('/home/inventory/{id}','InventoryController@show')->name('inventory.show')->middleware('auth');
Route::delete('/home/inventory/{id}','InventoryController@destroy')->name('inventory.destroy')->middleware('auth','auth','roles:Admin,User');
Route::post('/home/inventory','InventoryController@store')->name('inventory.store')->middleware('auth','auth','roles:Admin,User');
Route::put('/home/inventory/{id}','InventoryController@update')->name('inventory.update')->middleware('auth','auth','roles:Admin,User');
//Route::resource('/home/items', 'ItemController',['names'=>['items']])->middleware('auth');
Route::get('/home/items','ItemController@index')->name('items.index')->middleware('auth');
Route::get('/home/items/create','ItemController@create')->name('items.create')->middleware('auth','roles:Admin,User');
Route::get('/home/items/{id}/edit','ItemController@edit')->name('items.edit')->middleware('auth','auth','roles:Admin,User');
Route::get('/home/items/{id}','ItemController@show')->name('items.show')->middleware('auth');
Route::delete('/home/items/{id}','ItemController@destroy')->name('items.destroy')->middleware('auth','auth','roles:Admin,User');
Route::post('/home/items','ItemController@store')->name('items.store')->middleware('auth','auth','roles:Admin,User');
Route::put('/home/items/{id}','ItemController@update')->name('items.update')->middleware('auth','auth','roles:Admin,User');
// Route::resource('/home/places', 'PlaceController',['names'=>['places']])->middleware('auth');
Route::get('/home/places','PlaceController@index')->name('places.index')->middleware('auth');
Route::get('/home/places/create','PlaceController@create')->name('places.create')->middleware('auth','roles:Admin,User');
Route::get('/home/places/{id}/edit','PlaceController@edit')->name('places.edit')->middleware('auth','auth','roles:Admin,User');
Route::get('/home/places/{id}','PlaceController@show')->name('places.show')->middleware('auth');
Route::delete('/home/places/{id}','PlaceController@destroy')->name('places.destroy')->middleware('auth','auth','roles:Admin,User');
Route::post('/home/places','PlaceController@store')->name('places.store')->middleware('auth','auth','roles:Admin,User');
Route::put('/home/places/{id}','PlaceController@update')->name('places.update')->middleware('auth','auth','roles:Admin,User');


