<?php

use App\Http\Controllers\ForumController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentsController;
use App\Models\User;

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
//     return redirect('forum');
// });

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {

// });

Route::get('profile/{id}', function ($id) {
    $user = User::where('id', $id)->get();
    return view('profile.userinfo', compact('user'));
})->name('user.profile');

Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::get('/dashboard', function () {
            $users = User::all();
            return view('dashboard', compact('users'));
        })->name('dashboard');
    
    Route::get('/crcat', [CategoryController::class, 'create'])->name('create.category');
    Route::post('/crcat', [CategoryController::class, 'store'])->name('custom.create.category');

    Route::get('/crsubcat', [SubcategoryController::class, 'create'])->name('create.subcategory');
    Route::post('/crsubcat', [SubcategoryController::class, 'store'])->name('custom.create.subcategory');

    Route::get('profile/{id}/role', [UserController::class, 'change_role'])->name('view.role');
    Route::post('profile/{id}/role', [UserController::class, 'update'])->name('update.role');

    Route::match(['get','post'], 'profile/{id}/userban', [UserController::class, 'ban'])->name('ban');
    Route::match(['get','post'], 'profile/{id}/userunban', [UserController::class, 'unban'])->name('unban');
    });

    Route::group(['middleware' => ['auth']], function() {

        Route::get('/forum', ForumController::class)->name('forum');

    Route::get('/post/{id}/crcomment/', [CommentsController::class, 'create'])->name('create.comment');
    Route::post('/post/store', [CommentsController::class, 'store'])->name('custom.create.comment');
    Route::get('/crpost', [PostController::class, 'create'])->name('create.post');
    Route::post('/crpost', [PostController::class, 'store'])->name('custom.create.post');

    Route::get('post/{slug}/destroy', [PostController::class, 'destroy'])->name('destroy.post');

});

Route::get('/subcategories/{slug}', [SubcategoryController::class, 'show'])->name('show.subcats');
Route::get('/subcategory/{slug}', [PostController::class, 'show'])->name('show.subcat');
Route::get('/post/{slug}', [CommentsController::class, 'index'])->name('show.post');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');