<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/estatisticas', 'crm.statistics')->name('crm.statistics');
Route::view('/parceiros', 'crm.partners')->name('crm.partners');
Route::view('/carteira', 'crm.wallet')->name('crm.wallet');
Route::view('/vendas', 'crm.sales')->name('crm.sales');
Route::view('/agenda', 'crm.agenda')->name('crm.agenda');
Route::view('/oportunidades', 'crm.opportunities')->name('crm.opportunities');
Route::view('/relatorios', 'crm.reports')->name('crm.reports');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::resource('companies', CompanyController::class)->except(['show']);
    Route::resource('contacts', ContactController::class)->except(['show']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
