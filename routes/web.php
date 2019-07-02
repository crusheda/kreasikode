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
Route::get('/elements', function () {
    return view('pages.user.contoh');
});

Route::get('/', function () {
    return view('pages.user.index');
})->name('home');

Route::get('/demos', function () {
    return view('index');
});
// Route::get('/login/admin', function () {
//     return view('pages.admin.login');
// });

Auth::routes();
Route::get('/admin/login','LoginController@index')->name('admin.login');
Route::get('/admin', 'HomeController@index')->name('admin');
Route::get('/admin/grafik', 'HomeController@grafik')->name('admin');
Route::get('/mamdani/hitung','MamdaniController@index')->name('grafik');
// Route::post('/mamdani/hitung', 'MamdaniController@index')->name('output');
Route::get('/mamdani/hitung/simpan', 'MamdaniController@simpanOutput')->name('simpanOutput');
Route::resource('karyawan', 'KaryawanController');
Route::get('/mamdani','MamdaniController@toHitung')->name('toHitung');
Route::get('/history','HistoryController@index')->name('admin.history');
