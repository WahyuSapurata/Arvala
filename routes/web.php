<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', 'Dashboard@index')->name('home.index');

    Route::get('/', 'Landing@home')->name('home');

    Route::get('/detail-product/{params}', 'Landing@detail_product')->name('detail-product');

    Route::get('/shop', 'Landing@shop')->name('shop');

    Route::get('/about', 'Landing@about')->name('about');

    Route::get('/faqs', 'Landing@faqs')->name('faqs');

    Route::get('/lisensi', 'Landing@lisensi')->name('lisensi');

    Route::get('/term', 'Landing@Term')->name('term');

    Route::group(['prefix' => 'login', 'middleware' => ['guest'], 'as' => 'login.'], function () {
        Route::get('/login-akun', 'Auth@show')->name('login-akun');
        Route::post('/login-proses', 'Auth@login_proses')->name('login-proses');
    });

    Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
        Route::get('/dashboard-admin', 'Dashboard@dashboard_admin')->name('dashboard-admin');

        Route::get('/kategori', 'KategoriController@index')->name('kategori');
        Route::get('/kategori-get', 'KategoriController@get')->name('kategori-get');
        Route::post('/kategori-add', 'KategoriController@add')->name('kategori-add');
        Route::get('/kategori-show/{params}', 'KategoriController@show')->name('kategori-show');
        Route::post('/kategori-edit/{params}', 'KategoriController@edit')->name('kategori-edit');
        Route::delete('/kategori-delete/{params}', 'KategoriController@delete')->name('kategori-delete');

        Route::get('/product', 'ProductController@index')->name('product');
        Route::get('/get-product', 'ProductController@get')->name('get-product');
        Route::get('/add-product', 'ProductController@add')->name('add-product');
        Route::post('/store-product', 'ProductController@store')->name('store-product');
        Route::get('/edit-product/{params}', 'ProductController@edit')->name('edit-product');
        Route::post('/update-product/{params}', 'ProductController@update')->name('update-product');
        Route::delete('/delete-product/{params}', 'ProductController@delete')->name('delete-product');
        Route::get('/button-product/{params}', 'ProductController@update_tombol')->name('button-product');

        // Rute yang hilang untuk mengecek diskon
        Route::get('/diskon-produk/check/{productUuid}', 'DiskonProdukController@checkProductDiscount')->name('diskon.check');
        Route::get('/diskon-produk', 'DiskonProdukController@index')->name('diskon.index');
        Route::post('/diskon-produk/store', 'DiskonProdukController@store')->name('diskon.store');
        Route::get('/diskon-produk/show/{uuid}', 'DiskonProdukController@show')->name('diskon.show');
        Route::put('/diskon-produk/update/{uuid}', 'DiskonProdukController@update')->name('diskon.update');
        Route::delete('/diskon-produk/delete/{uuid}', 'DiskonProdukController@destroy')->name('diskon.destroy');

        // Rute Bundle Produk
        Route::get('/product-bundle/get/{uuid}', 'ProductBundleController@getBundle')->name('product-bundle.get');
        Route::post('/product-bundle/store', 'ProductBundleController@storeBundle')->name('product-bundle.store');
    });

    Route::get('/logout', 'Auth@logout')->name('logout');
});
