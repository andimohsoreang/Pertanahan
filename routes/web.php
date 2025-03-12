<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SeksiController;
use App\Http\Controllers\PerdisController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;



// Home
Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

Route::middleware(['auth', 'role:superadmin,operator,hod,verificator'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/admin/dashboard', [DashboardController::class, 'showDashboard'])->name('maindash');

});



// Rute untuk role lain
Route::middleware(['auth', 'role:superadmin,operator,hod,verificator'])->group(function () {
    Route::get('/admin/perdisgetData', [PerdisController::class, 'getDataPerdis'])->name('perdis.get');
    Route::get('/admin/perdis/create', [PerdisController::class, 'create'])->name('perdis.create');
    Route::get('/admin/perdis/{id}', [PerdisController::class, 'show'])->name('perdis.show');
    Route::get('/perdis/export', [PerdisController::class, 'exportExcel'])->name('perdis.export');

    Route::get('/trip/download-file/{file}', [FileController::class, 'downloadFile'])->name('trip.download-file');


    Route::get('/files/perdis', [FileController::class, 'index'])->name('files.perdisIndex');
    Route::get('/files/perdis/download/{id}', [FileController::class, 'downloadFileTrip'])->name('files.perdisDownload');
    Route::get('/files/perdis/download-all', [FileController::class, 'downloadAllFiles'])->name('files.perdisDownload-all');
});


Route::middleware(['auth', 'role:superadmin,operator'])->group(function () {

    Route::post('/business-trips', [PerdisController::class, 'store'])->name('business-trips.store');

    Route::post('/admin/perdis/storePerdis', [PerdisController::class, 'store'])->name('perdis.store');
    Route::delete('admin/perdis/{id}', [PerdisController::class, 'destroy'])->name('perdis.destroy');

    Route::get('/admin/perdis/{id}/edit', [PerdisController::class, 'edit'])->name('perdis.edit');
    Route::put('/admin/perdis/{id}', [PerdisController::class, 'update'])->name('perdis.update');

    Route::post('/trip/upload-file/{trip}', [FileController::class, 'uploadFile'])->name('trip.upload-file');

    Route::delete('/trip/delete-file/{file}', [FileController::class, 'deleteFile'])->name('trip.delete-file');


});


Route::middleware(['auth', 'role:superadmin'])->group(function () {

    Route::get('/users/listAccount', [AccountController::class, 'index']) ->name('users.listAccount');
    Route::get('/users/createAccount', [AccountController::class, 'createAccount'])->name('users.createAccount');
    Route::post('/users/storeAccount', [AccountController::class, 'storeAccount'])->name('users.storeAccount');
    Route::get('/users/editAccount/{id}', [AccountController::class, 'editAccount'])->name('users.editAccount');
    Route::put('/users/updateAccount/{id}', [AccountController::class, 'updateAccount'])->name('users.updateAccount');
    Route::delete('/users/deleteAccount/{id}', [AccountController::class, 'destroyAccount'])->name('users.destroyAccount');
    Route::get('/users/get-json', [AccountController::class, 'getJson'])->name('user.get.json');


    Route::get('/admin/formInput', [FormController::class, 'showMultiForm']);

    Route::get('/admin/getPegawai', [PegawaiController::class, 'getDataPegawai'])->name('pegawai.get');
    Route::get('/admin/getPegawaiJson', [PegawaiController::class, 'getDataPegawaiJson'])->name('pegawai.get.json');
    Route::get('/admin/createPegawai', [PegawaiController::class, 'createPegawai'])->name('pegawai.create');
    Route::post('/admin/storePegawai', [PegawaiController::class, 'storePegawai'])->name('pegawai.store');
    Route::get('/admin/pegawai/{id}/edit', [PegawaiController::class, 'editPegawai'])->name('pegawai.edit');
    Route::put('/admin/pegawai/{id}', [PegawaiController::class, 'updatePegawai'])->name('pegawai.update');
    Route::delete('/admin/pegawai/{id}/delete', [PegawaiController::class, 'destroyPegawai'])->name('pegawai.destroy');

    Route::get('/admin/seksi/getSeksi', [SeksiController::class, 'getDataSeksi'])->name('seksi.get');
    Route::get('/admin/seksi/getSeksiJson', [SeksiController::class, 'getJson'])->name('seksi.get.json');
    Route::get('/admin/seksi/createSeksi', [SeksiController::class, 'create'])->name('seksi.create');
    Route::post('/admin/seksi/store', [SeksiController::class, 'store'])->name('seksi.store');
    Route::get('/admin/seksi/{id}/edit', [SeksiController::class, 'edit'])->name('seksi.edit');
    Route::put('/admin/seksi/{id}', [SeksiController::class, 'update'])->name('seksi.update');
    Route::delete('/admin/seksi/{id}/delete', [SeksiController::class, 'destroy'])->name('seksi.destroy');


    Route::get('/admin/getTipeDokumen', [DocumentTypeController::class, 'getDocumentType'])->name('type.get');
    Route::get('/admin/getTypeJson', [DocumentTypeController::class, 'getTypeDocJson'])->name('type.get.json');
    Route::get('/admin/createTipeDoc', [DocumentTypeController::class, 'createDocType'])->name('type.create');
    Route::post('/admin/storeTipeDoc', [DocumentTypeController::class, 'storeDocType'])->name('type.store');
    Route::get('/admin/tipeDoc/{id}/edit', [DocumentTypeController::class, 'editDocType'])->name('type.edit');
    Route::put('/admin/tipeDoc/{id}', [DocumentTypeController::class, 'updateDocType'])->name('type.update');
    Route::delete('/admin/tipeDoc/{id}/delete', [DocumentTypeController::class, 'destroyDocType'])->name('type.destroy');

    // Route::get('/admin/perdisgetData', [FormController::class, 'getDataPerdis'])->name('perdis.get');
    // Route::get('/admin/perdisgetDataJson', [PerdisController::class, 'getJson'])->name('perdis.json');





});


// Rute untuk akses tidak sah
Route::get('/unauthorized', function () {
    return view('errors.unauthorized');
})->name('unauthorized');

Route::get('/debug-session', function () {
    return [
        'session_id' => session()->getId(),
        'session_data' => session()->all(),
        'authenticated' => Auth::check(),
        'user' => Auth::user(),
    ];
});

Route::get('/debug-auth', function () {
    return [
        'authenticated' => Auth::check(),
        'user' => Auth::user(),
        'session' => [
            'id' => session()->getId(),
            'all' => session()->all()
        ]
    ];
});


Route::get('/debug-routes', function () {
    return response()->json([
        'named_routes' => array_keys(app('router')->getRoutes()->getRoutesByName()),
        'current_url' => request()->fullUrl(),
        'authenticated' => Auth::check(),
        'user_role' => Auth::check() ? Auth::user()->role : null
    ]);
});

Route::get('/debug-middleware', function () {
    return [
        'authenticated' => Auth::check(),
        'user' => Auth::user(),
        'session' => session()->all(),
        'middleware' => app('router')->getMiddleware(),
        'current_route' => request()->route()->getName()
    ];
});
