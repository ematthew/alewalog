<?php

use App\Http\Controllers\LokogomaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandController;
use App\Http\Controllers\GuduController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\JabiController;
use App\Http\Controllers\LifeCampController;
use App\Http\Controllers\NasarawaController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UtakoController;
use App\Http\Controllers\WuyeController;

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
Route::get('reminder/view',         'OfficeController@showReminder')->name('reminder_show');
Route::get('complete/',             'OfficeController@completeIndex')->name('complete.index');
Route::get('consolidated/',             'OfficeController@consolidatedIndex')->name('consolidated.index');
Route::get('reminder/preview',      'OfficeController@previewReminderAll')->name('reminder_preview');

Route::get('appo/reminder/',             'OfficeController@appoPaidIndex')->name('appo_reminder.index');
Route::get('appo/reminder/view',         'OfficeController@appoShowReminder')->name('appo_reminder_show');
Route::get('appo/complete/',             'OfficeController@completeIndex')->name('appo_complete.index');
Route::get('appo/consolidated/',             'OfficeController@consolidatedIndex')->name('appo_consolidated.index');
Route::get('appo/reminder/preview',      'OfficeController@appoPreviewReminderAll')->name('appo_reminder_preview');


Route::get('nyanya/reminder/',             'OfficeController@nyanyaPaidIndex')->name('nyanya_reminder.index');
Route::get('nyanya/reminder/view',         'OfficeController@nyanyaShowReminder')->name('nyanya_reminder_show');
Route::get('nyanya/complete/',             'OfficeController@completeIndex')->name('nyanya_complete.index');
Route::get('nyanya/consolidated/',             'OfficeController@consolidatedIndex')->name('nyanya_consolidated.index');
Route::get('nyanya/reminder/preview',      'OfficeController@nyanyaPreviewAll')->name('nyanya_reminder_preview');

Route::group(['prefix' => 'appo/demands'], function () {
    Route::get('/', [DemandController::class, 'appoIndex'])->name('demands.index');
    Route::get('/view', [DemandController::class, 'appoView'])->name('appo_show');
    Route::get('/preview',    [DemandController::class, 'appoPreviewAll'])->name('office_preview');
});

Route::group(['prefix' => 'nyanya/demands'], function () {
    Route::get('/', [DemandController::class, 'nyanyaIndex'])->name('demands.index');
    Route::get('/view', [DemandController::class, 'nyanyaView'])->name('appo_show');
    Route::get('/preview',    [DemandController::class, 'nyanyaPreviewAll'])->name('office_preview');
});

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
    Route::post('/nasarawa', [UploadController::class, 'nasarawaUpload']);
    Route::get('/nasarawa', [UploadController::class, 'nasarawaIndex'])->name('nasarawa_file_upload.index');

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


/*
|--------------------------------------------------------------------------
| Gwarinpa Controller 
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'gwarinpa'], function () {
    Route::get('/', [OfficeController::class, 'gwarinpaIndex'])->name('gwarinpa.index');
    Route::get('/preview', [OfficeController::class, 'gwarinpaPreviewAll'])->name('gwarinpa.previewAll');
});

/*
|--------------------------------------------------------------------------
| Wuye Controller 
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'wuye'], function () {
    Route::get('/', [WuyeController::class, 'index'])->name('wuye.index');
    Route::get('/preview', [WuyeController::class, 'previewAll'])->name('wuye.previewAll');
});

/*
|--------------------------------------------------------------------------
| Life Camp Controller 
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'life-camp'], function () {
    Route::get('/', [LifeCampController::class, 'index'])->name('life-camp.index');
    Route::get('/preview', [LifeCampController::class, 'previewAll'])->name('life-camp.previewAll');
});

/*
|--------------------------------------------------------------------------
| Jabi Controller 
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'jabi'], function () {
    Route::get('/', [JabiController::class, 'index'])->name('jabi.index');
    Route::get('/preview', [JabiController::class, 'previewAll'])->name('jabi.previewAll');
});
/*
|--------------------------------------------------------------------------
| Utako Controller 
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'utako'], function () {
    Route::get('/', [UtakoController::class, 'index'])->name('utako.index');
    Route::get('/preview', [UtakoController::class, 'previewAll'])->name('utako.previewAll');
});
/*
|--------------------------------------------------------------------------
| Hotel Controller
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'hotel'], function () {
    Route::get('/', [HotelController::class, 'index'])->name('hotel.index');
    Route::get('/preview', [HotelController::class, 'previewAll'])->name('hotel.previewAll');
});


/*
|--------------------------------------------------------------------------
| Nasarawa Controller
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'nasarawa'], function () {
    Route::get('/',             [NasarawaController::class, 'index'])->name('nasarawa.index');
    Route::get('/view',         [NasarawaController::class, 'view'])->name('nasarawa_show');
    Route::get('/create',       [NasarawaController::class, 'create']);
    Route::post('/store',      [NasarawaController::class, 'store']);
    Route::get('/edit/{id}',   [NasarawaController::class, 'edit']);
    Route::post('/update/{id}',         [NasarawaController::class, 'update'])->name('nasarawa.update');
    // Route::delete('/delete',     'OfficeController@deleteOne')->name('office_delete');
    Route::get('/preview',      [NasarawaController::class, 'previewAll'])->name('nasarawa_preview');
    // Route::get('/offices/createPDF',  'OfficeController@createPDF')->name('createPDF');
});


/*
|--------------------------------------------------------------------------
| Lokogoma Controller 
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'lokogoma'], function () {
    Route::get('/', [LokogomaController::class, 'index'])->name('lokogoma.index');
    Route::get('/preview', [LokogomaController::class, 'previewAll'])->name('lokogoma.previewAll');
});

/*
|--------------------------------------------------------------------------
| GUDU Controller 
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'gudu'], function () {
    Route::get('/', [GuduController::class, 'index'])->name('gudu.index');
    Route::get('/preview', [GuduController::class, 'previewAll'])->name('gudu.previewAll');
});