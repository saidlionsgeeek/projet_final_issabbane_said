<?php

use App\Http\Controllers\admin\MailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\InfoController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SinglePageController;
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
Route::get("/product/{product}",[SinglePageController::class , 'index'])->name("product.index");
Route::get('/shop/filter', [ShopController::class,'filterProducts'])->name('shop.filter');

// !!sort
Route::get('/shop/sort', [ShopController::class , "sort"])->name('shop.sort');




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
    Route::get('/backoffice/users',[UsersController::class , 'index'])->middleware('role:admin')->name("users.index");
    Route::post('/Backoffice/users/assignrole/{user}', [UsersController::class, "assignrole"])->name("users.assignrole");
    Route::delete("/user/{user}/roles/{role}", [UsersController::class, "removerole"])->name('user.role.remove');
    Route::get('/backoffice/info',[InfoController::class , 'index'])->middleware('role:admin')->name("info.index");
    Route::put('/backoffice/mailbox/check/{email}',[MailController::class , 'checkmail'])->middleware('role:admin')->name("mailbox.checkmail");
    Route::put('/backoffice/info/{info}',[InfoController::class , 'update'])->middleware('role:admin')->name("info.update");
});

Route::post('/backoffice/mailbox/store',[MailController::class , 'store'])->name("mailbox.store");

require __DIR__.'/auth.php';
