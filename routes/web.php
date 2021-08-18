<?php

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/listing/{slug}', 'HomeController@listingShow')->name('listing.show');
Route::get('/category/{category}', 'HomeController@category')->name('category');
Route::get('/help', 'HomeController@careers')->name('careers');
Route::get('/terms', 'HomeController@terms')->name('terms');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/about', 'HomeController@about')->name('about');
Route::post('/contact', 'HomeController@feedback')->name('feedback');
Route::post('/search', 'HomeController@searchListings')->name('search');
Route::post('/newsletter', 'HomeController@newsletter')->name('newsletter');
Route::get('/add_listing', 'HomeController@addListing')->name('add_listing');
Route::post('/save_listing', 'HomeController@saveListing')->name('save_listing');

Route::get('/home', 'HomeController@index');

Auth::routes();


Route::group(['middleware'=>'auth'] ,function()
{
	Route::get('/admin/home', 'AdminController@home')->name('admin.home');
	Route::get('/logout', 'HomeController@logout')->name('logout');


	Route::post('/admin/user/password/{id}', 'UsersController@password')->name('admin.password');
	Route::get('/admin/profile', 'AdminController@profile')->name('admin.profile');



	Route::get('/admin/listing/delete/{id}',
			'ListingController@destroy')->name('admin.listings.destroy');
	Route::resource('admin/listings', 'ListingController', [
		'as' => 'admin',
		'except' => 'destroy'
	]);

	Route::get('/admin/request/delete/{id}',
			'RequestController@destroy')->name('admin.request.destroy');
	Route::resource('admin/requests', 'RequestController', [
		'as' => 'admin',
		'except' => 'destroy'
	]);


	Route::get('/admin/users/delete/{id}',
			'UsersController@destroy')->name('admin.users.destroy');
	Route::resource('admin/users', 'UsersController', [
		'as' => 'admin',
		'except' => 'destroy'
	]);

	Route::get('/admin/feedback', 'FeedbackController@index')->name('admin.feedback.index');
	Route::get('/admin/feedback/delete/{id}', 'FeedbackController@destroy')->name('admin.feedback.destroy');
	Route::get('/admin/feedback/{id}', 'FeedbackController@show')->name('admin.feedback.show');
	Route::get('/admin/newsletter', 'NewsletterController@index')->name('admin.newsletters.index');
	Route::get('/admin/newsletter/{id}', 'NewsletterController@destroy')->name('admin.newsletters.destroy');


	Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
	     \UniSharp\LaravelFilemanager\Lfm::routes();
	});
});
