<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Permission;
use App\Models\Profile;
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

Route::get('/', [PostController::class, 'index']);
//
Route::resource('post', PostController::class)->except('index')->middleware('verified');
//
Auth::routes(['verify' => true]);
//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
Route::get('{id}/{slug}', [PostController::class, 'getByCat'])->name('category')->where('id', '[0-9]+');
//
Route::post('/search', [PostController::class, 'search'])->name('search');
//
Route::resource('comment', CommentController::class);
//
Route::get('{id}', [ProfileController::class, 'getByUser'])->where('id', '[0-9]+');
//
Route::get('settings', [ProfileController::class, 'edit'])->name('settings');
//
Route::post('settings', [ProfileController::class, 'update'])->name('settings');
//
/*
Route::get('/admin/index',function(){
    return view('admin.index');
}); 
 */
//
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('Admin');
//
//Route::get('dashboard',[DashboardController::class,'index']);

Route::group(['prefix' => 'admin', 'middleware' => 'Admin'], function () {
    //
    Route::resource('posts', AdminPostController::class);
    //
    Route::resource('categories', CategoryController::class);
    //
    Route::resource('users', UserController::class);
    //
    Route::get('permissions', [PermissionController::class, 'index'])->name('permissions');
    //
    Route::post('permissions', [RoleController::class, 'store'])->name('permissions');
});
//
Route::post('permission_byRole', [RoleController::class, 'permissionByRole'])->name('permission_byRole')->middleware('Admin');
//
Route::resource('page', PageController::class)->middleware('Admin');
