<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CertificatesController;

Route::group(['middleware' => 'checkUserLoggedIn'], function () {

    Route::get('dashboard', [CertificatesController::class, 'index'])->name('dashboard');

Route::get('generate-pdf/{id}',[CertificatesController::class, 'generatePDF'])->name('generate-pdf');

});
Route::get('/pdf_view/{id}/download', [CertificatesController::class, 'downloadPDF'])->name('pdf_view.download');
Route::post('postCertificate', [CertificatesController::class, 'postCertificate'])->name('postCertificate');
Route::get('/', [AuthenticationController::class, 'index'])->name('login');
Route::get('login', [AuthenticationController::class, 'index'])->name('login');
Route::post('post-login', [AuthenticationController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthenticationController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthenticationController::class, 'postRegistration'])->name('register.post');
Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');
Route::get('forgot-password', [AuthenticationController::class, 'forgot_password'])->name('forgot.password');
Route::post('update-password', [AuthenticationController::class, 'update_password'])->name('update.password');