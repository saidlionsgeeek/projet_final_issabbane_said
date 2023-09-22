<?php

use App\Http\Controllers\admin\MailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\InfoController;
use App\Http\Controllers\admin\ProductController;
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
Route::get("/product/{product}",[SinglePageController::class , 'index'])->name("product.index")->middleware('auth');
Route::get('/shop/filter', [ShopController::class,'filterProducts'])->name('shop.filter');
Route::get("/cart",[CartController::class , 'index'])->name("cart.index")->middleware("auth");

// !!sort
Route::get('/shop/sort', [ShopController::class , "sort"])->name('shop.sort');


// !! add to cart
Route::get("/addtocart/{product}/{user}",[CartController::class , 'store'])->middleware("auth")->name("addtocart.store");
Route::get("/addtocart/{productuser}",[CartController::class , 'increment'])->middleware("auth")->name("increment.stock");
Route::get("/add/{productuser}",[CartController::class , 'decrement'])->middleware("auth")->name("decrement.stock");


// !!mail
Route::post("/sendmail" , [HomeController::class , 'suscribemail'])->name("sendemail");

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'destroy'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// !! backoffice

Route::middleware(['auth','role:webmaster'])->group(function () {
    Route::get('/backoffice/mailbox',[MailController::class , 'index'])->middleware('role:admin')->name("mailbox.index");
    Route::get('/backoffice/users',[UsersController::class , 'index'])->middleware('role:admin')->name("users.index");
    Route::post('/Backoffice/users/assignrole/{user}', [UsersController::class, "assignrole"])->name("users.assignrole")->middleware('role:admin');
    Route::delete("/user/{user}/roles/{role}", [UsersController::class, "removerole"])->name('user.role.remove')->middleware('role:admin');
    Route::get('/backoffice/info',[InfoController::class , 'index'])->middleware('role:admin')->name("info.index");
    Route::put('/backoffice/mailbox/check/{email}',[MailController::class , 'checkmail'])->middleware('role:admin')->name("mailbox.checkmail");
    Route::put('/backoffice/info/{info}',[InfoController::class , 'update'])->middleware('role:admin')->name("info.update");
    // !! Products
    Route::get("/backoffice/products" , [ProductController::class , 'index'])->name("productback.index");
    Route::post("/backoffice/products/create" , [ProductController::class , 'store'])->name("product.store");
    Route::put("/backoffice/products/update/{product}" , [ProductController::class , 'update'])->name("product.update");
    Route::delete("/backoffice/products/destroy/{product}" , [ProductController::class , 'destroy'])->name("product.destroy");
});

Route::post('/backoffice/mailbox/store',[MailController::class , 'store'])->name("mailbox.store");

require __DIR__.'/auth.php';
