<?php

use App\Http\Controllers\ApoNewController;
use App\Http\Controllers\AppoNewController;
use App\Http\Controllers\LokogomaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandController;
use App\Http\Controllers\GuduController;
use App\Http\Controllers\GwarinpaController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\JabiController;
use App\Http\Controllers\JahiController;
use App\Http\Controllers\KarshiController;
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
    Route::get('/', [GwarinpaController::class, 'index'])->name('gwarinpa.index');
    Route::get('/preview', [GwarinpaController::class, 'previewAll'])->name('gwarinpa.previewAll');
    Route::get('/create', [GwarinpaController::class, 'create']);
    Route::get('/view', [GwarinpaController::class, 'view'])->name('gwarinpa.view');
    Route::post('/store',      [GwarinpaController::class, 'store']);
    Route::get('/edit/{id}', [GwarinpaController::class, 'edit']);
    Route::post('/update/{id}',        [GwarinpaController::class, 'update'])->name('gwarinpa.update');
});

/*
|--------------------------------------------------------------------------
| Wuye Controller 
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'wuye'], function () {
    Route::get('/', [WuyeController::class, 'index'])->name('wuye.index');
    Route::get('/preview', [WuyeController::class, 'previewAll'])->name('wuye.previewAll');
    Route::get('/create', [WuyeController::class, 'create']);
    Route::get('/view', [WuyeController::class, 'view'])->name('wuye.view');
    Route::post('/store',      [WuyeController::class, 'store']);
    Route::get('/edit/{id}', [WuyeController::class, 'edit']);
    Route::post('/update/{id}',        [WuyeController::class, 'update'])->name('wuye.update');
});

/*
|--------------------------------------------------------------------------
| Life Camp Controller 
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'life-camp'], function () {
    Route::get('/', [LifeCampController::class, 'index'])->name('life-camp.index');
    Route::get('/preview', [LifeCampController::class, 'previewAll'])->name('life-camp.previewAll');
    Route::get('/create', [LifeCampController::class, 'create']);
    Route::get('/view', [LifeCampController::class, 'view'])->name('life-camp.view');
    Route::post('/store',      [LifeCampController::class, 'store']);
    Route::get('/edit/{id}', [LifeCampController::class, 'edit']);
    Route::post('/update/{id}',        [LifeCampController::class, 'update'])->name('life-camp.update');
    
});

/*
|--------------------------------------------------------------------------
| Jabi Controller 
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'jabi'], function () {
    Route::get('/', [JabiController::class, 'index'])->name('jabi.index');
    Route::get('/create', [JabiController::class, 'create']);
    Route::get('/preview', [JabiController::class, 'previewAll'])->name('jabi.previewAll');
    Route::get('/view', [JabiController::class, 'view'])->name('jabi.view');
    Route::post('/store',      [JabiController::class, 'store']);
    Route::get('/edit/{id}', [JabiController::class, 'edit']);
    Route::post('/update/{id}',        [JabiController::class, 'update'])->name('jabi.update');
});
/*
|--------------------------------------------------------------------------
| Utako Controller 
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'utako'], function () {
    Route::get('/', [UtakoController::class, 'index'])->name('utako.index');
    Route::get('/preview', [UtakoController::class, 'previewAll'])->name('utako.previewAll');
    Route::get('/create', [UtakoController::class, 'create']);
    Route::get('/view', [UtakoController::class, 'view'])->name('utako.view');
    Route::post('/store',      [UtakoController::class, 'store']);
    Route::get('/edit/{id}', [UtakoController::class, 'edit']);
    Route::post('/update/{id}',        [UtakoController::class, 'update'])->name('utako.update');
});
/*
|--------------------------------------------------------------------------
| Hotel Controller
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'hotel'], function () {
    Route::get('/', [HotelController::class, 'index'])->name('hotel.index');
    Route::get('/preview', [HotelController::class, 'previewAll'])->name('hotel.previewAll');
    Route::get('/create', [HotelController::class, 'create']);
    Route::get('/view', [HotelController::class, 'view'])->name('hotel.view');
    Route::post('/store',      [HotelController::class, 'store']);
    Route::get('/edit/{id}', [HotelController::class, 'edit']);
    Route::post('/update/{id}',        [HotelController::class, 'update'])->name('hotel.update');
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
    Route::get('/create', [LokogomaController::class, 'create']);
    Route::get('/view', [LokogomaController::class, 'view'])->name('lokogoma.view');
    Route::post('/store',      [LokogomaController::class, 'store']);
    Route::get('/edit/{id}', [LokogomaController::class, 'edit']);
    Route::post('/update/{id}',        [LokogomaController::class, 'update'])->name('lokogoma.update');
});

/*
|--------------------------------------------------------------------------
| GUDU Controller 
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'gudu'], function () {
    Route::get('/', [GuduController::class, 'index'])->name('gudu.index');
    Route::get('/preview', [GuduController::class, 'previewAll'])->name('gudu.previewAll');
    Route::get('/create', [GuduController::class, 'create']);
    Route::get('/view', [GuduController::class, 'view'])->name('gudu.view');
    Route::post('/store',      [GuduController::class, 'store']);
    Route::get('/edit/{id}', [GuduController::class, 'edit']);
    Route::post('/update/{id}',        [GuduController::class, 'update'])->name('gudu.update');
});

/*
|--------------------------------------------------------------------------
| Karshi Controller 
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'karshi'], function () {
    Route::get('/', [KarshiController::class, 'index'])->name('karshi.index');
    Route::get('/preview', [KarshiController::class, 'previewAll'])->name('karshi.previewAll');
    Route::get('/create', [KarshiController::class, 'create']);
    Route::get('/view', [KarshiController::class, 'view'])->name('karshi.view');
    Route::post('/store',      [KarshiController::class, 'store']);
    Route::get('/edit/{id}', [KarshiController::class, 'edit']);
    Route::post('/update/{id}',        [KarshiController::class, 'update'])->name('karshi.update');
});


/*
|--------------------------------------------------------------------------
| Appo New Controller 
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'apo-new'], function () {
    Route::get('/', [ApoNewController::class, 'index'])->name('apo_new.index');
    Route::get('/preview', [ApoNewController::class, 'previewAll'])->name('apo_new.previewAll');
    Route::get('/view', [ApoNewController::class, 'view'])->name('appo_new.view');
    Route::get('/edit/{id}', [ApoNewController::class, 'edit'])->name('appo_new.view');

});
/*
|--------------------------------------------------------------------------
| Jahi Controller 
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'jahi'], function () {
    Route::get('/', [JahiController::class, 'index'])->name('jahi.index');
    Route::get('/create',       [JahiController::class, 'create']);
    Route::post('/store',      [JahiController::class, 'store']);
    Route::get('/preview', [JahiController::class, 'previewAll'])->name('jahi.previewAll');
    Route::get('/view', [JahiController::class, 'view'])->name('jahi.view');
    Route::get('/edit/{id}', [JahiController::class, 'edit']);
    Route::post('/update/{id}',        [JahiController::class, 'update'])->name('offices.update');

});

Route::get('/jahi/upload', [JahiController::class, 'uploadForm'])->name('jahi.upload-form');
Route::post('/jahi/bulk-upload', [JahiController::class, 'bulkUpload'])->name('jahi.bulk-upload');

/*
|--------------------------------------------------------------------------
| Nas Demand Controller
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'nasarawa/demands'], function () {
    Route::get('/', [NasarawaController::class, 'nasDemand'])->name('nas_demands.index');
    Route::get('/view', [NasarawaController::class, 'nasDemand'])->name('nas_demands.show');
});
/*
|--------------------------------------------------------------------------
| Nas Reminder Controller
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'nasarawa/reminder'], function () {
    Route::get('/', [NasarawaController::class, 'paidIndex'])->name('nas_reminder.index');
    Route::get('/view', [NasarawaController::class, 'showReminder'])->name('nas_reminder.show');
});

