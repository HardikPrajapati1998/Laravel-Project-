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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/delete/{id}', 'HomeController@delete');

Route::get('/certificate/{id}', 'CertificateController@certificate');

Route::get('/select/{id}', 'HomeController@show');

Route::post('update/{id}', 'HomeController@update');

Route::post('/percentage/update/{id}', 'QuizController@update');

Route::post('/insert', 'RegisterController@insert')->name('insert');

Route::get('generate-pdf', 'HomeController@generatePDF');

Route::get('quiz', 'QuizController@quiz');

Route::get('pdfview',array('as'=>'pdfview','uses'=>'CertificateController@pdfview'));

Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

