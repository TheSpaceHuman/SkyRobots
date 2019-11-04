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


Auth::routes();

Route::get('/', 'PagesController@index')->name('page.index');
Route::get('/referral/{code}', 'PagesController@referralsRegistrations')->name('page.referralsRegistrations');

Route::middleware(['auth'])->group(function () {
  Route::get('/dashboard', 'PagesController@dashboard')->name('page.dashboard');
  Route::get('/profile', 'PagesController@profile')->name('page.profile');
  Route::get('/licenses', 'PagesController@licenses')->name('page.licenses');
  Route::get('/partners', 'PagesController@partners')->name('page.partners');
  Route::get('/opportunities', 'PagesController@opportunities')->name('page.opportunities');
  Route::get('/income', 'PagesController@income')->name('page.income');
  Route::get('/webinars', 'PagesController@webinars')->name('page.webinars');
  Route::get('/materials', 'PagesController@materials')->name('page.materials');
  Route::get('/instructions', 'PagesController@instructions')->name('page.instructions');


  //Actions
  Route::put('/profile/{id}/update', 'PagesActionsController@userUpdate')->name('action.userUpdate');


});
//Actions
Route::post('/email/index-form', 'MailController@indexForm')->name('action.indexForm');


// Admin
Route::middleware(['admin'])->group(function () {
  Route::get('admin/dashboard', 'AdminPagesController@dashboard')->name('admin.page.dashboard');
  Route::get('admin/payments', 'AdminPagesController@payments')->name('admin.page.payments');
  Route::get('admin/purchases', 'AdminPagesController@purchases')->name('admin.page.purchases');
  Route::get('admin/rates', 'AdminPagesController@rates')->name('admin.page.rates');
  Route::resource('admin/news', 'NewsController');
  Route::get('admin/news', 'AdminPagesController@news')->name('admin.page.news');
  Route::get('clients', 'AdminPagesController@clients')->name('admin.page.clients');


});