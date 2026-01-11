<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Artisan;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/servicios', [ServiceController::class, 'index'])->name('services.index');
Route::get('/nosotros', function () {
    return view('pages.about.index');
})->name('about');
Route::get('/contacto', function () {
    return view('pages.contact.index');
})->name('contact');
Route::post('/contacto', [ContactController::class, 'store'])->name('contact.store');
Route::post('/newsletter', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Ruta temporal para poblar la base de datos en producción
Route::get('/setup-database', function () {
    try {
        Artisan::call('db:seed', ['--class' => 'SiteSettingsSeeder', '--force' => true]);
        Artisan::call('db:seed', ['--class' => 'AdminUserSeeder', '--force' => true]);
        
        return '<h1>✅ Base de datos poblada correctamente!</h1>
                <p><strong>Usuario Admin creado:</strong></p>
                <ul>
                    <li>Email: admin@mhconsultores.com</li>
                    <li>Password: MHConsultores2026!</li>
                </ul>
                <p><a href="/admin">Ir al Panel Admin</a></p>
                <p style="color: red;"><strong>IMPORTANTE:</strong> Elimina esta ruta /setup-database del código después de usarla.</p>';
    } catch (\Exception $e) {
        return '<h1>❌ Error al poblar la base de datos</h1><p>' . $e->getMessage() . '</p>';
    }
});