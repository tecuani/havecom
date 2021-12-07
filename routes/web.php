<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StaticPageController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/servicios', [ServiceController::class, 'index'])->name('services.index');
Route::get('/servicios/{service:slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/productos', [ProductController::class, 'index'])->name('products.index');
Route::get('/productos/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/consultoria', [StaticPageController::class, 'consultancy'])->name('pages.consultancy');
Route::get('/aviso-de-privacidad', [StaticPageController::class, 'policy'])->name('pages.policy');
Route::get('/nosotros', [StaticPageController::class, 'aboutUs'])->name('pages.about_us');

Route::middleware(['auth:sanctum', 'role:admin'])->get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

