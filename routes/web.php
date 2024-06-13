<?php

use App\Models\Penjual;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DokuPaymentController;
use App\Http\Controllers\PenjualUlasanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('about', function () {
    return view('layouts.about');
})->name('about');
Route::get('contact', function () {
    return view('layouts.contact');
})->name('contact');
Route::get('shop', function () {
    return view('layouts.shop');
})->name('shop');



Route::get('toko', function () {
    return view('layouts.toko');
})->name('toko');

Route::get('cart', function () {
    return view('layouts.cart'); // Mengarahkan ke view 'layouts.cart'
})->name('cart'); // Memberikan nama 'cart' pada rute ini

Route::get('checkout', function () {
    return view('layouts.checkout');
})->name('checkout');

Route::get('thankyou', function () {
    return view('layouts.thankyou');
})->name('thankyou');


Route::get('/', [ShowController::class, 'index'])->name('home');


Route::get('/search', [ShowController::class, 'search'])->name('search');
Route::get('/search-results', [ShowController::class, 'searchResults'])->name('search.results');




Route::get('rumah',[SesiController::class,'index']);


Route::get('/shop_detail', [ProdukController::class, 'index'])->name('shop_detail');
Route::post('/toko', [ProdukController::class, 'store'])->name('produk.store');
//TOKO
Route::get('/toko/{id}', [ShowController::class, 'showToko'])->name('toko.show');



Route::middleware(['auth','userAkses:admin'])->group(function () 
{
Route::get('/admin', [AdminController::class, 'admin'])->name('admin.dashboard');
Route::get('/admin/penjual', [AdminController::class, 'akun_penjual'])->name('admin.penjual');
Route::get('/admin/pembeli', [AdminController::class, 'pembeli'])->name('admin.pembeli');
Route::delete('/admin/pembeli/{id}', [AdminController::class, 'deletePembeli'])->name('admin.pembeli.delete');
Route::patch('/admin/pembeli/{id}/deactivate', [AdminController::class, 'deactivatePembeli'])->name('admin.pembeli.deactivate');
Route::patch('/admin/pembeli/{id}/activate', [AdminController::class, 'activatePembeli'])->name('admin.pembeli.activate');

Route::patch('/admin/penjual/{id}/deactivate', [AdminController::class, 'deactivatepenjual'])->name('admin.penjual.deactivate');
Route::patch('/admin/penjual/{id}/activate', [AdminController::class, 'activatepenjual'])->name('admin.penjual.activate');


Route::patch('/admin/penjual/{id}/verify', [AdminController::class, 'verify'])->name('admin.penjual.verify');
Route::patch('/admin/penjual/{id}/unverify', [AdminController::class, 'unverify'])->name('admin.penjual.unverify');

//ADMIN
Route::get('/admin/kategori', [KategoriController::class, 'kategori'])->name('kategori');
Route::get('/admin/tambahkategori', [KategoriController::class, 'tambahkategori'])->name('tambahkategori');
Route::post('/admin/storekategori', [KategoriController::class, 'storekategori'])->name('storekategori');
Route::get('/admin/editkategori/{id}', [KategoriController::class, 'editkategori'])->name('editkategori');
Route::put('/admin/updatekategori/{id}', [KategoriController::class, 'updatekategori'])->name('updatekategori');
Route::delete('/admin/deletekategori/{id}', [KategoriController::class, 'deletekategori'])->name('deletekategori');

//Caraousel
    Route::get('/carousel', [CarouselController::class, 'index'])->name('carousel.index');
    Route::get('/carousel/create', [CarouselController::class, 'create'])->name('carousel.create');
    Route::post('/carousel', [CarouselController::class, 'store'])->name('caraousel.store');
    Route::get('/carousel/{carousel}/edit', [CarouselController::class, 'edit'])->name('caraousel.edit');
    Route::put('/carousel/{carousel}', [CarouselController::class, 'update'])->name('caraousel.update');
    Route::delete('/carousel/{carousel}', [CarouselController::class, 'destroy'])->name('caraousel.destroy');

//Ulasan Admin

    // Route::get('ulasan', [UlasanController::class, 'index'])->name('ulasan.admin');
    // Route::get('ulasan/{id}/hide', [UlasanController::class, 'hide'])->name('ulasan.hide'); 
    // Route::get('ulasan/{id}/unhide', [UlasanController::class, 'unhide'])->name('ulasan.unhide');

    Route::prefix('admin')->group(function() {
        Route::get('ulasan', [UlasanController::class, 'index'])->name('ulasan.admin');
        Route::get('ulasan/{id}/hide', [UlasanController::class, 'hide'])->name('ulasan.hide'); 
        Route::get('ulasan/{id}/unhide', [UlasanController::class, 'unhide'])->name('ulasan.unhide');

        Route::get('/carousel', [CarouselController::class, 'index'])->name('carousel.index');
        Route::get('/carousel/create', [CarouselController::class, 'create'])->name('carousel.create');
        Route::post('/carousel', [CarouselController::class, 'store'])->name('caraousel.store');
        Route::get('/carousel/{carousel}/edit', [CarouselController::class, 'edit'])->name('caraousel.edit');
        Route::put('/carousel/{carousel}', [CarouselController::class, 'update'])->name('caraousel.update');
        Route::delete('/carousel/{carousel}', [CarouselController::class, 'destroy'])->name('caraousel.destroy');
    });

});

Route::middleware(['auth','userAkses:penjual'])->group(function () 
{
    Route::get('/penjual', [PenjualController::class, 'penjual'])->name('penjual.dashboard');
    Route::get('/penjual/produk', [PenjualController::class, 'produk'])->name('penjual.produk');
    //
    Route::post('/penjual/produk', [ProdukController::class, 'store'])->name('penjual.produk.store');
    Route::get('/penjual/produk/create', [ProdukController::class, 'create'])->name('penjual.produk.create');

    //
    Route::get('/penjual/profile', [PenjualController::class, 'showProfile'])->name('penjual.profile');
    Route::put('/profile/update', [PenjualController::class, 'update'])->name('profile.update');

    // Route::get('/penjual/pesanan', [PenjualController::class, 'pesanan'])->name('penjual.pesanan');
    Route::get('/penjual/ulasan', [PenjualController::class, 'ulasan'])->name('penjual.ulasan');


    Route::post('/produk/{id}/update', [ProdukController::class, 'update'])->name('produk.update');
    Route::get('/produk/{id}', [ProdukController::class, 'edit'])->name('produk.edit');

    // Delete
    Route::post('/produk/{id}/hide', [ProdukController::class, 'hide'])->name('produk.hide');
    Route::post('/produk/{id}/unhide', [ProdukController::class, 'unhide'])->name('produk.unhide');

    //Ulasan Penjual
    Route::prefix('penjual')->group(function() {
        Route::get('ulasan', [PenjualUlasanController::class, 'index'])->name('penjual.ulasan');
        Route::get('ulasan/{id}/hide', [PenjualUlasanController::class, 'hide'])->name('penjual.ulasan.hide');
        Route::get('ulasan/{id}/unhide', [PenjualUlasanController::class, 'unhide'])->name('penjual.ulasan.unhide');
    });

});

Route::get('/shop_detail/{produk_id}', [ShowController::class, 'showDetail'])->name('shop_detail');


// Route::get('/doku-payment', [DokuPaymentController::class, 'checkoutPayment']);

Route::prefix('/doku-payment')->group(function () {
    Route::get('/', [DokuPaymentController::class, 'checkoutPayment'])->name('doku');
});


Route::middleware(['auth'])->group(function () 
{
    
Route::get('layouts/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('layouts/cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::delete('cart/{cart}/remove', [CartController::class, 'remove'])->name('cart.remove');    
Route::post('cart/{cartId}/update', [CartController::class, 'updateQuantity'])->name('cart.update');

Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.showPembeli');

Route::put('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

Route::get('/checkout/latest', [OrderController::class, 'showLatestOrder'])->name('checkout.latest');

Route::post('/orders/{id}/uploadBuktiTransaksi', [OrderController::class, 'uploadBuktiTransaksi'])->name('orders.uploadBuktiTransaksi');

Route::get('/history', [App\Http\Controllers\OrderController::class, 'history'])->name('history');
    
Route::get('/store/{id}', [ShowController::class, 'showToko'])->name('store');

// web.php (Routing)
// Route::post('/orders/{order}/uploadBuktiTransaksiPerToko/{store}', 'OrderController@uploadBuktiTransaksiPerToko')->name('orders.uploadBuktiTransaksiPerToko');
Route::post('/orders/{order}/uploadBuktiTransaksiPerToko/{store}', [OrderController::class, 'uploadBuktiTransaksiPerToko'])->name('orders.uploadBuktiTransaksiPerToko');

});







Route::get('admin/persetujuan', [AdminController::class,'index'])->name('admin.orders.index');
Route::put('admin/orders/{id}', [AdminController::class,'updateStatusTransaksi'])->name('admin.orders.updateStatus');


Route::post('/sellers/store', [AdminController::class, 'store'])->name('sellers.store');

//Ulasan
Route::get('produk/{produk_id}/ulasan', [UlasanController::class, 'indexUlasan'])->name('ulasan.index');
Route::post('ulasan/store', [UlasanController::class, 'storeUlasan'])->name('ulasan.store');

Route::get('/kategori/{kategori_id}', [KategoriController::class, 'show'])->name('kategori.show');




Route::get('/penjual/pesanan', [OrderController::class, 'index'])->name('orders.index');
Route::get('/penjual/pesanan/{id}', [OrderController::class, 'showDetail'])->name('orders.showPembeli');


// Shop
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/sort', [ShopController::class, 'shop'])->name('shop.sort');


require __DIR__.'/auth.php';
