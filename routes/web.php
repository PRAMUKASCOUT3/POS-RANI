<?php

use App\Http\Controllers\CashierController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenditureController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvmemberer and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware(['auth', 'admin'])->group(function () {
   
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::get('/admin/pengguna', \App\Livewire\User\index::class)->name('pengguna.index');
    Route::get('/admin/pengguna/{id}/edit',[UserController::class,'edit'])->name('pengguna.edit');
    Route::get('/admin/pengguna/Laporan',[UserController::class,'report'])->name('pengguna.laporan');
    Route::get('/admin/pengguna/print',[UserController::class,'generatePDF'])->name('pengguna.print');
    Route::delete('/admin/pengguna/delete/{id}',[UserController::class,'delete'])->name('pengguna.delete');
    Route::get('/admin/profile/{id}',[UserController::class, 'show'])->name('pengguna.show');
    Route::put('/admin/profile/update/{id}',[UserController::class, 'update'])->name('pengguna.update');

    Route::get('/admin/supplier', \App\Livewire\Supplier\index::class)->name('supplier.index');
    Route::get('/admin/supplier/{id}/edit',[SupplierController::class, 'edit'])->name('supplier.edit');
    
    Route::get('/admin/kategori',\App\Livewire\Category\index::class)->name('category.index');
    Route::get('/admin/kategori/{id}/edit',[CategoryController::class, 'edit'])->name('category.edit');
    Route::delete('/admin/kategori/delete/{id}',[CategoryController::class, 'delete'])->name('category.delete');
    
    Route::get('/admin/produk',\App\Livewire\Product\index::class)->name('product.index');
Route::get('/admin/produk/tambah',[ProductController::class,'create'])->name('product.create');
Route::get('/admin/produk/{id}/edit',[ProductController::class, 'edit'])->name('product.edit');
Route::get('/admin/produk/laporan',[ProductController::class,'report'])->name('product.report');
Route::get('/admin/produk/print',[ProductController::class,'generatePDF'])->name('product.print');
Route::delete('/admin/produk/delete/{id}',[ProductController::class,'delete'])->name('product.delete');




});
Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/admin/profile/{id}',[UserController::class, 'show'])->name('pengguna.show');
    Route::put('/admin/profile/update/{id}',[UserController::class, 'update'])->name('pengguna.update');
    Route::get('/',[UserController::class, 'index'])->name('dashboard');
    Route::get('/admin/pengeluaran',\App\Livewire\Expenditures\index::class)->name('expenditures.index');
    Route::get('/admin/pengeluaran/{id}/edit',[ExpenditureController::class,'edit'])->name('expenditures.edit');
    
    Route::get('/admin/kasir',\App\Livewire\Cashier\index::class)->name('cashier.index');
    Route::get('/admin/kasir/print/',[CashierController::class,'print'])->name('cashier.print');
    Route::get('/admin/kasir/riwayat',[CashierController::class,'history'])->name('cashier.riwayat');
    Route::get('/admin/kasir/laporan',[CashierController::class,'report'])->name('cashier.report');
    Route::get('/admin/kasir/print-pdf',[CashierController::class,'generatePDF'])->name('cashier.pdf');

    Route::get('/admin/member',[MemberController::class,'index'])->name('members.index');
    Route::post('/admin/member/store',[MemberController::class,'store'])->name('members.store');
    Route::get('/admin/member/{member}/edit',[MemberController::class,'edit'])->name('members.edit');
    Route::put('/admin/member/{member}/update',[MemberController::class,'update'])->name('members.update');
    Route::delete('/admin/member/{member}/delete',[MemberController::class,'delete'])->name('members.delete');



        
});