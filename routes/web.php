<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('',[\App\Http\Controllers\Home::class,'viewlogin']);

Route::get('/index',[\App\Http\Controllers\index::class,'index']) ->name('index');
//home
Route::get('/home',[\App\Http\Controllers\Home::class,'index']) ->name('home');

Route::post('/login',[\App\Http\Controllers\Home::class,'login']) ->name('login');


Route::post('/logout',[\App\Http\Controllers\Home::class,'logout']) ->name('logout');



// get phong theo type
Route::get('get_room_theo_type',[\App\Http\Controllers\BookingController::class,'get_room_theo_type'])->name('get_room_theo_type');

Route::get('get_price_theo_type',[\App\Http\Controllers\BookingController::class,'get_price_theo_type'])->name('get_price_theo_type');


Route::get('get_price_theo_service',[\App\Http\Controllers\BookingController::class,'get_price_theo_service'])->name('get_price_theo_service');
Route::get('get_max_theo_type',[\App\Http\Controllers\BookingController::class,'get_max_theo_type'])->name('get_max_theo_type');

Route::get('total',[\App\Http\Controllers\BookingController::class,'total'])->name('total');




Route::get('/staff',[\App\Http\Controllers\StaffController::class,'index'])->name('hienthistaff');
Route::get('/staff/create',[\App\Http\Controllers\StaffController::class,'create']) ->name('taostaff');
// thêm dl vào database
Route::post('/staff/store',[\App\Http\Controllers\StaffController::class,'store']) ->name('themstaff');
// edit
Route::get('/staff/{staff}/edit',[\App\Http\Controllers\StaffController::class,'edit'])->name('staff.edit');
// luu dl lên data
Route::put('/staff/{staff}/edit',[\App\Http\Controllers\StaffController::class,'update'])->name('staff.put');
// xao
Route::delete('/staff/{staff}',[\App\Http\Controllers\StaffController::class,'destroy'])->name('staff.destroy');


//hien thi phong
Route::get('/room',[\App\Http\Controllers\RoomController::class,'index'])->name('room.index');

Route::get('/room/create',[\App\Http\Controllers\RoomController::class,'create']) ->name('room.create');
// thêm dl vào database
Route::post('/room/store',[\App\Http\Controllers\RoomController::class,'store']) ->name('room.add');
// edit
Route::get('/room/{room}/edit',[\App\Http\Controllers\RoomController::class,'edit'])->name('room.edit');
// luu dl lên data
Route::put('/room/{room}/edit',[\App\Http\Controllers\RoomController::class,'update'])->name('room.put');
// xao
Route::delete('/room/{room}',[\App\Http\Controllers\RoomController::class,'destroy'])->name('room.destroy');

//loai phong

Route::get('/type',[\App\Http\Controllers\RoomTypeController::class,'index'])->name('type.index');

Route::get('/type/create',[\App\Http\Controllers\RoomTypeController::class,'create']) ->name('type.create');
// thêm dl vào database
Route::post('/type/store',[\App\Http\Controllers\RoomTypeController::class,'store']) ->name('type.add');
// edit
Route::get('/type/{type}/edit',[\App\Http\Controllers\RoomTypeController::class,'edit'])->name('type.edit');
// luu dl lên data
Route::put('/type/{type}/edit',[\App\Http\Controllers\RoomTypeController::class,'update'])->name('type.put');
// xao
Route::delete('/type/{type}',[\App\Http\Controllers\RoomTypeController::class,'destroy'])->name('type.destroy');
// service
Route::get('/service',[\App\Http\Controllers\ServiceController::class,'index'])->name('service.index');
Route::get('/service/create',[\App\Http\Controllers\ServiceController::class,'create']) ->name('service.create');
Route::post('/service/store',[\App\Http\Controllers\ServiceController::class,'store']) ->name('service.add');
// edit
Route::get('/service/{service}/edit',[\App\Http\Controllers\ServiceController::class,'edit'])->name('service.edit');
// luu dl lên data
Route::put('/service/{service}/edit',[\App\Http\Controllers\ServiceController::class,'update'])->name('service.put');
// xao
Route::delete('/service/{service}',[\App\Http\Controllers\ServiceController::class,'destroy'])->name('service.destroy');

// type service
Route::get('/service_type',[\App\Http\Controllers\ServiceTypeController::class,'index'])->name('service_type.index');
Route::get('/service_type/create',[\App\Http\Controllers\ServiceTypeController::class,'create']) ->name('service_type.create');
Route::post('/service_type/store',[\App\Http\Controllers\ServiceTypeController::class,'store']) ->name('service_type.add');
// edit
Route::get('/service_type/{service_type}/edit',[\App\Http\Controllers\ServiceTypeController::class,'edit'])->name('service_type.edit');
// luu dl lên data
Route::put('/service_type/{service_type}/edit',[\App\Http\Controllers\ServiceTypeController::class,'update'])->name('service_type.put');
// xao
Route::delete('/service_type/{service_type}',[\App\Http\Controllers\ServiceTypeController::class,'destroy'])->name('service_type.destroy');

// variation
Route::get('/variation',[\App\Http\Controllers\VariationController::class,'index'])->name('variation.index');
Route::get('/variation/create',[\App\Http\Controllers\VariationController::class,'create']) ->name('variation.create');
Route::post('/variation/store',[\App\Http\Controllers\VariationController::class,'store']) ->name('variation.add');
// edit
Route::get('/variation/{variation}/edit',[\App\Http\Controllers\VariationController::class,'edit'])->name('variation.edit');
// luu dl lên data
Route::put('/variation/{variation}/edit',[\App\Http\Controllers\VariationController::class,'update'])->name('variation.put');
// xao
Route::delete('/variation/{vzariation}',[\App\Http\Controllers\VariationController::class,'destroy'])->name('variation.destroy');


Route::get('/booking',[\App\Http\Controllers\BookingController::class,'index'])->name('booking.index');
Route::get('/booking/create',[\App\Http\Controllers\BookingController::class,'create']) ->name('booking.create');
Route::post('/booking/store',[\App\Http\Controllers\BookingController::class,'store']) ->name('booking.add');
// edit
Route::get('/booking/{booking}/edit',[\App\Http\Controllers\BookingController::class,'edit'])->name('booking.edit');
// luu dl lên data
Route::put('/booking/{booking}/edit',[\App\Http\Controllers\BookingController::class,'update'])->name('booking.put');
// xao
Route::delete('/booking/{booking}',[\App\Http\Controllers\BookingController::class,'destroy'])->name('booking.destroy');


//customer
Route::get('/index',[\App\Http\Controllers\index::class,'index']) ->name('index');
Route::get('/customer',[\App\Http\Controllers\CustomerController::class,'index'])->name('hienthicustomer');
Route::get('/customer/create',[\App\Http\Controllers\CustomerController::class,'create']) ->name('customer.create');
// thêm dl vào database
Route::post('/customer/store',[\App\Http\Controllers\CustomerController::class,'store']) ->name('customer.add');
// edit
Route::get('/customer/{customer}/edit',[\App\Http\Controllers\CustomerController::class,'edit'])->name('customer.edit');
// luu dl lên data
Route::put('/customer/{customer}/edit',[\App\Http\Controllers\CustomerController::class,'update'])->name('customer.put');
// xao
Route::delete('/customer/{customer}',[\App\Http\Controllers\CustomerController::class,'destroy'])->name('customer.destroy');

