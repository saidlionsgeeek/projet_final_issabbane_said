<?php

use App\Http\Controllers\admin\MailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class , 'index'])->name('home.index');
Route::get('/shop',[ShopController::class , 'index'])->name("shop.index");
Route::get("/contact",[ContactController::class , 'index'])->name("contact.index");
Route::get("/cart",[CartController::class , 'index'])->name("cart.index");


// !!mail
Route::post("/sendmail" , [HomeController::class , 'suscribemail'])->name("sendemail");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// !! backoffice

Route::middleware(['auth','role:admin','role:webmaster'])->group(function () {
    Route::get('/backoffice/mailbox',[MailController::class , 'index'])->middleware('role:admin')->name("mailbox.index");
    Route::post('/backoffice/mailbox/store',[MailController::class , 'store'])->name("mailbox.store");
});

require __DIR__.'/auth.php';
