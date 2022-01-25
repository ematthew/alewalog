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
    Route::get('/create',       'OfficeController@create');
    Route::post('/store',      'OfficeController@store');
    Route::get('/edit/{id}',   'OfficeController@edit');
    Route::post('/update/{id}',  'OfficeController@update')->name('update');
    Route::delete('/delete', 	'OfficeController@deleteOne')->name('office_delete');
    Route::get('/preview',      'OfficeController@previewAll')->name('office_preview');
    Route::get('/offices/createPDF',  'OfficeController@createPDF')->name('createPDF');
});



/*
|--------------------------------------------------------------------------
| User Controller
|--------------------------------------------------------------------------
*/
// Route::group(['prefix' => 'users'], function() {
//     Route::get('/', 			'UserController@index')->name('users');
//     Route::post('/create', 		'UserController@create');
//     Route::get('/edit/{id}',    'UserController@edit');
//     Route::put('/update', 		'UserController@update');
//     Route::delete('/delete', 	'UserController@deleteOne')->name('user_delete');
// });

Route::resource('users', UserController::class);


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
