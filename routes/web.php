<?php

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

Auth::routes();


//Home
Route::get('/', [App\Http\Controllers\Frontend\HomeFrontendController::class, 'homePageLoad'])->name('frontend.home');
//Stores
Route::get('/stores/{id}/{title}', [App\Http\Controllers\Frontend\StoresController::class, 'getStoresData'])->name('frontend.stores');
Route::get('/frontend/getStoresGrid', [App\Http\Controllers\Frontend\StoresController::class, 'getStoresGrid'])->name('frontend.getStoresGrid');


Route::prefix('backend')->group(function(){

	//Not Found Page
	Route::get('/notfound', [App\Http\Controllers\HomeController::class, 'notFoundPage'])->name('backend.notfound')->middleware('auth');

	//Dashboard
	Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'getDashboardData'])->name('backend.dashboard')->middleware(['auth','is_admin']);
	Route::post('/MediaUpload', [App\Http\Controllers\Backend\UploadController::class, 'MediaUpload'])->name('backend.MediaUpload')->middleware(['auth','is_admin']);

	
	
	

	//Sellers Page
	Route::get('/sellers', [App\Http\Controllers\Backend\SellerController::class, 'getSellersPageLoad'])->name('backend.sellers')->middleware(['auth','is_admin']);
	Route::get('/getSellersTableData', [App\Http\Controllers\Backend\SellerController::class, 'getSellersTableData'])->name('backend.getSellersTableData')->middleware(['auth','is_admin']);
	Route::post('/saveSellersData', [App\Http\Controllers\Backend\SellerController::class, 'saveSellersData'])->name('backend.saveSellersData')->middleware(['auth','is_admin']);
	Route::post('/getSellerById', [App\Http\Controllers\Backend\SellerController::class, 'getSellerById'])->name('backend.getSellerById')->middleware(['auth','is_admin']);
	Route::post('/deleteSeller', [App\Http\Controllers\Backend\SellerController::class, 'deleteSeller'])->name('backend.deleteSeller')->middleware(['auth','is_admin']);
	Route::post('/bulkActionSellers', [App\Http\Controllers\Backend\SellerController::class, 'bulkActionSellers'])->name('backend.bulkActionSellers')->middleware(['auth','is_admin']);
	//Users Page
	Route::get('/users', [App\Http\Controllers\Backend\UsersController::class, 'getUsersPageLoad'])->name('backend.users')->middleware(['auth','is_admin']);
	Route::get('/getUsersTableData', [App\Http\Controllers\Backend\UsersController::class, 'getUsersTableData'])->name('backend.getUsersTableData')->middleware(['auth','is_admin']);
	Route::post('/saveUsersData', [App\Http\Controllers\Backend\UsersController::class, 'saveUsersData'])->name('backend.saveUsersData')->middleware(['auth','is_admin']);
	Route::post('/getUserById', [App\Http\Controllers\Backend\UsersController::class, 'getUserById'])->name('backend.getUserById')->middleware(['auth','is_admin']);
	Route::post('/deleteUser', [App\Http\Controllers\Backend\UsersController::class, 'deleteUser'])->name('backend.deleteUser')->middleware(['auth','is_admin']);
	Route::post('/bulkActionUsers', [App\Http\Controllers\Backend\UsersController::class, 'bulkActionUsers'])->name('backend.bulkActionUsers')->middleware(['auth','is_admin']);

	//Profile Page
	Route::get('/profile', [App\Http\Controllers\Backend\UsersController::class, 'getProfilePageLoad'])->name('backend.profile')->middleware(['auth','is_admin']);
	Route::post('/profileUpdate', [App\Http\Controllers\Backend\UsersController::class, 'profileUpdate'])->name('backend.profileUpdate')->middleware(['auth','is_admin']);

	//Media Page
	Route::get('/media', [App\Http\Controllers\Backend\MediaController::class, 'getMediaPageLoad'])->name('backend.media')->middleware(['auth','is_admin']);
	Route::post('/getMediaById', [App\Http\Controllers\Backend\MediaController::class, 'getMediaById'])->name('backend.getMediaById')->middleware(['auth','is_admin']);
	Route::post('/mediaUpdate', [App\Http\Controllers\Backend\MediaController::class, 'mediaUpdate'])->name('backend.mediaUpdate')->middleware(['auth','is_admin']);
	Route::post('/onMediaDelete', [App\Http\Controllers\Backend\MediaController::class, 'onMediaDelete'])->name('backend.onMediaDelete')->middleware(['auth','is_admin']);
	Route::get('/getGlobalMediaData', [App\Http\Controllers\Backend\MediaController::class, 'getGlobalMediaData'])->name('backend.getGlobalMediaData')->middleware(['auth','is_admin']);
	Route::get('/getMediaPaginationData', [App\Http\Controllers\Backend\MediaController::class, 'getMediaPaginationData'])->name('backend.getMediaPaginationData')->middleware(['auth','is_admin']);

	
	//Products
	Route::get('/products', [App\Http\Controllers\Backend\ProductsController::class, 'getProductsPageLoad'])->name('backend.products')->middleware(['auth','is_admin']);
	Route::get('/getProductsTableData', [App\Http\Controllers\Backend\ProductsController::class, 'getProductsTableData'])->name('backend.getProductsTableData')->middleware(['auth','is_admin']);
	Route::post('/saveProductsData', [App\Http\Controllers\Backend\ProductsController::class, 'saveProductsData'])->name('backend.saveProductsData')->middleware(['auth','is_admin']);
	Route::post('/deleteProducts', [App\Http\Controllers\Backend\ProductsController::class, 'deleteProducts'])->name('backend.deleteProducts')->middleware(['auth','is_admin']);
	Route::post('/bulkActionProducts', [App\Http\Controllers\Backend\ProductsController::class, 'bulkActionProducts'])->name('backend.bulkActionProducts')->middleware(['auth','is_admin']);
	Route::post('/hasProductSlug', [App\Http\Controllers\Backend\ProductsController::class, 'hasProductSlug'])->name('backend.hasProductSlug')->middleware(['auth','is_admin']);
	//Update
	Route::get('/product/{id}', [App\Http\Controllers\Backend\ProductsController::class, 'getProductPageData'])->name('backend.product')->middleware(['auth','is_admin']);
	Route::post('/updateProductsData', [App\Http\Controllers\Backend\ProductsController::class, 'updateProductsData'])->name('backend.updateProductsData')->middleware(['auth','is_admin']);
	
	//Product Images
	Route::get('/product-images/{id}', [App\Http\Controllers\Backend\ProductsController::class, 'getProductImagesPageData'])->name('backend.product-images')->middleware(['auth','is_admin']);
	Route::get('/getProductImagesTableData', [App\Http\Controllers\Backend\ProductsController::class, 'getProductImagesTableData'])->name('backend.getProductImagesTableData')->middleware(['auth','is_admin']);
	Route::post('/saveProductImagesData', [App\Http\Controllers\Backend\ProductsController::class, 'saveProductImagesData'])->name('backend.saveProductImagesData')->middleware(['auth','is_admin']);
	Route::post('/deleteProductImages', [App\Http\Controllers\Backend\ProductsController::class, 'deleteProductImages'])->name('backend.deleteProductImages')->middleware(['auth','is_admin']);


});

Route::prefix('seller')->group(function(){
	
	//Dashboard
	Route::get('/dashboard', [App\Http\Controllers\Seller\DashboardController::class, 'getDashboardData'])->name('seller.dashboard')->middleware(['auth','is_seller']);

	
	//Products
	Route::get('/products', [App\Http\Controllers\Seller\ProductsController::class, 'getProductsPageLoad'])->name('seller.products')->middleware(['auth','is_seller']);
	Route::get('/getProductsTableData', [App\Http\Controllers\Seller\ProductsController::class, 'getProductsTableData'])->name('seller.getProductsTableData')->middleware(['auth','is_seller']);
	Route::post('/saveProductsData', [App\Http\Controllers\Seller\ProductsController::class, 'saveProductsData'])->name('seller.saveProductsData')->middleware(['auth','is_seller']);
	Route::post('/deleteProducts', [App\Http\Controllers\Seller\ProductsController::class, 'deleteProducts'])->name('seller.deleteProducts')->middleware(['auth','is_seller']);
	Route::post('/bulkActionProducts', [App\Http\Controllers\Seller\ProductsController::class, 'bulkActionProducts'])->name('seller.bulkActionProducts')->middleware(['auth','is_seller']);
	Route::post('/hasProductSlug', [App\Http\Controllers\Seller\ProductsController::class, 'hasProductSlug'])->name('seller.hasProductSlug')->middleware(['auth','is_seller']);
	//Update
	Route::get('/product/{id}', [App\Http\Controllers\Seller\ProductsController::class, 'getProductPageData'])->name('seller.product')->middleware(['auth','is_seller']);
	Route::post('/updateProductsData', [App\Http\Controllers\Seller\ProductsController::class, 'updateProductsData'])->name('seller.updateProductsData')->middleware(['auth','is_seller']);


	
	//Product Images
	Route::get('/product-images/{id}', [App\Http\Controllers\Seller\ProductsController::class, 'getProductImagesPageData'])->name('seller.product-images')->middleware(['auth','is_seller']);
	Route::get('/getProductImagesTableData', [App\Http\Controllers\Seller\ProductsController::class, 'getProductImagesTableData'])->name('seller.getProductImagesTableData')->middleware(['auth','is_seller']);
	Route::post('/saveProductImagesData', [App\Http\Controllers\Seller\ProductsController::class, 'saveProductImagesData'])->name('seller.saveProductImagesData')->middleware(['auth','is_seller']);
	Route::post('/deleteProductImages', [App\Http\Controllers\Seller\ProductsController::class, 'deleteProductImages'])->name('seller.deleteProductImages')->middleware(['auth','is_seller']);


	//All File Upload
	Route::post('/MediaUpload', [App\Http\Controllers\Backend\UploadController::class, 'MediaUpload'])->name('seller.MediaUpload')->middleware(['auth','is_seller']);


});

