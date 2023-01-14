<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ManageGenreController;
use App\Http\Controllers\Admin\ManageCategoryController;
use App\Http\Controllers\Admin\ManageItemController;
use App\Http\Controllers\Client\ItemController;

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

//Authentication
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');

// Language (Eng/Vie)
Route::get('/lang/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'vi'])) {
        abort(400);
    }

    App::setLocale($locale);
    Session::put('locale',$locale);
    return redirect()->back();
});

/* ===================== CLIENT =====================*/

Route::prefix('/')->group( function() {
    Route::prefix('item')->group( function() {
        Route::get('/show/{id}',  [ItemController::class, 'show']);
    });
    Route::prefix('pricing')->group( function() {
        Route::get('/show',  [HomeController::class, 'pricing'])->name('client.pricing');
        Route::get('/payment',  [HomeController::class, 'payment'])->name('client.premium');
    });
});

 /* ===================== ADMIN =====================*/

// Route::prefix('admin')->group( function() {
//     Route::get('/home', [HomeController::class])->middleware('is_admin')->name('admin.home');
// });

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::prefix('admin')->group( function() {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('is_admin');
    
    Route::prefix('item')->group( function() {
        Route::get('/add-item', [ManageItemController::class, 'create'])->name('admin.item.add');
    });

    // Manage Category
    Route::prefix('category')->group( function() {
        //same route
        Route::get('/', [ManageCategoryController::class, 'index'])->name('admin.category');
        Route::get('/list-category', [ManageCategoryController::class, 'index'])->name('admin.category.list');

        Route::get('/add-category', [ManageCategoryController::class, 'create'])->name('admin.category.add');
        Route::post('/store-category', [ManageCategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/edit-category/{id}', [ManageCategoryController::class, 'edit']);
        Route::post('/update-category/{id}', [ManageCategoryController::class, 'update']);
        Route::get('/update-category-status/{id}', [ManageCategoryController::class, 'updateStatus']);
        Route::get('/destroy-category/{id}', [ManageCategoryController::class, 'destroy']);
    });

    // Manage Genre
    Route::prefix('genre')->group( function() {
        //same route
        Route::get('/', [ManageGenreController::class, 'index'])->name('admin.genre');
        Route::get('/list-genre', [ManageGenreController::class, 'index'])->name('admin.genre.list');

        Route::get('/add-genre', [ManageGenreController::class, 'create'])->name('admin.genre.add');
        Route::post('/store-genre', [ManageGenreController::class, 'store'])->name('admin.genre.store');
        Route::get('/edit-genre/{id}', [ManageGenreController::class, 'edit']);
        Route::post('/update-genre/{id}', [ManageGenreController::class, 'update']);
        Route::get('/update-genre-status/{id}', [ManageGenreController::class, 'updateStatus']);
        Route::get('/destroy-genre/{id}', [ManageGenreController::class, 'destroy']);
    });

    // Manage Item
    Route::prefix('item')->group( function() {
        //same route
        Route::get('/', [ManageItemController::class, 'index'])->name('admin.item');
        Route::get('/list-item', [ManageItemController::class, 'index'])->name('admin.item.list');

        Route::get('/add-item', [ManageItemController::class, 'create'])->name('admin.item.add');
        Route::post('/store-item', [ManageItemController::class, 'store'])->name('admin.item.store');
        Route::get('/edit-item/{id}', [ManageItemController::class, 'edit']);
        Route::post('/update-item/{id}', [ManageItemController::class, 'update']);
        Route::get('/update-item-status/{id}', [ManageItemController::class, 'updateStatus']);
        Route::get('/destroy-item/{id}', [ManageItemController::class, 'destroy']);
    });
});