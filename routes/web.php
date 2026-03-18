<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Custom\IndexController;
use App\Http\Controllers\Custom\ShopController;
use App\Http\Controllers\Custom\CartController;
use App\Http\Controllers\Custom\CheckoutController;



Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

       // ✅ Category CRUD
    Route::resource('categories', CategoryController::class);

    // ✅ Subcategory CRUD
    Route::resource('subcategories', SubcategoryController::class);

    // ✅ Product CRUD
    Route::resource('products', ProductController::class);
    Route::get('get-subcategories/{id}', function ($id) {
    return \App\Models\Subcategory::where('category_id', $id)->get();
    });
    
    // ✅ Order Management
    Route::resource('orders', OrderController::class)->only(['index','show','destroy']);

    Route::post('orders/{order}/status', [OrderController::class, 'updateStatus'])
        ->name('orders.status');

    // ✅ Testimonial CRUD
    Route::resource('testimonials', TestimonialController::class);
    // ✅ Blog CRUD
    Route::resource('blogs', BlogController::class);

    // ✅ Brand CRUD
    Route::resource('brands', BrandController::class);
    // ✅ Setting Management
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');


});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

Route::get('/', [IndexController::class, 'index'])->name('custom.index');


Route::get('/category/{slug}', [ShopController::class, 'category'])->name('categories');
Route::get('/shop/{subcategory}', [ShopController::class, 'products'])->name('shop');
Route::get('/product/{slug}', [ShopController::class, 'show'])->name('product.show');
Route::get('/shop/{slug}', [ShopController::class, 'index'])->name('shop');

// Cart routes
Route::post('/add-to-cart', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');

// Checkout routes
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');

Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');