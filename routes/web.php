<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/nosotros', [HomeController::class, 'about'])->name('about');

// Rutas de Contacto
Route::get('/contacto', [ContactController::class, 'index'])->name('contact');
Route::post('/contacto', [ContactController::class, 'store'])->name('contact.store');

// Rutas de Servicios
Route::get('/servicios', [App\Http\Controllers\ServiceController::class, 'index'])->name('services.index');

// Rutas temporales (las completaremos después)
Route::view('/citas/agendar', 'welcome')->name('appointments.create');
Route::post('/newsletter', [App\Http\Controllers\NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');