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

use App\Mail\MailtrapExample;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});




//verifikasi email user
Auth::routes(['verify' => true]);

Route::get('/send-mail', function () {
    Mail::to('newuser@example.com')->send(new MailtrapExample());
    return 'A message has been sent to Mailtrap!';
});

Auth::routes();

Route::post('/authentication', 'CekNpmController@ceknpm')->name('authentication');
Route::post('login', 'Auth\LoginController@login')->name('login');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/registrasi', 'RegistrasiController@index')->name('registrasi');
Route::get('/editregistrasi', 'RegistrasiController@editRegistrasi')->name('editregistrasi');
Route::post('/lockRegistrasi', 'RegistrasiController@lockRegistrasi')->name('lockRegistrasi');
Route::post('/createRegistrasi','RegistrasiController@createRegistrasi');


Route::get('/toga', 'TogaController@index')->name('toga');
Route::get('/edittoga', 'TogaController@editToga')->name('edittoga');
Route::post('/lockToga', 'TogaController@lockToga')->name('lockToga');
Route::post('toga', 'TogaController@store')->name('toga.store');
Route::post('toga2', 'TogaController@storeDistrict')->name('toga.storeDistrict');
Route::post('toga3', 'TogaController@storeVillage')->name('toga.storeVillage');
Route::post('/createToga','TogaController@createToga');

// Route::get('/persembahan', 'PersembahanController@index')->name('persembahan');
// Route::post('/lockPersembahan', 'PersembahanController@lockPersembahan')->name('lockPersembahan');

// Route::get('/daftarpersembahan', 'daftarPersembahanController@index')->name('daftarpersembahan');
// Route::post('/lockdaftarPersembahan', 'daftarPersembahanController@lockdaftarPersembahan')->name('lockdaftarPersembahan');

// Route::get('/keringanan', 'KeringananController@index')->name('keringanan');
// Route::get('/api','XenditController@getBalance');


Route::get('/iuran', 'IuranController@index')->name('iuran');
Route::get('/editiuran', 'IuranController@editIuran')->name('editiuran');
Route::post('/lockIuran', 'IuranController@lockIuran')->name('lockIuran');
Route::post('iuran', 'IuranController@store')->name('iuran.store');
Route::post('iuran2', 'IuranController@storeDistrict')->name('iuran.storeDistrict');
Route::post('iuran3', 'IuranController@storeVillage')->name('iuran.storeVillage');
Route::post('/createiuran','IuranController@createIuran');
