<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/
Auth::routes();
Route::get('/', 			'HomeController@index')->name('index');
Route::get('/home', 		'HomeController@index')->name('index');

/*
|--------------------------------------------------------------------------
| Office Controller
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'offices'], function() {
    Route::get('/', 			'OfficeController@index')->name('offices');
    Route::get('/view',         'OfficeController@view')->name('offices_show');
    Route::post('/create', 		'OfficeController@addOne')->name('office_add');
    Route::put('/update', 		'OfficeController@updateOne')->name('office_update');
    Route::delete('/delete', 	'OfficeController@deleteOne')->name('office_delete');
    Route::get('/offices/createPDF',  'OfficeController@createPDF')->name('createPDF');
    Route::get('/preview',      'OfficeController@previewAll')->name('office_preview');
    Route::get('/search', 'OfficeController@search')->name('search');
});

/*
|--------------------------------------------------------------------------
| User Controller
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'users'], function() {
    Route::get('/', 			'UserController@index')->name('users');
    Route::post('/create', 		'UserController@addOne')->name('user_add');
    Route::put('/update', 		'UserController@updateOne')->name('user_update');
    Route::delete('/delete', 	'UserController@deleteOne')->name('user_delete');
});


/*
|--------------------------------------------------------------------------
| User Controller
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'uploads'], function() {
    Route::get('/', 			'UploadController@index')->name('upload');
    Route::post('/', 		    'UploadController@upload')->name('upload_file');
});

/*
|--------------------------------------------------------------------------
| generate qrcode
|--------------------------------------------------------------------------
*/
Route::get('/generate-qrcode', [QrCodeController::class, 'index']);
