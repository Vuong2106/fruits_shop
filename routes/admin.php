<?php

use App\Http\Controllers\Admin\CRUD\AccountController;
use App\Http\Controllers\Admin\CRUD\AuthController;
use App\Http\Controllers\Admin\CRUD\CalendarController;
use App\Http\Controllers\Admin\CRUD\RoleController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/regis', function () {return view('admin.pages.register');});
Route::get('/page-404', function () { return view('admin.pages.page404');})->name('page-404');
Route::post('/register', [AuthController::class, 'registerS'])->name('register');
Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');
Route::group(['middleware' => [ 'auth']], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    DashboardController::Routes();
    CalendarController::Routes();
    AccountController::Routes();
    RoleController::Routes();
});
