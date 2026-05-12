<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

foreach ([
    '/' => ['welcome', 'home'],
    '/estatisticas' => ['crm.statistics', 'crm.statistics'],
    '/parceiros' => ['crm.partners', 'crm.partners'],
    '/carteira' => ['crm.wallet', 'crm.wallet'],
    '/vendas' => ['crm.sales', 'crm.sales'],
    '/agenda' => ['crm.agenda', 'crm.agenda'],
    '/oportunidades' => ['crm.opportunities', 'crm.opportunities'],
    '/relatorios' => ['crm.reports', 'crm.reports'],
] as $uri => [$view, $name]) {
    Route::view($uri, $view)->name($name);
}

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::resource('companies', CompanyController::class)->except(['show']);
    Route::resource('contacts', ContactController::class)->except(['show']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
