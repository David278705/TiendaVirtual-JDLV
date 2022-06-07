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

Route::get('/carrito', [\App\Http\Controllers\CartController::class, 'index'])->name('carrito');

Route::get('/dashboard/role', [\App\Http\Controllers\RoleController::class, 'index'])->name('role')->middleware('role:ceo');

Route::get('/dashboard/eproduct', [\App\Http\Controllers\ProductController::class, 'index'])->name('e.product')->middleware('role:editor');

Route::get('/dashboard/category', [\App\Http\Controllers\CategoryController::class, 'index'])->name('category')->middleware('role:editor');

Route::get('/dashboard/{category?}', [\App\Http\Controllers\ProductController::class, 'listindex'])->name('dashboard');

Route::get('/dashboard/product/{product}', [\App\Http\Controllers\ProductController::class, 'storeProduct'])->name('detail');

Route::post('/Carrito/store', [\App\Http\Controllers\CartController::class, 'store'])->name('detail');


Route::group(['prefix' => 'Role'], function(){
    Route::get('/store/{role}', [\App\Http\Controllers\RoleController::class, 'store'])->name('role.store');
    Route::get('/delete/{role}', [\App\Http\Controllers\RoleController::class, 'delete'])->name('role.delete');
    Route::get('/edit/{role}', [\App\Http\Controllers\RoleController::class, 'edit'])->name('role.edit');
    Route::get('/update/{role}', [\App\Http\Controllers\RoleController::class, 'update'])->name('role.update');
});


Route::group(['prefix' => 'Category'], function(){   
    Route::delete('/delete/{category}', [\App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete');
    Route::get('/edit/{category}', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/update/{category}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
});

Route::group(['prefix' => 'Product'], function(){
    Route::post('/store', [\App\Http\Controllers\ProductController::class, 'store'])->name('produc.store');
    Route::delete('/delete/{product}', [\App\Http\Controllers\ProductController::class, 'delete'])->name('produc.delete');
    Route::get('/edit/{product}', [\App\Http\Controllers\ProductController::class, 'edit'])->name('produc.edit');
    Route::post('/update/{product}', [\App\Http\Controllers\ProductController::class, 'update'])->name('produc.update');
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


