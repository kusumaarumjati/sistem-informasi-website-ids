<?php
use \App\Http\Controllers\DataCustController;
use \App\Http\Controllers\tambahCust1Controller;
use \App\Http\Controllers\tambahCust2Controller;
use \App\Http\Controllers\printBarcodeController;
use \App\Http\Controllers\scanBarcodeController;
use \App\Http\Controllers\lokasiTokoController;
use \App\Http\Controllers\tambahTokoController;
use \App\Http\Controllers\UsersImportController;
use \App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\Auth\LoginMasukController;
use \App\Http\Controllers\ScoreboardController;
//use \App\Http\Controllers\ajaxController;
use App\Http\Controllers\API\BooksController;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('pages.body');
});
Route::get('/datacust', [DataCustController::class,'index']);
Route::get('/tambahcust', [tambahCust1Controller::class,'index']);
Route::post('tambahcust1/simpan/', [tambahCust1Controller::class,'simpan']);

Route::get('/tambahcust2', [tambahCust2Controller::class,'index']);
Route::post('/tambahcust2/simpan/', [tambahCust2Controller::class, 'simpan']);

Route::get('/findKota/{id}', [tambahCust1Controller::class, 'findKota']);
Route::get('/findKecamatan/{id}', [tambahCust1Controller::class, 'findKecamatan']);
Route::get('/findKelurahan/{id}', [tambahCust1Controller::class, 'findKelurahan']);
Route::get('/findKodepos/', [tambahCust1Controller::class, 'findKodepos']);

Route::get('/findKota/{id}', [tambahCust2Controller::class, 'findKota']);
Route::get('/findKecamatan/{id}', [tambahCust2Controller::class, 'findKecamatan']);
Route::get('/findKelurahan/{id}', [tambahCust2Controller::class, 'findKelurahan']);
Route::get('/findKodepos/', [tambahCust2Controller::class, 'findKodepos']);

Route::get('/printbarcode', [printBarcodeController::class, 'index']);
Route::get('/tambahbarang', [printBarcodeController::class, 'tambahbarang']);
Route::POST('/barcode/simpan/', [printBarcodeController::class, 'simpan']);

Route::get('/scanner', [scanBarcodeController::class, 'index']);
// Route::post('/generate-pdf', [printBarcodeController::class, 'generatePDF']);
Route::get('/cetakpdf/{id_barang}/{col}/{row}', [printBarcodeController::class, 'generatePDF'])->name('generate');

// Route::get('/ajax/ajax_file/{id}', [ajaxController::class, 'city']);
// Route::get('/findKota/{id}', [ajaxController::class, 'findKota']);
// Route::get('/findKecamatan/{id}', [ajaxController::class, 'findKecamatan']);
// Route::get('/findKelurahan/{id}', [ajaxController::class, 'findKelurahan']);
// Route::get('/findKodepos/{id}', [ajaxController::class, 'findKodepos']);

Route::get('/datatoko', [lokasiTokoController::class,'index']);
Route::get('/tambahtoko', [tambahTokoController::class,'index']);
Route::post('/tambahtoko/simpan/', [tambahTokoController::class,'simpan']);
Route::get('/PDF_toko/{id}', [lokasiTokoController::class, 'toko_pdf'])->name('toko_pdf');

Route::get('/titikkunjungan', [lokasiTokoController::class,'titikkunjungan']);
Route::get('/findToko', [lokasiTokoController::class,'findToko']);


// Route::get('/users/export', 'UsersExportController@export');

Route::get('/users', [UsersImportController::class, 'show']);
Route::get('/dataexcel', [UsersImportController::class, 'showdata']);
Route::post('/users/import', [UsersImportController::class, 'store']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Google login
Route::get('/masuk', [App\Http\Controllers\Auth\LoginMasukController::class, 'index']);
Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback/', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

Route::get('/logout',function(){
    Auth::logout();
    return  redirect ('/masuk');
})->name('logout');

//scoreboard
Route::get('/scoreboard', [ScoreboardController::class, 'scoreboard']);
Route::get('/scoreboard-controller', [ScoreboardController::class, 'index']);
Route::post('/scoreboard-controller/update', [ScoreboardController::class, 'store']);
Route::get('/messages', [ScoreboardController::class, 'message']);

Route::get('/book',[BooksController::class,'book']);
Route::get('/book/insertBook', [BooksController::class, 'create']);
Route::get('/book/editBook/{id}', [BooksController::class, 'edit']);
Route::post('/book/tambahBooks', [BooksController::class, 'tambahBook']);
Route::put('/book/updateBook/{id}', [BooksController::class, 'updateBook']);
Route::delete('/book/hapus/{id}', [BooksController::class, 'hapus']);


// Route::get('/scoreboard',[ScoreboardController::class, 'index']);
// Route::get('/scoreboard/kontrol',[ScoreboardController::class, 'kontrol']);
// Route::get('/scoreboard/sse',[ScoreboardController::class, 'update_sse']);
// Route::post('store-home',[ScoreboardController::class, 'store_home']);
// Route::post('store-away',[ScoreboardController::class, 'store_away']);
// Route::post('store-homeplus2',[ScoreboardController::class, 'scorehomeplus2']);
// Route::post('store-homeminus2',[ScoreboardController::class, 'scorehomeminus2']);
// Route::post('store-homeplus3',[ScoreboardController::class, 'scorehomeplus3']);
// Route::post('store-homeminus3',[ScoreboardController::class, 'scorehomeminus3']);
// Route::post('store-awayplus2',[ScoreboardController::class, 'scoreawayplus2']);
// Route::post('store-awayminus2',[ScoreboardController::class, 'scoreawayminus2']);
// Route::post('store-awayplus3',[ScoreboardController::class, 'scoreawayplus3']);
// Route::post('store-awayminus3',[ScoreboardController::class,'scoreawayminus3']);
// Route::post('store-sound1',[ScoreboardController::class, 'store_sound1']);
// Route::post('store-sound2',[ScoreboardController::class, 'store_sound2']);
// Route::post('store-sound3',[ScoreboardController::class, 'store_sound3']);
// Route::post('update-sound',[ScoreboardController::class, 'update_sound']);
// Route::post('update-menit-detik',[ScoreboardController::class, 'update_menit_detik']);
// Route::post('reset-menit-detik',[ScoreboardController::class, 'reset_menit_detik']);
// Route::post('resume-menit-detik',[ScoreboardController::class, 'resume_menit_detik']);
// Route::post('stop-menit-detik',[ScoreboardController::class, 'stop_menit_detik']);

// Route::get('/auth/redirect', 'Auth\LoginController@redirectToProvider');
// Route::get('/auth/callback', 'Auth\LoginController@handleProviderCallback');