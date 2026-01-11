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

// ========================================
// RUTAS DE SETUP PARA PRODUCCIÓN
// ========================================

// 1. Ejecutar migraciones
Route::get('/run-migrations', function () {
    try {
        $output = '<h1>🔧 Ejecutando Migraciones</h1>';
        
        // Verificar conexión a BD
        $output .= '<h2>1. Verificando conexión...</h2>';
        $connection = config('database.default');
        $database = config('database.connections.' . $connection . '.database');
        $host = config('database.connections.' . $connection . '.host');
        $output .= '<p>Conexión: <strong>' . $connection . '</strong></p>';
        $output .= '<p>Host: <strong>' . $host . '</strong></p>';
        $output .= '<p>Base de datos: <strong>' . $database . '</strong></p>';
        
        // Ejecutar migraciones
        $output .= '<h2>2. Ejecutando migrate...</h2>';
        Artisan::call('migrate', ['--force' => true]);
        $migrateOutput = Artisan::output();
        $output .= '<pre style="background: #1e1e1e; color: #4ade80; padding: 20px; border-radius: 8px; overflow-x: auto;">' . $migrateOutput . '</pre>';
        
        // Ejecutar seeders
        $output .= '<h2>3. Ejecutando seeders...</h2>';
        
        Artisan::call('db:seed', ['--class' => 'Database\\Seeders\\SiteSettingsSeeder', '--force' => true]);
        $output .= '<p>✅ SiteSettingsSeeder completado</p>';
        
        // Crear usuario admin
        $email = 'admin@mhconsultores.com';
        $existing = \App\Models\User::where('email', $email)->first();
        if (!$existing) {
            \App\Models\User::create([
                'name' => 'Administrador MH',
                'email' => $email,
                'password' => \Illuminate\Support\Facades\Hash::make('Admin2026MH!'),
            ]);
            $output .= '<p>✅ Usuario admin creado</p>';
        } else {
            // Resetear password
            $existing->password = \Illuminate\Support\Facades\Hash::make('Admin2026MH!');
            $existing->save();
            $output .= '<p>✅ Password de admin reseteada</p>';
        }
        
        $output .= '<hr><h2 style="color: green;">🎉 ¡TODO LISTO!</h2>';
        $output .= '<p><strong>Email:</strong> admin@mhconsultores.com</p>';
        $output .= '<p><strong>Password:</strong> Admin2026MH!</p>';
        $output .= '<a href="/admin" style="background: #0ea5e9; color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 20px;">🚀 Ir al Panel Admin</a>';
        
        return $output;
        
    } catch (\Exception $e) {
        return '<h1 style="color: red;">❌ Error</h1>
                <p><strong>Mensaje:</strong> ' . $e->getMessage() . '</p>
                <p><strong>Archivo:</strong> ' . $e->getFile() . ':' . $e->getLine() . '</p>
                <pre style="background: #fee; padding: 20px; border-radius: 8px;">' . $e->getTraceAsString() . '</pre>';
    }
});