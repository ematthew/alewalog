<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Auth::routes();
Route::get('/',             'HomeController@index')->name('index');
Route::get('/home',         'HomeController@index')->name('index');
/*
|--------------------------------------------------------------------------
| Office Controller
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'offices'], function () {
    Route::get('/',             'OfficeController@index')->name('offices.index');
    Route::get('/view',         'OfficeController@view')->name('offices_show');
    Route::get('/create',       'OfficeController@create');
    Route::post('/store',      'OfficeController@store');
    Route::get('/edit/{id}',   'OfficeController@edit');
    Route::post('/update/{id}',         'OfficeController@update')->name('offices.update');
    Route::delete('/delete',     'OfficeController@deleteOne')->name('office_delete');
    Route::get('/preview',      'OfficeController@previewAll')->name('office_preview');
    Route::get('/offices/createPDF',  'OfficeController@createPDF')->name('createPDF');
});

Route::get('reminder/',             'OfficeController@paidIndex')->name('reminder.index');
Route::get('complete/',             'OfficeController@completeIndex')->name('complete.index');


Route::group(['prefix' => 'demands'], function () {
    Route::get('/', [DemandController::class, 'index'])->name('demands.index');
});


Route::post('save/print/ids', 'OfficeController@saveTotalPrint');


/*
|--------------------------------------------------------------------------
| User Controller
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'users'], function () {
    Route::get('/',             'UserController@index')->name('users.index');
    Route::get('/create',         'UserController@create');
    Route::post('/store',       'UserController@store');
    Route::get('/edit/{id}',    'UserController@edit');
    Route::get('/roles/{id}',   'UserController@role');
    Route::post('/update/{id}',       'UserController@update');
    Route::post('/assign/{id}',  'UserController@assignRole');
    Route::delete('/delete',     'UserController@deleteOne')->name('user_delete');
});

/*
|--------------------------------------------------------------------------
| User Controller
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'uploads'], function () {
    Route::get('/',             'UploadController@index')->name('uploads.index');
    Route::post('/',             'UploadController@upload')->name('upload_file');
});

/*
|--------------------------------------------------------------------------
| generate qrcode
|--------------------------------------------------------------------------
*/
// Route::get('/generate-qrcode', [QrCodeController::class, 'index']);

Route::group(['prefix' => 'payment'], function () {
    Route::get('/',         'SubscriptionController@index')->name('payment.index');
    Route::post('pay',         'SubscriptionController@store')->name('payment.paid');
    Route::get('show',         'SubscriptionController@show')->name('payment.show');
    // Route::get('edit/{id}',   'SubscriptionController@show')->name('payment.show');
    Route::get('pay/{id}',   'SubscriptionController@getPaymentInfo');
});

Route::get('/successful',      'SubscriptionController@successful')->name('successful');
Route::get('/receipt/{id}',      'SubscriptionController@receipt')->name('receipt');
Route::get('/complete/receipt/{id}',      'OfficeController@completeReceipt');




/*
|--------------------------------------------------------------------------
| Menu Controller
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'menus'], function () {
    Route::get('',              'MenuController@index');
    Route::post('update',       'MenuController@update');
    Route::post('add',          'MenuController@addOne');
    Route::get('/roles/{id}',   'MenuController@role');
    Route::get('create',        'MenuController@create');
    Route::get('fetch',         'MenuController@fetchOne');
    Route::get('all',           'MenuController@fetchAll');
    Route::post('/assign/{id}', 'MenuController@assignRole');
});


/*
|--------------------------------------------------------------------------
| Roles Controller
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'roles'], function () {
    Route::get('',              'RoleController@index');
    Route::post('update/{id}',       'RoleController@update');
    Route::post('add',          'RoleController@addOne');
    Route::get('fetch',         'RoleController@fetchOne');
    Route::get('all',           'RoleController@fetchAll');
    Route::get('create',         'RoleController@create');
    Route::get('edit/{id}',         'RoleController@edit');
    Route::delete('delete/{id}',         'RoleController@destroy');
});


/*
|--------------------------------------------------------------------------
| User Role Controller
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'user-roles'], function () {
    Route::get('',              'UserRoleController@index');
    Route::post('update',       'UserRoleController@update');
    Route::post('add',          'UserRoleController@addOne');
    Route::get('fetch',         'UserRoleController@fetchOne');
    Route::get('all',           'UserRoleController@fetchAll');
});


/*
|--------------------------------------------------------------------------
| Menu Role Controller
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'menu-roles'], function () {
    Route::get('',              'MenuRoleController@index');
    Route::post('update',       'MenuRoleController@update');
    Route::post('add',          'MenuRoleController@addOne');
    Route::get('fetch',         'MenuRoleController@fetchOne');
    Route::get('all',           'MenuRoleController@fetchAll');
});
