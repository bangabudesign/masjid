<?php

// user controller
use App\Http\Controllers\SpotController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StatementController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\VendorController;
// admin controller
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\StatementController as AdminStatementController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\SpotController as AdminSpotController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;
use App\Http\Controllers\Admin\ImageController as AdminImageController;
use App\Http\Controllers\Admin\VendorController as AdminVendorController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profil', function () {
    $page_title = 'Profil';
    return view('profile', [
        'page_title' => $page_title,
    ]);
})->name('profile');

Route::get('/pemulasaraan-jenazah', function () {
    $page_title = 'Pemulasaraan Jenazah';
    $sub_title = 'Prosedur perawatan jenazah dilakukan sesuai syariat islam serta sesuai dengan permintaan keluarga/pemohon.';
    return view('pemulasaraan_jenazah', [
        'page_title' => $page_title,
        'sub_title' => $sub_title,
    ]);
})->name('pemulasaraan');

Route::get('/laporan-keuangan', [StatementController::class, 'index'])->name('statement.index');

Route::get('/vendor-pernikahan', [VendorController::class, 'index'])->name('vendors.index');
Route::get('/vendor-pernikahan/daftar', [VendorController::class, 'create'])->name('vendors.create')->middleware(['auth']);
Route::post('/vendor-pernikahan/daftar', [VendorController::class, 'store'])->name('vendors.store')->middleware(['auth']);
Route::get('/vendor-pernikahan/daftar/success', [VendorController::class, 'thanks'])->name('vendors.thanks')->middleware(['auth']);
Route::get('/vendor-pernikahan/{username}', [VendorController::class, 'show'])->name('vendors.show');

Route::get('/agenda', [EventController::class, 'index'])->name('event.index');
Route::get('/agenda/{slug}', [EventController::class, 'show'])->name('event.show');

Route::get('/berita', [PostController::class, 'index'])->name('post.index');
Route::get('/berita/{slug}', [PostController::class, 'show'])->name('post.show');

Route::get('/booking', [SpotController::class, 'index'])->name('spot.index');
Route::get('/booking/{slug}', [SpotController::class, 'show'])->name('spot.show');

Route::get('/produk', [ProductController::class, 'index'])->name('product.index');

Route::get('/keranjang', [ShopController::class, 'index'])->name('shop.cart');

Route::middleware(['auth'])->group(function () {
    Route::get('/booking/{spot_id}/form', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking/{spot_id}/form', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/{booking_id}/thanks', [BookingController::class, 'thanks'])->name('booking.thanks');
});

Route::prefix('member')->middleware(['auth'])->group(function () {
    Route::get('/bookings/list', [BookingController::class, 'list'])->name('member.bookings.list');
    Route::get('/bookings/{id}', [BookingController::class, 'show'])->name('member.bookings.show');

    Route::get('payments/{paymentable_type}/{paymentable_id}/create', [PaymentController::class, 'create'])->name('member.payments.create');
    Route::post('payments/{paymentable_type}/{paymentable_id}', [PaymentController::class, 'store'])->name('member.payments.store');
});
// admin route

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    
    Route::get('statements', [AdminStatementController::class, 'index'])->name('admin.statements.index');
    Route::post('statements', [AdminStatementController::class, 'store'])->name('admin.statements.store');
    Route::get('statements/create', [AdminStatementController::class, 'create'])->name('admin.statements.create');
    Route::get('statements/{id}/edit', [AdminStatementController::class, 'edit'])->name('admin.statements.edit');
    Route::put('statements/{id}', [AdminStatementController::class, 'update'])->name('admin.statements.update');

    Route::get('posts', [AdminPostController::class, 'index'])->name('admin.posts.index');
    Route::post('posts', [AdminPostController::class, 'store'])->name('admin.posts.store');
    Route::get('posts/create', [AdminPostController::class, 'create'])->name('admin.posts.create');
    Route::get('posts/{id}/edit', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
    Route::put('posts/{id}', [AdminPostController::class, 'update'])->name('admin.posts.update');
    
    Route::get('events', [AdminEventController::class, 'index'])->name('admin.events.index');
    Route::post('events', [AdminEventController::class, 'store'])->name('admin.events.store');
    Route::get('events/create', [AdminEventController::class, 'create'])->name('admin.events.create');
    Route::get('events/{id}/edit', [AdminEventController::class, 'edit'])->name('admin.events.edit');
    Route::put('events/{id}', [AdminEventController::class, 'update'])->name('admin.events.update');

    Route::get('products', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::post('products', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::get('products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::get('products/{id}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('products/{id}', [AdminProductController::class, 'update'])->name('admin.products.update');

    Route::get('vendors', [AdminVendorController::class, 'index'])->name('admin.vendors.index');
    Route::get('vendors/{id}/edit', [AdminVendorController::class, 'edit'])->name('admin.vendors.edit');
    Route::put('vendors/{id}', [AdminVendorController::class, 'update'])->name('admin.vendors.update');

    Route::get('spots', [AdminSpotController::class, 'index'])->name('admin.spots.index');
    Route::post('spots', [AdminSpotController::class, 'store'])->name('admin.spots.store');
    Route::get('spots/create', [AdminSpotController::class, 'create'])->name('admin.spots.create');
    Route::get('spots/{id}/edit', [AdminSpotController::class, 'edit'])->name('admin.spots.edit');
    Route::put('spots/{id}', [AdminSpotController::class, 'update'])->name('admin.spots.update');
    
    Route::get('bookings', [AdminBookingController::class, 'index'])->name('admin.bookings.index');
    Route::post('bookings', [AdminBookingController::class, 'store'])->name('admin.bookings.store');
    Route::get('bookings/create', [AdminBookingController::class, 'create'])->name('admin.bookings.create');
    Route::get('bookings/{id}', [AdminBookingController::class, 'show'])->name('admin.bookings.show');
    Route::get('bookings/{id}/edit', [AdminBookingController::class, 'edit'])->name('admin.bookings.edit');
    Route::put('bookings/{id}', [AdminBookingController::class, 'update'])->name('admin.bookings.update');

    Route::get('payments/{paymentable_type}/{paymentable_id}/create', [AdminPaymentController::class, 'create'])->name('admin.payments.create');
    Route::post('payments/{paymentable_type}/{paymentable_id}', [AdminPaymentController::class, 'store'])->name('admin.payments.store');
    Route::get('payments/{paymentable_type}/{paymentable_id}/{id}/edit', [AdminPaymentController::class, 'edit'])->name('admin.payments.edit');
    Route::put('payments/{paymentable_type}/{paymentable_id}/{id}', [AdminPaymentController::class, 'update'])->name('admin.payments.update');
    
    Route::post('images', [AdminImageController::class, 'store'])->name('admin.images.store');
});

Auth::routes();

