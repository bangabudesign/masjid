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
use App\Http\Controllers\InfaqController;
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
use App\Http\Controllers\Admin\InfaqController as AdminInfaqController;
use App\Http\Controllers\Admin\BankController as AdminBankController;
use App\Http\Controllers\Admin\SupportController as AdminSupportController;
use App\Http\Controllers\Admin\TeamController as AdminTeamController;
use App\Http\Controllers\Admin\BannerController as AdminBannerController;
use App\Http\Controllers\TeamController;
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

Route::get('/personalia', [TeamController::class, 'index'])->name('team.index');

Route::get('/infaq', [InfaqController::class, 'index'])->name('infaq.index');
Route::get('/infaq/{id}', [InfaqController::class, 'form'])->name('infaq.form')->middleware(['auth']);
Route::get('/infaq/{id}/invoice', [InfaqController::class, 'invoice'])->name('infaq.invoice')->middleware(['auth']);
Route::post('/infaq', [InfaqController::class, 'store'])->name('infaq.store')->middleware(['auth']);
Route::put('/infaq/{id}', [InfaqController::class, 'update'])->name('infaq.update')->middleware(['auth']);

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

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    Route::get('statements', [AdminStatementController::class, 'index'])->name('statements.index');
    Route::post('statements', [AdminStatementController::class, 'store'])->name('statements.store');
    Route::get('statements/create', [AdminStatementController::class, 'create'])->name('statements.create');
    Route::get('statements/{id}/edit', [AdminStatementController::class, 'edit'])->name('statements.edit');
    Route::put('statements/{id}', [AdminStatementController::class, 'update'])->name('statements.update');
    Route::delete('statements/{id}', [AdminStatementController::class, 'destroy'])->name('statements.destroy');

    Route::get('posts', [AdminPostController::class, 'index'])->name('posts.index');
    Route::post('posts', [AdminPostController::class, 'store'])->name('posts.store');
    Route::get('posts/create', [AdminPostController::class, 'create'])->name('posts.create');
    Route::get('posts/{id}/edit', [AdminPostController::class, 'edit'])->name('posts.edit');
    Route::put('posts/{id}', [AdminPostController::class, 'update'])->name('posts.update');
    
    Route::get('events', [AdminEventController::class, 'index'])->name('events.index');
    Route::post('events', [AdminEventController::class, 'store'])->name('events.store');
    Route::get('events/create', [AdminEventController::class, 'create'])->name('events.create');
    Route::get('events/{id}/edit', [AdminEventController::class, 'edit'])->name('events.edit');
    Route::put('events/{id}', [AdminEventController::class, 'update'])->name('events.update');
    Route::delete('events/{id}', [AdminEventController::class, 'destroy'])->name('events.destroy');

    Route::get('products', [AdminProductController::class, 'index'])->name('products.index');
    Route::post('products', [AdminProductController::class, 'store'])->name('products.store');
    Route::get('products/create', [AdminProductController::class, 'create'])->name('products.create');
    Route::get('products/{id}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
    Route::put('products/{id}', [AdminProductController::class, 'update'])->name('products.update');

    Route::get('vendors', [AdminVendorController::class, 'index'])->name('vendors.index');
    Route::get('vendors/{id}/edit', [AdminVendorController::class, 'edit'])->name('vendors.edit');
    Route::put('vendors/{id}', [AdminVendorController::class, 'update'])->name('vendors.update');

    Route::get('spots', [AdminSpotController::class, 'index'])->name('spots.index');
    Route::post('spots', [AdminSpotController::class, 'store'])->name('spots.store');
    Route::get('spots/create', [AdminSpotController::class, 'create'])->name('spots.create');
    Route::get('spots/{id}/edit', [AdminSpotController::class, 'edit'])->name('spots.edit');
    Route::put('spots/{id}', [AdminSpotController::class, 'update'])->name('spots.update');
    
    Route::get('bookings', [AdminBookingController::class, 'index'])->name('bookings.index');
    Route::post('bookings', [AdminBookingController::class, 'store'])->name('bookings.store');
    Route::get('bookings/create', [AdminBookingController::class, 'create'])->name('bookings.create');
    Route::get('bookings/{id}', [AdminBookingController::class, 'show'])->name('bookings.show');
    Route::get('bookings/{id}/edit', [AdminBookingController::class, 'edit'])->name('bookings.edit');
    Route::put('bookings/{id}', [AdminBookingController::class, 'update'])->name('bookings.update');

    Route::get('infaq', [AdminInfaqController::class, 'index'])->name('infaq.index');
    Route::post('infaq', [AdminInfaqController::class, 'store'])->name('infaq.store');
    Route::get('infaq/create', [AdminInfaqController::class, 'create'])->name('infaq.create');
    Route::get('infaq/{id}', [AdminInfaqController::class, 'show'])->name('infaq.show');
    Route::get('infaq/{id}/edit', [AdminInfaqController::class, 'edit'])->name('infaq.edit');
    Route::put('infaq/{id}', [AdminInfaqController::class, 'update'])->name('infaq.update');

    Route::get('banks', [AdminBankController::class, 'index'])->name('banks.index');
    Route::post('banks', [AdminBankController::class, 'store'])->name('banks.store');
    Route::get('banks/create', [AdminBankController::class, 'create'])->name('banks.create');
    Route::get('banks/{id}/edit', [AdminBankController::class, 'edit'])->name('banks.edit');
    Route::put('banks/{id}', [AdminBankController::class, 'update'])->name('banks.update');

    Route::get('supports', [AdminSupportController::class, 'index'])->name('supports.index');
    Route::post('supports', [AdminSupportController::class, 'store'])->name('supports.store');
    Route::get('supports/create', [AdminSupportController::class, 'create'])->name('supports.create');
    Route::get('supports/{id}/edit', [AdminSupportController::class, 'edit'])->name('supports.edit');
    Route::put('supports/{id}', [AdminSupportController::class, 'update'])->name('supports.update');

    Route::get('teams', [AdminTeamController::class, 'index'])->name('teams.index');
    Route::post('teams', [AdminTeamController::class, 'store'])->name('teams.store');
    Route::get('teams/create', [AdminTeamController::class, 'create'])->name('teams.create');
    Route::get('teams/{id}/edit', [AdminTeamController::class, 'edit'])->name('teams.edit');
    Route::put('teams/{id}', [AdminTeamController::class, 'update'])->name('teams.update');
    Route::delete('teams/{id}', [AdminTeamController::class, 'destroy'])->name('teams.destroy');

    Route::get('banners', [AdminBannerController::class, 'index'])->name('banners.index');
    Route::post('banners', [AdminBannerController::class, 'store'])->name('banners.store');
    Route::get('banners/create', [AdminBannerController::class, 'create'])->name('banners.create');
    Route::get('banners/{id}/edit', [AdminBannerController::class, 'edit'])->name('banners.edit');
    Route::put('banners/{id}', [AdminBannerController::class, 'update'])->name('banners.update');

    Route::get('payments/{paymentable_type}/{paymentable_id}/create', [AdminPaymentController::class, 'create'])->name('payments.create');
    Route::post('payments/{paymentable_type}/{paymentable_id}', [AdminPaymentController::class, 'store'])->name('payments.store');
    Route::get('payments/{paymentable_type}/{paymentable_id}/{id}/edit', [AdminPaymentController::class, 'edit'])->name('payments.edit');
    Route::put('payments/{paymentable_type}/{paymentable_id}/{id}', [AdminPaymentController::class, 'update'])->name('payments.update');
    
    Route::post('images', [AdminImageController::class, 'store'])->name('images.store');
    Route::delete('images/{id}', [AdminImageController::class, 'destroy'])->name('images.destroy');
});

Auth::routes();

