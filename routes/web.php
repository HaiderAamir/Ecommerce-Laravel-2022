<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Models\Product;


Auth::routes();
Route::get("/", [CustomerController::class, "prod_me"]);
Route::get("/userlogin", [CustomerController::class, "login"]);
Route::post("/login_submit", [CustomerController::class, "login_submit"]);
Route::get("/userregister", [CustomerController::class, "userregister"]);
Route::post("/register_submit", [CustomerController::class, "register_submit"]);
Route::get("/view_product/{id}", [CustomerController::class, "view_product"]);
Route::get("/shop", [CustomerController::class, "shop"]);
Route::get("/view_product_category/{prod}", [CustomerController::class, "view_product_category"]);
Route::get("/view_product_subcategory/{prod}", [CustomerController::class, "view_product_subcategory"]);
Route::get("/logout", [CustomerController::class, "logout"]);
Route::post("/add_to_cart", [CustomerController::class, "add_to_cart"]);
Route::get("/cart", [CustomerController::class, "cart"])->name('cart');
Route::get("/remove_cart/{id}", [CustomerController::class, "remove_cart"]);
Route::get("/empty_basket", [CustomerController::class, "empty_basket"]);
Route::post('/cart/increase-qty', [CustomerController::class, 'increaseQty']);
Route::post('/cart/decrease-qty', [CustomerController::class, 'decreaseQty']);
Route::get('/cart/address', [CustomerController::class, 'address']);
Route::post('/cart/cart_login', [CustomerController::class, 'cart_login']);
Route::post('/cart/submit_address', [CustomerController::class, 'submit_address']);
Route::post('/cart/cashondelivery', [CustomerController::class, 'cashondelivery']);
Route::get('/aboutus', [CustomerController::class, 'aboutus']);
Route::get('/contactus', [CustomerController::class, 'contactus']);
Route::post('/contactus_submit', [CustomerController::class, 'contactus_submit']);
Route::get('/search', [CustomerController::class, 'search']);
Route::get('/profile/{email}', [CustomerController::class, 'profile']);
Route::get('/manage_address/{email}', [CustomerController::class, 'manage_address']);
Route::get('/my_orders/{email}', [CustomerController::class, 'my_orders']);
Route::post('/update_user_name', [CustomerController::class, 'update_user_name']);
Route::post('/change_user_password', [CustomerController::class, 'change_user_password']);
Route::post('/update_personal_details', [CustomerController::class, 'update_personal_details']);
// Route::get('generate-pdf/{invoice_number}', 'YourController@generatePDF');
Route::get('generate_pdf/{invoice_number}', [CustomerController::class, 'generate_pdf']);


// Route::post('/add_wishlist', [CustomerController::class, 'add_wishlist']);
Route::get('/add_wishlist', [CustomerController::class, 'add_wishlist']);
Route::get('/my_wishlist/{email}', [CustomerController::class, 'my_wishlist']);
Route::get('/delete_wishlist/{id}', [CustomerController::class, 'delete_wishlist']);
Route::get('/ourpolicy', [CustomerController::class, 'policy']);
Route::post('/otp', [CustomerController::class, 'otp']);
Route::get('/privacy-policy', [CustomerController::class, 'priavry_policy']);
Route::get('/terms-condition', [CustomerController::class, 'term_condition']);
Route::get('/forgot_password', [CustomerController::class, 'forgot_password']);
Route::post('/forget_email_confirm', [CustomerController::class, 'forget_email_confirm']);
Route::get('/reset_password/{code}', [CustomerController::class, 'reset_password']);
Route::post('/save_password', [CustomerController::class, 'save_password']);












Route::middleware(['auth','user-role:user'])->group(function()
{
    Route::get("/user/home",[HomeController::class, 'userHome'])->name("user.home");
});

// Route User
Route::middleware(['auth','user-role:customer'])->group(function()
{
    Route::get("/home",[HomeController::class, 'customer'])->name("home");
});
// Route Editor
Route::middleware(['auth','user-role:editor'])->group(function()
{
    Route::get("/editor/home",[HomeController::class, 'editorHome'])->name("editor.home");
});
// Route Admin
Route::middleware(['auth','user-role:admin'])->group(function()
{
    Route::get("/admin/home",[HomeController::class, 'adminHome'])->name("admin.home");
    Route::get("/admin/staff_list",[AdminController::class, 'active_user'])->name("admin.staff_list");
    Route::get("/admin/customer_list",[AdminController::class, 'customer_list'])->name("admin.customer_list");
    Route::post("/admin/add_user",[AdminController::class, 'add_user'])->name("admin.add_user");
    Route::post("/admin/delete_user",[AdminController::class, 'delete_user'])->name("admin.delete_user");
    Route::post("/admin/update_user",[AdminController::class, 'update_user'])->name("admin.update_user");
    Route::get("/admin/statuschange/{id}",[AdminController::class, 'statuschange'])->name("admin.statuschange");
    // products routes
    Route::get("/admin/active_products",[AdminController::class, 'active_products'])->name("admin.active_products");
    Route::post("/admin/add_subcategory",[AdminController::class, 'add_subcategory'])->name("admin.add_subcategory");
    Route::post("/admin/add_category",[AdminController::class, 'add_category'])->name("admin.add_category");
    Route::post("/admin/addproduct",[AdminController::class, 'addproduct'])->name("admin.addproduct");
    Route::get("/admin/sale_active/{id}",[AdminController::class, 'sale_active'])->name("admin.sale_active");
    Route::get("/admin/product_top/{id}",[AdminController::class, 'product_top'])->name("admin.product_top");
    Route::get("/admin/product_status/{id}",[AdminController::class, 'product_status'])->name("admin.product_status");
    Route::post("/admin/delete_product",[AdminController::class, 'delete_product'])->name("admin.delete_product");
    Route::get("/admin/edit_product/{id}",[AdminController::class, 'edit_product'])->name("admin.edit_product");


    //orders routes
    Route::get("/admin/new_orders",[AdminController::class, 'new_orders'])->name("admin.new_orders");
    Route::get("/admin/slides",[AdminController::class, 'slides'])->name("admin.slides");
    Route::post("/admin/addslide",[AdminController::class, 'addslide'])->name("admin.addslide");
    Route::post("/admin/delete_slide",[AdminController::class, 'delete_slide'])->name("admin.delete_slide");

    Route::get('/admin/update-order-status', [AdminController::class, 'update_order_status'])->name('admin.updateOrderStatus');
    Route::get('/admin/catgories', [AdminController::class, 'catgories'])->name('admin.catgories');
    Route::post('/admin/delete_category', [AdminController::class, 'delete_category'])->name('admin.delete_category');
    Route::post('/admin/delete_sub_category', [AdminController::class, 'delete_sub_category'])->name('admin.delete_sub_category');
    Route::get('/admin/sub_catgory', [AdminController::class, 'sub_catgories'])->name('admin.sub_catgories');
    Route::get('/admin/complete_orders', [AdminController::class, 'complete_orders'])->name('admin.complete_orders');
    Route::get('/admin/complete_orders_list', [AdminController::class, 'complete_orders_list'])->name('admin.complete_orders_list');
    Route::get('/admin/product_details_fetch/{prod}', [AdminController::class, 'product_details_fetch'])->name('admin.product_details_fetch');
    Route::post('/admin/update_product', [AdminController::class, 'update_product'])->name('admin.update_product');



});
