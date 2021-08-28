<?php

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
use Illuminate\Http\Request;


// Main Page
Route::get('/', 'MainController@main')->name("main.page");


// Email Verification
Auth::routes(['verify'=>true]);
Route::post('/email/resend', 'HomeController@resend')->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// Dictation Page
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

// Check Page
Route::post("check", "MainController@check")->name("check");

// Dictation Result
Route::get("/dictation/{id}/", "MainController@dictation")->name("dictation");
Route::get('/error/', 'MainController@error')->name("error");

// Profile
Route::group(['middleware' => ['check_profile']],
function() {
	Route::get("profile/", "ProfileController@profilePage")->name('profile.page');
	Route::post('profile/image-upload', 'ProfileController@imageUpload')->name('profile.image.upload');
	Route::put('profile/name-update', 'ProfileController@nameUpdate')->name('profile.name.update');
});


// Admin
//Route::group(['middleware' => ['role:admin']], function() {
	Route::get("admin/", "AdminController@homePage")->name("admin.home");

	// Users
	Route::get("admin/users", "UsersController@usersPage")->name("admin.users");
	Route::delete("admin/delete-users/{user}", "UsersController@deleteUser")->name('admin.delete.user');

	// Dictation
	Route::get("admin/dictations","DictationController@dictationsPage")->name("admin.dictations");
	Route::post("admin/update-dictation/{id?}", "DictationController@updateDictation")->name("admin.update.dictation");

	// Dictation Results
	Route::get("admin/dictation-results","DictationResultsController@dictationResultsPage")->name("admin.dictation_results");
	Route::delete('admin/delete-dictation-result/{id}', "DictationResultsController@deleteDictationResult")->name("admin.delete.dictation_result");
	Route::post('admin/dictation-results/fetch', 'DictationResultsController@fetch')->name('admin.dictation_results.fetch');
//});

// Vk
Route::get('vk/auth', 'SocialController@index')->name('vk.auth');
Route::get('vk/auth/callback', 'SocialController@callback');
