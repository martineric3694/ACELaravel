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

Route::get('/', function () {
    return view('welcome');
});

Route::get('index',function(){
	return "<h1>Hello World</h1>";
});
Route::get('/lingkaran/{param1}/{param}',function($param,$param2){
	define("PI",3.14);
	$luas = PI*$param*$param2;
	return "Luas = ".$luas;
});
Route::get('/kotak/{panjang?}/{lebar}',function($panjang=0, $lebar){
	if($panjang==0){
		$luas = $lebar * $lebar;
	}else{
		$luas = $lebar * $panjang;
	}
	return $luas;
});
Route::get('/blade',function(){
	return view('blade.coba');
});

//Routes Controller
Route::get('/luas/{panjang}/{lebar}','ACEController@luas');
Route::get('/bladeController','ACEController@blade');
Route::get('/bladeValue','ACEController@bladeValue');

Route::get('/post','ACEController@postForm');
Route::post('/post','ACEController@postSubmit');

Route::get('/database','QueryBuilderController@tampilkanData');
Route::get('/DBDept/{id}','QueryBuilderController@tampilkanDept');

Route::get('/postEmployee','QueryBuilderController@formInsert');
Route::post('/postEmployee','QueryBuilderController@insertEmployee');

Route::get('/edit/{id}','QueryBuilderController@edit');
Route::post('/edit','QueryBuilderController@update');
Route::post('/add','QueryBuilderController@add');

Route::group(['prefix'=>'eloquent'],function(){
	Route::get('/','EloquentController@tampilkanData')->middleware('cors');
	Route::get('eloquent/{id}','EloquentController@tampilkanDept');
	Route::get('/eloquentEdit/{id}','EloquentController@edit');
	Route::post('eloquentEdit','EloquentController@update');
	Route::get('/eloquentInsert','EloquentController@formInsert');
	Route::post('/eloquentInsert','EloquentController@insertEmployee');
	Route::resource('department','DepartmentController');
});

Route::resource('department','DepartmentController'); //Index menggunakan AJAX
Route::post('post','EloquentController@post'); //POST AJAX

Route::get('age',function(){
	return view('age');
});

Route::post('age',function(Request $req){
	return redirect('eloquent');
})->middleware('age');








Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
