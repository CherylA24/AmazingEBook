<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RentController;
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

Route::get('language/{locale}', function($locale){
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
});


Route::group(['middleware'=>'guest'],function(){
    Route::get('/', [HomeController::class, 'viewIndex']);
    Route::get('/logoutsuccess',[HomeController::class,'viewLogoutSuccess'])->name('logoutsuccess');
    Route::get('/login', [LoginController::class, 'viewLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'viewRegister'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);  
}); 

Route::group(['middleware'=>'adminmiddleware','middleware'=>'usermiddleware'],function(){
    Route::get('/home', [HomeController::class, 'viewHome'])->name('home');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');  
    Route::get('/success',[HomeController::class,'viewSuccess'])->name('success');
    Route::get('/saved',[HomeController::class,'viewSaved'])->name('saved');
    Route::get('/detail/{ebook}', [HomeController::class, 'viewDetail'])->name('detail'); 
    Route::get('/profile', [AccountController::class, 'viewProfile'])->name('profile');
    Route::put('/update/profile/{id}', [AccountController::class, 'updateProfile'])->name('updateprofile');
    Route::get('/view/cart', [RentController::class, 'viewCart'])->name('viewcart');
    Route::post('/add-to-cart/{ebook:id}', [RentController::class, 'addToCart'])->name('addtocart');
    Route::post('/rent',[RentController::class, 'rent'])->name('rent');
    Route::delete('/delete/cart/{ebook:id}', [RentController::class,'deleteCart'])->name('deletecart');
});

Route::group(['middleware'=>'adminmiddleware'],function(){
    Route::get('/account-maintenance', [AccountController::class, 'viewAccountMaintenance'])->name('accmaintenance');
    Route::delete('/delete/account/{id}', [AccountController::class, 'deleteAccount'])->name('deleteaccount');
    Route::get('/update/role/{id}',[AccountController::class, 'viewUpdateRole'])->name('viewupdaterole');
    Route::put('/update/role/{id}',[AccountController::class, 'updateRole'])->name('updaterole');
});