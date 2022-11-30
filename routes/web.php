<?php

use App\Http\Controllers\admin\AboutadminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CombinedLedgerController;
use App\Http\Controllers\admin\ContactadminController;
use App\Http\Controllers\admin\EmailController;
use App\Http\Controllers\admin\FrontcontrolController;
use App\Http\Controllers\admin\GodownStockController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; /*add*/
use App\Http\Controllers\admin\Image;
use App\Http\Controllers\admin\InvoiceBillController;
use App\Http\Controllers\admin\NewsadminController;
use App\Http\Controllers\admin\StockController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\NewsController;
use App\Http\Controllers\frontend\SearchController;


//admin & frontend -> /home or index after login
Route::get('/home', [HomeController::class, 'redirect'])->middleware('auth', 'verified');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');




Route::middleware(['auth', 'isAdmin'])->group(function () {

    //================Admin Category========================
    Route::get('admin_category', [CategoryController::class, 'index']);
    Route::post('admin_store_category', [CategoryController::class, 'store']);
    Route::get('admin_categories_edit/{id}', [CategoryController::class, 'edit']);
    Route::post('admin_update_category', [CategoryController::class, 'update']);
    Route::get('admin_categories_delete/{id}', [CategoryController::class, 'Delete']);
    Route::get('admin_categories_inactive/{id}', [CategoryController::class, 'Inactive']);
    Route::get('admin_categories_active/{id}', [CategoryController::class, 'Active']);
    Route::get('category_search', [CategoryController::class, 'category_search']);
    //================Admin Shop stock========================
    Route::get('admin_shop_stock', [StockController::class, 'index']);
    Route::get('admin_add_shop_stoke', [StockController::class, 'add_stoke_page']);
    Route::post('admin_store_shop_stock', [StockController::class, 'store']);
    Route::get('admin_shop_stock_seen/{id}', [StockController::class, 'admin_shop_stock_seen']);
    Route::get('admin_shop_stock_edit/{id}', [StockController::class, 'admin_shop_stock_edit']);
    Route::post('admin_update_shop_stock/{id}', [StockController::class, 'update']);
    Route::get('admin_shop_stock_delete/{id}', [StockController::class, 'Delete']);
    Route::get('shop_stock_search', [StockController::class, 'shop_stock_search']);

    //================Admin Godown stock========================
    Route::get('admin_godown_stock', [GodownStockController::class, 'index']);
    Route::get('admin_add_godown_stoke', [GodownStockController::class, 'add_godown_stoke']);
    Route::post('admin_store_godown_stock', [GodownStockController::class, 'store']);
    Route::get('admin_godown_stock_seen/{id}', [GodownStockController::class, 'godown_stock_seen']);
    Route::get('admin_godown_stock_edit/{id}', [GodownStockController::class, 'godown_stock_edit']);
    Route::post('admin_update_godown_stock/{id}', [GodownStockController::class, 'update']);
    Route::get('admin_godown_stock_delete/{id}', [GodownStockController::class, 'Delete']);
    Route::get('godown_stock_search', [GodownStockController::class, 'godown_stock_search']);
    
    //================Admin Invoice stock========================
    Route::get('admin_invoice_bill', [InvoiceBillController::class, 'index']);
    Route::get('admin_add_invoice', [InvoiceBillController::class, 'admin_add_invoice']);
    Route::post('product_invoice_store', [InvoiceBillController::class, 'product_invoice_store']);
    Route::get('admin_seen_invoicebill/{id}', [InvoiceBillController::class, 'seen_invoicebill']);
    Route::get('admin_product_invoice_delete/{id}', [InvoiceBillController::class, 'admin_product_invoice_delete']);
    Route::post('place_order_invoice', [InvoiceBillController::class, 'place_order_invoice']);
    Route::get('place_order_invoice_delete/{id}', [InvoiceBillController::class, 'place_order_invoice_delete']);
    Route::get('admin_place_order_invoice_edit/{id}', [InvoiceBillController::class, 'admin_place_order_invoice_edit']);
    Route::post('place_order_invoice_updated/{id}', [InvoiceBillController::class, 'place_order_invoice_updated']);
    Route::get('invoice_search', [InvoiceBillController::class, 'invoice_search']);
    Route::get('/autocomplete-search', [InvoiceBillController::class, 'search_stock_product']);
    //==================================CombinedLedger==============================
    Route::get('admin_combined_ledger', [CombinedLedgerController::class, 'index']);
    Route::post('customer_ledger_store', [CombinedLedgerController::class, 'customer_ledger_store']);
    Route::post('customer_ledger_debit/{id}', [CombinedLedgerController::class, 'customer_ledger_debit']);
    Route::post('customer_ledger_credit/{id}', [CombinedLedgerController::class, 'customer_ledger_credit']);
    Route::get('admin_seen_ledger/{id}', [CombinedLedgerController::class, 'admin_seen_ledger']);
    Route::get('customer_ledger_edit/{id}', [CombinedLedgerController::class, 'customer_ledger_edit']);
    Route::put('customer_ledger_update', [CombinedLedgerController::class, 'customer_ledger_update']);
    Route::get('customer_ledger_delete/{id}', [CombinedLedgerController::class, 'customer_ledger_delete']);
    Route::get('customer_ledger_search', [CombinedLedgerController::class, 'customer_ledger_search']);

    //================admin user=====================
    Route::get('users', [UserController::class, 'users']);
    Route::get('admins', [UserController::class, 'admins']);
    Route::get('usertype_delete/{id}', [UserController::class, 'Delete']);
    Route::get('usertype_edit/{id}', [UserController::class, 'edit']);
    Route::post('admin_update_user/{id}', [UserController::class, 'update']);
    Route::get('users_search', [UserController::class, 'users_search']);
    Route::get('admins_search', [UserController::class, 'admins_search']);
    //===================admin_contact=========================
    Route::get('admin_contact', [ContactadminController::class, 'admin_contact']);
    Route::get('contact_seen_admin/{id}', [ContactadminController::class, 'contact_seen_admin']);
    Route::get('message_seen/{id}', [ContactadminController::class, 'message_seen']);
    Route::get('contact_search', [ContactadminController::class, 'contact_search']);
    //contact_email_send
    Route::get('contact_email_view/{id}', [EmailController::class, 'contact_email_view']);
    Route::post('/contact_send_email/{id}', [EmailController::class, 'contact_send_email']);

    //======================admin_front_control=========================
    Route::get('admin_front_control', [FrontcontrolController::class, 'admin_front_control']);
    Route::post('front_control_store', [FrontcontrolController::class, 'front_control_store']);
});

//===================================================================================================


//================Frontend Home========================
Route::get('/', [HomeController::class, 'index']);

//===================contact=====================
Route::get('contact', [ContactController::class, 'contact']);
Route::post('contact_submit', [ContactController::class, 'contact_submit']);



//=====================================================================================================================================================================