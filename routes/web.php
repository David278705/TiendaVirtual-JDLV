<?php

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

Route::get('/', [\App\Http\Controllers\ProductController::class, 'listindex'])->name('dashboard');

Route::group(['prefix' => 'Carrito'], function(){
    Route::get('/', [\App\Http\Controllers\CartController::class, 'index'])->name('Carrito')->middleware('auth');
    Route::post('/store', [\App\Http\Controllers\CartController::class, 'store'])->name('store')->middleware('auth');
    Route::delete('/delete/{cart}', [\App\Http\Controllers\CartController::class, 'delete'])->name('delete')->middleware('auth');

});

Route::group(['prefix' => 'dashboard'], function(){
    Route::get('/role', [\App\Http\Controllers\RoleController::class, 'index'])->name('role')->middleware('role:ceo');
    Route::get('/eproduct', [\App\Http\Controllers\ProductController::class, 'index'])->name('e.product')->middleware('role:editor');    
    Route::get('/category', [\App\Http\Controllers\CategoryController::class, 'index'])->name('category')->middleware('role:editor');   
    Route::get('/{category?}', [\App\Http\Controllers\ProductController::class, 'listindex'])->name('dashboard');    
    Route::get('/product/{product}', [\App\Http\Controllers\ProductController::class, 'storeProduct'])->name('detail');
});


Route::group(['prefix' => 'Role'], function(){
    Route::get('/store/{role}', [\App\Http\Controllers\RoleController::class, 'store'])->name('role.store')->middleware('role:ceo');
    Route::get('/delete/{role}', [\App\Http\Controllers\RoleController::class, 'delete'])->name('role.delete')->middleware('role:ceo');
    Route::get('/edit/{role}', [\App\Http\Controllers\RoleController::class, 'edit'])->name('role.edit')->middleware('role:ceo');
    Route::get('/update/{role}', [\App\Http\Controllers\RoleController::class, 'update'])->name('role.update')->middleware('role:ceo');
});


Route::group(['prefix' => 'Category'], function(){   
    Route::post('/store', [\App\Http\Controllers\CategoryController::class, 'store'])->name('category.store')->middleware('role:editor');
    Route::delete('/delete/{category}', [\App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete')->middleware('role:editor');
    Route::get('/edit/{category}', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit')->middleware('role:editor');
    Route::post('/update/{category}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('category.update')->middleware('role:editor');
});

Route::group(['prefix' => 'Product'], function(){
    Route::post('/store', [\App\Http\Controllers\ProductController::class, 'store'])->name('product.store')->middleware('role:editor');
    Route::delete('/delete/{product}', [\App\Http\Controllers\ProductController::class, 'delete'])->name('product.delete')->middleware('role:editor');
    Route::get('/edit/{product}', [\App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit')->middleware('role:editor');
    Route::post('/update/{product}', [\App\Http\Controllers\ProductController::class, 'update'])->name('product.update')->middleware('role:editor');
});



Route::get('/test', function () {


   /* \Spatie\Permission\Models\Role::create([
        'name' => 'ceo' 
    ]);
\Spatie\Permission\Models\Role::create([
        'name' => 'editor' 
    ]);
     
    $roles = $user->getRoleNames();
    return $roles;
    
    
    $user = \App\Models\User::first();
    $role = \Spatie\Permission\Models\Role::findByName('ceo');
    $user->assignRole($role);
   
    */


});


