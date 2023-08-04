<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MaterialMasukController;
use App\Http\Controllers\ModelItemController;
use App\Http\Controllers\PersediaanController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RequestItemController;
use App\Models\MaterialMasuk;

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
    return view('pages.auth.login');
});
Route::get('/login', function () {
    return view('pages.auth.login');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('daftar-supplier', [SupplierController::class, 'index']);
    Route::get('tambah-supplier', [SupplierController::class, 'create']);
    Route::post('post-supplier', [SupplierController::class, 'store']);
    Route::get('edit-supplier/{supplier}', [SupplierController::class, 'edit']);
    Route::post('update-supplier/{supplier}', [SupplierController::class, 'update']);
    Route::get('delete-supplier/{supplier}', [SupplierController::class, 'destroy']);

    Route::get('daftar-material', [MaterialController::class, 'index']);
    Route::get('tambah-material', [MaterialController::class, 'create']);
    Route::post('post-material', [MaterialController::class, 'store']);
    Route::get('edit-material/{material}', [MaterialController::class, 'edit']);
    Route::post('update-material/{material}', [MaterialController::class, 'update']);
    Route::get('delete-material/{material}', [MaterialController::class, 'destroy']);

    Route::get('daftar-customer', [CustomerController::class, 'index']);
    Route::get('tambah-customer', [CustomerController::class, 'create']);
    Route::post('post-customer', [CustomerController::class, 'store']);
    Route::get('edit-customer/{customer}', [CustomerController::class, 'edit']);
    Route::post('update-customer/{customer}', [CustomerController::class, 'update']);
    Route::get('delete-customer/{customer}', [CustomerController::class, 'destroy']);

    Route::get('daftar-model', [ModelItemController::class, 'index']);
    Route::get('tambah-model', [ModelItemController::class, 'create']);
    Route::post('post-model', [ModelItemController::class, 'store']);
    Route::get('cart-model/{modelItem}', [ModelItemController::class, 'cart']);
    Route::post('update-model-cart/{modelItem}', [ModelItemController::class, 'updateCart']);
    Route::get('edit-model/{modelItem}', [ModelItemController::class, 'edit']);
    Route::post('update-model/{modelItem}', [ModelItemController::class, 'update']);
    Route::get('delete-model/{modelItem}', [ModelItemController::class, 'destroy']);

    Route::get('daftar-user', [UserController::class, 'index']);
    Route::get('tambah-user', [UserController::class, 'create']);
    Route::post('post-user', [UserController::class, 'store']);
    Route::get('edit-user/{user}', [UserController::class, 'edit']);
    Route::post('update-user/{user}', [UserController::class, 'update']);
    Route::get('delete-user/{user}', [UserController::class, 'destroy']);

    Route::get('reset-password/{user}', [UserController::class, 'resetPassword']);
    Route::get('edit-password', [UserController::class, 'formPassword']);
    Route::post('update-password', [UserController::class, 'updatePassword']);

    Route::get('daftar-request', [RequestItemController::class, 'index']);
    Route::get('daftar-penerimaan', [RequestItemController::class, 'index2']);
    Route::get('daftar-produksi', [RequestItemController::class, 'index3']);
    Route::get('tambah-request', [RequestItemController::class, 'create']);
    Route::post('post-request', [RequestItemController::class, 'store']);
    Route::get('detail-request/{requestItem}', [RequestItemController::class, 'show']);
    Route::get('edit-request/{requestItem}', [RequestItemController::class, 'edit']);
    Route::post('update-request/{requestItem}', [RequestItemController::class, 'update']);
    Route::get('delete-request/{requestItem}', [RequestItemController::class, 'destroy']);
    Route::get('beli-item/{id}', [RequestItemController::class, 'beliItem']);
    Route::get('kirim-item/{id}', [RequestItemController::class, 'sendRequest']);
    Route::get('produksi-item/{id}', [RequestItemController::class, 'produksiRequest']);

    Route::get('delete-single/{id}', [RequestItemController::class, 'deleteSingle']);
    Route::get('edit-single/{id}', [RequestItemController::class, 'editSingle']);
    Route::post('update-single-item/{id}', [RequestItemController::class, 'updateSingle']);

    Route::get('daftar-persediaan', [PersediaanController::class, 'index']);
    Route::get('tambah-persediaan', [PersediaanController::class, 'create']);
    Route::post('post-persediaan', [PersediaanController::class, 'store']);
    Route::get('edit-persediaan/{persediaan}', [PersediaanController::class, 'edit']);
    Route::post('update-persediaan/{persediaan}', [PersediaanController::class, 'update']);
    Route::get('delete-persediaan/{persediaan}', [PersediaanController::class, 'destroy']);

    Route::get('daftar-material-masuk', [MaterialMasukController::class, 'index']);
    Route::get('tambah-material-masuk', [MaterialMasukController::class, 'create']);
    Route::post('post-material-masuk', [MaterialMasukController::class, 'store']);
    Route::get('edit-material-masuk/{materialMasuk}', [MaterialMasukController::class, 'edit']);
    Route::post('update-material-masuk/{materialMasuk}', [MaterialMasukController::class, 'update']);
    Route::get('delete-material-masuk/{materialMasuk}', [MaterialMasukController::class, 'destroy']);

    Route::get('report-permintaan', [ReportController::class, 'index']);
    Route::post('post-report', [ReportController::class, 'printindex']);

    Route::get('report-terkirim', [ReportController::class, 'index2']);
    Route::post('post-terkirim', [ReportController::class, 'printindex2']);

    Route::get('report-finish', [ReportController::class, 'index3']);
    Route::post('post-finish', [ReportController::class, 'printindex3']);
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('/');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
