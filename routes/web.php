<?php

// use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\userController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\showAll;

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



// Route::get('/login', [authController::class, 'login']);
// Route::get('/admin', [adminController::class, 'showLogin']);
// Route::post('/admin', [adminController::class, 'login']);

Route::get('/', [authController::class, 'welcome']);
Route::get('/login', [authController::class, 'login'])->name('login')->middleware('guest');
Route::post('logout', [authController::class, 'logout'])->name('logout');

Route::post('/login', [authController::class, 'postLogin'])->name('LoginPost');
Route::get('/home', [userController::class, 'dashboard'])->name('userdashboard')->middleware('auth');
Route::get('/sales', [userController::class, 'showsales'])->name('sales')->middleware('auth');
Route::get('/disease', [userController::class, 'showdisease'])->middleware('auth');
Route::get('/poultry-daily', [userController::class, 'poultrydaily'])->middleware('auth');
Route::post('/poultry-daily', [userController::class, 'poultrydailystore'])->name('poultrydailystore')->middleware('auth');
Route::post('/sales', [userController::class, 'postsales'])->name('postsales')->middleware('auth');
Route::post('/cart', [userController::class, 'addtocart'])->name('cartstore')->middleware('auth');

Route::post('/sales/{id}', [userController::class, 'deletecart'])->name('deletecart')->middleware('auth');
Route::post('/order', [userController::class, 'saveorder'])->name('saveorder')->middleware('auth');
Route::get('/orders', [userController::class, 'showorders'])->name('orders')->middleware('auth');
Route::get(
    '/orders/{id}',
    [userController::class, 'showSingleOrder']
)->name('showsingleorders')->middleware('auth');
Route::post(
    '/orders/{id}',
    [userController::class, 'updateStatus']
)->middleware('auth');
// expenses
Route::get('/expenses', [userController::class, 'expenses'])->name('expenses')->middleware('auth');
Route::post('/expenses', [userController::class, 'expensestore'])->name('expensestore')->middleware('auth');
Route::get('/showexpenses/all', [showAll::class, 'showallexpenses'])->name('showallexpenses')->middleware('auth');
Route::get('/expenses/{id}', [userController::class, 'showsingleexpense'])->name('showsingleexpenses')->middleware('auth');
Route::post('/expenses/{id}', [userController::class, 'expensesdelete'])->name('expensesdelete')->middleware('auth');

// vaccine
Route::get('/vaccine', [userController::class, 'vaccine'])->name('vaccine')->middleware('auth');
Route::post('/vaccine', [userController::class, 'vaccinestore'])->name('vaccinestore')->middleware('auth');
Route::post('/vaccine', [userController::class, 'vaccinestore'])->name('vaccinestore')->middleware('auth');
Route::get('/vaccine/{id}', [userController::class, 'singlevaccine'])->name('showsinglevaccine')->middleware('auth');
Route::get('/showvaccine/all', [showAll::class, 'showvaccine'])->name('showvaccine')->middleware('auth');
// feeds
Route::get('/feed', [userController::class, 'feed'])->name('feed')->middleware('auth');
Route::post('/feed', [userController::class, 'feedstore'])->name('feedstore')->middleware('auth');
Route::get('/feed/{id}', [userController::class, 'showsinglefeed'])->name('showsinglefeed')->middleware('auth');
Route::get('/showfeed/all', [showAll::class, 'showfeeds'])->name('showallfeeds')->middleware('auth');
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/', [adminController::class, 'dashboard'])->name('admindashboard');
    Route::get('/vaccine', [adminController::class, 'vaccine'])->name('totalvaccine');
    Route::post('/vaccine/{id}', [adminController::class, 'deletevaccine']);
    Route::post('/vaccine', [adminController::class, 'postVaccine'])->name('totalpostvaccine');
    Route::get('/feeds', [adminController::class, 'feeds'])->name('totalfeeds');
    Route::post('/feeds', [adminController::class, 'postFeeds'])->name('totalpostfeeds');
    Route::post('/feeds/{id}', [adminController::class, 'deleteFeeds'])->name('deletefeed');
    Route::get('/products', [adminController::class, 'products'])->name('products');
    Route::post('/products', [adminController::class, 'productstore'])->name('productstore');
    Route::post('/products/{id}', [adminController::class, 'productdelete'])->name('deleteproduct');
    Route::get('/users', [adminController::class, 'showUsers'])->name('showusers');
    Route::post('/users', [adminController::class, 'addUsers'])->name('adduser');
    Route::post('/users/{id}', [adminController::class, 'deleteUsers'])->name('deleteuser');
});
