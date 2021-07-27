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

//Route::get('/', function () {
//    return view('frontend.default.index');
//});


Route::namespace('App\Http\Controllers\Frontend')->group(function (){
    //Route::prefix('{language}')->group(function (){
        Route::any('/','DefaultController@index')->name('frontend.index');
        Route::any('/404','DefaultController@notfound')->name('frontend.notfound');

        Route::any('/blog','BlogController@index')->name('frontend.blog.index');
        Route::any('/blog/{slug?}','BlogController@detail')->name('frontend.blog.detail');
        Route::any('/blog/kategori/{slug?}','BlogController@blogcat')->name('frontend.blogcat.index');

/*ÜRÜNLER 1. GÖSTERİM*/
        Route::any('/urunler','ProductController@indextwo')->name('frontend.product.index');
        Route::any('/urun/kategori/{id?}/{slug?}','ProductController@procattwo')->name('frontend.procat.index');

/*ÜRÜNLER 2. GÖSTERİM*/
//    Route::any('/urunler','ProductController@index')->name('frontend.product.index');
//    Route::any('/urun/{id?}/{slug?}','ProductController@detail')->name('frontend.product.detail');
//    Route::any('/urun/kategori/{id?}/{slug?}','ProductController@procat')->name('frontend.procat.index');

        Route::get('/iletisim','ContactController@index')->name('frontend.default.iletisim');
        Route::post('/iletisim','ContactController@contactsend')->name('contactsend');

        Route::any('/haberler','NewsController@index')->name('frontend.news.index');
        Route::any('/haberler/{slug?}','NewsController@detail')->name('frontend.news.detail');

        Route::any('/bilgi/{slug?}','PageController@detail')->name('frontend.page.detail');
    //});
});

Route::namespace('App\Http\Controllers\Backend')->group(function (){
    Route::prefix('admin')->group(function (){
        Route::any('/dashboard','DefaultController@index')->name('zeplin.index')->middleware('admin');
        Route::any('/','DefaultController@login')->name('zeplin.login')->middleware('loginuser');
        Route::any('/logout','DefaultController@logout')->name('zeplin.logout');
        Route::post('/login','DefaultController@authenticate')->name('zeplin.auth');
    });

    Route::middleware(['admin'])->group(function (){
        Route::prefix('admin/ayarlar/')->group(function (){
            Route::any('','SettingsController@index')->name('zeplin.settings');
            Route::any('sortable','SettingsController@sortable')->name('settings.sortable');
            Route::any('silme/{id}','SettingsController@delete')->name('settings.delete');
            Route::any('duzenle/{id}','SettingsController@edit')->name('settings.edit');
            Route::any('duzenleform/{id}','SettingsController@update')->name('settings.editform');
        });
    });
});

Route::middleware(['admin'])->group(function (){
    Route::namespace('App\Http\Controllers\Backend')->group(function (){
        Route::prefix('admin/')->group(function (){
            //blog
            Route::any('blog/sortable','BlogController@sortable')->name('blog.sortable');
            Route::resource('blog','BlogController');

            //page
            Route::any('page/sortable','PageController@sortable')->name('page.sortable');
            Route::resource('page','PageController');

            //slider
            Route::any('slider/sortable','SliderController@sortable')->name('slider.sortable');
            Route::resource('slider','SliderController');

            //user
            Route::any('user/sortable','UserController@sortable')->name('user.sortable');
            Route::resource('user','UserController');

            //homebox
            Route::any('home/sortable','HomeBoxController@sortable')->name('home.sortable');
            Route::resource('home','HomeBoxController');

            //footer
            Route::any('footer/sortable','FooterController@sortable')->name('footer.sortable');
            Route::resource('footer','FooterController');

            //contact
            Route::any('contact/sortable','ContactController@sortable')->name('contact.sortable');
            Route::resource('contact','ContactController');

            //home settings
            Route::any('homesetting/sortable','HomeSettingsController@sortable')->name('homesetting.sortable');
            Route::resource('homesetting','HomeSettingsController');

            //blog settings
            Route::any('blogoption/sortable','BlogoptionController@sortable')->name('blogoption.sortable');
            Route::resource('blogoption','BlogoptionController');

            //blog category settings
            Route::any('blogcat/sortable','BlogcatsController@sortable')->name('blogcat.sortable');
            Route::resource('blogcat','BlogcatsController');

            //news settings
            Route::any('new/sortable','NewsController@sortable')->name('new.sortable');
            Route::resource('new','NewsController');

            //news settings
            Route::any('newsoption/sortable','NewsoptionController@sortable')->name('newsoption.sortable');
            Route::resource('newsoption','NewsoptionController');

            //product
            Route::any('product/sortable','ProductsController@sortable')->name('product.sortable');
            Route::resource('product','ProductsController');

            //product
            Route::any('productcategory/sortable','ProductCategoriesController@sortable')->name('productcategory.sortable');
            Route::resource('productcategory','ProductCategoriesController');

            //blog settings
            Route::any('productoption/sortable','ProductOptionsController@sortable')->name('productoption.sortable');
            Route::resource('productoption','ProductOptionsController');
        });
    });
});

Auth::routes();

//View::composer('frontend.layout', function ($view) {
//    $view->with('pages', \App\Models\Pages::all()->sortBy('must')->where('status',1));
//});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');