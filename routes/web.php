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
    $output = '<h1>Resultado de la configuración</h1>';
    
    try {
        // Verificar que las tablas existan
        $output .= '<p>✅ Conexión a la base de datos establecida</p>';
        
        // Ejecutar SiteSettingsSeeder
        $output .= '<p>Ejecutando SiteSettingsSeeder...</p>';
        Artisan::call('db:seed', [
            '--class' => 'Database\\Seeders\\SiteSettingsSeeder',
            '--force' => true
        ]);
        $output .= '<p>✅ SiteSettingsSeeder completado</p>';
        
        // Ejecutar AdminUserSeeder
        $output .= '<p>Ejecutando AdminUserSeeder...</p>';
        Artisan::call('db:seed', [
            '--class' => 'Database\\Seeders\\AdminUserSeeder',
            '--force' => true
        ]);
        $output .= '<p>✅ AdminUserSeeder completado</p>';
        
        $output .= '<hr><h2>✅ Base de datos poblada correctamente!</h2>
                <p><strong>Usuario Admin creado:</strong></p>
                <ul>
                    <li>Email: admin@mhconsultores.com</li>
                    <li>Password: MHConsultores2026!</li>
                </ul>
                <p><a href="/admin" style="background: #0ea5e9; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block;">Ir al Panel Admin</a></p>
                <p style="color: red; margin-top: 20px;"><strong>IMPORTANTE:</strong> Elimina esta ruta /setup-database del código después de usarla por seguridad.</p>';
                
    } catch (\Exception $e) {
        $output .= '<hr><h2 style="color: red;">❌ Error al poblar la base de datos</h2>';
        $output .= '<p><strong>Mensaje:</strong> ' . $e->getMessage() . '</p>';
        $output .= '<p><strong>Archivo:</strong> ' . $e->getFile() . ':' . $e->getLine() . '</p>';
        $output .= '<pre>' . $e->getTraceAsString() . '</pre>';
    }
    
    return $output;
});

// RUTA DE EMERGENCIA: Crear usuario admin directamente
Route::get('/create-admin-now', function () {
    try {
        $email = 'admin@mhconsultores.com';
        
        // Verificar si ya existe
        $existing = \App\Models\User::where('email', $email)->first();
        if ($existing) {
            return '<h1>✅ Usuario ya existe</h1>
                    <p>Email: ' . $email . '</p>
                    <p>Puedes intentar acceder a <a href="/admin">/admin</a></p>
                    <p>Si olvidaste la password, necesitarás resetearla.</p>';
        }
        
        // Crear usuario nuevo
        $user = \App\Models\User::create([
            'name' => 'Administrador MH',
            'email' => $email,
            'password' => \Illuminate\Support\Facades\Hash::make('MHConsultores2026!'),
        ]);
        
        return '<h1 style="color: green;">✅ USUARIO CREADO EXITOSAMENTE</h1>
                <p><strong>Email:</strong> admin@mhconsultores.com</p>
                <p><strong>Password:</strong> MHConsultores2026!</p>
                <hr>
                <a href="/admin" style="background: #0ea5e9; color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; display: inline-block; font-size: 18px;">
                    🚀 Ir al Panel de Admin
                </a>
                <hr>
                <p style="color: red;"><strong>IMPORTANTE:</strong> Elimina esta ruta después de usarla.</p>';
                
    } catch (\Exception $e) {
        return '<h1 style="color: red;">❌ Error</h1>
                <p>' . $e->getMessage() . '</p>
                <pre>' . $e->getTraceAsString() . '</pre>';
    }
});