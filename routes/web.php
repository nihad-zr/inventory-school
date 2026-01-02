<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ScanController;



/*
|--------------------------------------------------------------------------
| Redirect root
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('/admin/login');
});

/*
|--------------------------------------------------------------------------
| Admin Auth
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('login'); // <- اسم route 'login' مضاف
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('login.submit');

/*
|--------------------------------------------------------------------------
| Admin Protected Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware('auth:admin')->group(function () {

    Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');

    /* ================= Products ================= */
    Route::resource('products', ProductController::class);

    /* ================= Items ================= */
/* ================= Items ================= */

// صفحة المربعات (Items)
Route::get('/items', [ItemController::class, 'products'])->name('items.index');

// عناصر منتج معيّن
Route::get('/items/{product}', [ItemController::class, 'index']);

// حفظ التعديلات
Route::post('/items/update', [ItemController::class, 'update']);

// طباعة الباركود
Route::get('items/{product}/print', [ProductController::class, 'printBarcodes'])->name('items.print');

 Route::get('/scan', [ProductController::class, 'scanPage'])->name('admin.scan.page');
    Route::get('/scan-item/{code}', [ProductController::class, 'scanItem'])->name('admin.scan.item');

    /* ================= Employees ================= */
    Route::get('employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

    /* ================= Logout ================= */
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});
