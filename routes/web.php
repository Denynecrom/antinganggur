<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LoperController;
use App\Http\Controllers\LokerController;
use App\Http\Controllers\KebijakanPrivasiController;
use App\Http\Controllers\RegisterPerusahaanController;

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

Route::middleware(['guest:applicant', 'guest:company'])->group(function () {
	//login
	Route::get('/login', 'AuthController@login')->name('login');
	Route::post('/postlogin', 'AuthController@postlogin');

	//register
	Route::get('/register', 'AuthController@register');
	Route::post('/postregister', 'AuthController@postregister')->name('postregister');
});

//logout
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => 'auth:applicant'], function () {
	// profil user
	Route::get('/profil_user', [VisitorController::class, 'profil_user']);
	Route::get('/profil_user/edit', [VisitorController::class, 'profil_user_edit']);
	Route::put('/profil_user/update', [VisitorController::class, 'profil_user_update']);

	// berkas resume/cv
	Route::get('/berkas', [VisitorController::class, 'berkas']);
	Route::post('/berkas', [VisitorController::class, 'berkas_update']);

	// lamar
	Route::post('/lamar/{id}', [AdvertisementController::class, 'apply_job']);
});

Route::group(['middleware' => 'auth:company', 'prefix' => 'profil_perusahaan'], function () {
	// profil perusahaan
	Route::get('/', [VisitorController::class, 'profil_perusahaan']);
	Route::get('/edit', [VisitorController::class, 'profil_perusahaan_edit']);
	Route::put('/update', [VisitorController::class, 'profil_perusahaan_update']);

	// daftar lamaran
	Route::get('/lamaran', [VisitorController::class, 'perusahaan_lamaran']);
	Route::put('/lamaran/{vacancy}', [VisitorController::class, 'perusahaan_lamaran_reply']);

	// iklan
	Route::get('/iklan', [VisitorController::class, 'perusahaan_iklan']);
	Route::get('/iklan/riwayat', [VisitorController::class, 'perusahaan_iklan_inactive']);
	Route::post('/iklan/buat', [VisitorController::class, 'perusahaan_iklan_store']);
	Route::get('/iklan/buat', [VisitorController::class, 'perusahaan_iklan_create']);
	Route::put('/iklan/{ads}', [VisitorController::class, 'perusahaan_iklan_update']);
	Route::get('/iklan/{ads}', [VisitorController::class, 'perusahaan_iklan_edit']);
});

Route::group(['middleware' => 'auth:applicant,company'], function () {
	Route::get('/ubah_password', [VisitorController::class, 'ubah_password']);
	Route::put('/ubah_password', [VisitorController::class, 'ubah_password_update']);
});

Route::group(['prefix' => 'admins'], function () {
	Route::get('/login', [AuthController::class, 'admin_login'])->middleware('guest:admin');
	Route::post('/login', [AuthController::class, 'admin_postlogin']);

	Route::group(['middleware' => 'auth:admin'], function () {
		// dashboard admin
		Route::redirect('/', '/dashboard');
		Route::get('/dashboard', [DashboardController::class, 'index']);
		// magang admin
		Route::get('/magang/data', [MagangController::class, 'create']);
		Route::get('/magang/add', [MagangController::class, 'add']);
		Route::post('/magang/proses', [MagangController::class, 'proses_add']);
		Route::get('/magang/edit/{id}', [MagangController::class, 'edit']);
		Route::put('/magang/update/{id}', [MagangController::class, 'update']);
		Route::get('/magang/delete/{id}', [MagangController::class, 'delete']);
		// user admin
		Route::get('/user/data', [UserController::class, 'index']);
		Route::get('/user/add', [UserController::class, 'add']);
		Route::post('/user/proses', [UserController::class, 'proses_add']);
		Route::get('/user/edit/{id}', [UserController::class, 'edit']); //belum clear
		Route::put('/user/update/{id}', [UserController::class, 'update']); //belum clear
		Route::get('/user/delete/{id}', [UserController::class, 'delete']);
		// company admin
		Route::get('/company/data', [CompanyController::class, 'index']);
		Route::get('/company/add', [CompanyController::class, 'add']);
		Route::post('/company/proses', [CompanyController::class, 'proses_add']);
		Route::get('/company/edit/{id}', [CompanyController::class, 'edit']);
		Route::put('/company/update/{id}', [CompanyController::class, 'update']);
		Route::get('/company/delete/{id}', [CompanyController::class, 'delete']);
		// advertisement admin
		Route::get('/advertisement/active', [AdvertisementController::class, 'index']);
		Route::get('/advertisement/inactive', [AdvertisementController::class, 'index_inactive']);
		Route::get('/advertisement/add', [AdvertisementController::class, 'add']);
		Route::post('/advertisement/proses', [AdvertisementController::class, 'proses_add']);
		Route::get('/advertisement/edit/{id}', [AdvertisementController::class, 'edit']);
		Route::put('/advertisement/update/{id}', [AdvertisementController::class, 'update']);
		Route::get('/advertisement/delete/{id}', [AdvertisementController::class, 'delete']);
		// vacancy admin
		Route::get('/vacancy/data', [VacancyController::class, 'index']);
		Route::get('/vacancy/add', [VacancyController::class, 'add']);
		Route::post('/vacancy/proses', [VacancyController::class, 'proses_add']);
		Route::get('/vacancy/edit/{id}', [VacancyController::class, 'edit']);
		Route::put('/vacancy/update/{id}', [VacancyController::class, 'update']);
		Route::get('/vacancy/delete/{id}', [VacancyController::class, 'delete']);
		// beasiswa admin
		Route::get('/beasiswa/data', [BeasiswaController::class, 'index']);
		Route::get('/beasiswa/add', [BeasiswaController::class, 'add']);
		Route::post('/beasiswa/proses', [BeasiswaController::class, 'proses_add']);
		Route::get('/beasiswa/edit/{id}', [BeasiswaController::class, 'edit']);
		Route::put('/beasiswa/update/{id}', [BeasiswaController::class, 'update']);
		Route::get('/beasiswa/delete/{id}', [BeasiswaController::class, 'delete']);
	});
});


Route::middleware('company.complete')->group(function () {
	// halaman visitor beranda
	Route::get('/', [HomepageController::class, 'index']);

	// halaman visitor lowongan kerja
	Route::get('/loker', [LokerController::class, 'index']);

	// halaman visitor kebijakan privasi
	Route::get('/kebijakan_privasi', [KebijakanPrivasiController::class, 'index']);

	Route::get('/iklan', [AdvertisementController::class, 'show']);
	Route::get('/iklan/detail/{id}', [AdvertisementController::class, 'show_detail']);
	Route::get('/low_det', function () {
		$title = "| Lowongan";
		return view('visitor.lowongan.iklan_details', compact('title'));
	});
	Route::get('/company/search', [CompanyController::class, 'search']);
	Route::get('/dashboard_perusahaan', [CompanyController::class, 'show']);
	Route::get('/company/list', [CompanyController::class, 'list_comp']);
	Route::get('/company/detail/{id}', [CompanyController::class, 'list_comp_detail']);


	// ======================== visitor beasiswa_page ======================== //
	Route::get('/beasiswa', [VisitorController::class, 'beasiswa_page']);
	// Route::get('/beasiswa/detail', [VisitorController::class, 'beasiswa_detail']);
	Route::get('/beasiswa/{id}', [VisitorController::class, 'beasiswa_detail']);
	Route::get('/beasiswa/cari', [VisitorController::class, 'beasiswa_cari']);

	// ======================== visitor magang_page ======================== //
	Route::get('/magang', [VisitorController::class, 'magang_page']);
	Route::get('/magang/{id}', [VisitorController::class, 'magang_detail']);
	Route::get('/magang/cari', [VisitorController::class, 'cari']);
});

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
