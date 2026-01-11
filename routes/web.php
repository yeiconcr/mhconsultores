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

// RUTA DE EMERGENCIA: Resetear password del admin
Route::get('/reset-admin-password', function () {
    try {
        $email = 'admin@mhconsultores.com';
        $newPassword = 'Admin2026MH!';
        
        // Buscar el usuario
        $user = \App\Models\User::where('email', $email)->first();
        
        if (!$user) {
            // Si no existe, crearlo
            $user = \App\Models\User::create([
                'name' => 'Administrador MH',
                'email' => $email,
                'password' => \Illuminate\Support\Facades\Hash::make($newPassword),
            ]);
            
            return '<h1 style="color: green;">✅ USUARIO CREADO</h1>
                    <p><strong>Email:</strong> ' . $email . '</p>
                    <p><strong>Nueva Password:</strong> ' . $newPassword . '</p>
                    <hr>
                    <a href="/admin" style="background: #0ea5e9; color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; display: inline-block; font-size: 18px;">
                        🚀 Ir al Panel de Admin
                    </a>';
        }
        
        // Si existe, resetear password
        $user->password = \Illuminate\Support\Facades\Hash::make($newPassword);
        $user->save();
        
        return '<h1 style="color: green;">✅ PASSWORD RESETEADA EXITOSAMENTE</h1>
                <p><strong>Email:</strong> ' . $email . '</p>
                <p><strong>Nueva Password:</strong> <code style="background: #eee; padding: 5px 10px; font-size: 18px;">' . $newPassword . '</code></p>
                <p style="color: orange; margin-top: 20px;">⚠️ COPIA ESTA PASSWORD EXACTAMENTE COMO APARECE ARRIBA (respetando mayúsculas y símbolos)</p>
                <hr>
                <a href="/admin" style="background: #0ea5e9; color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; display: inline-block; font-size: 18px;">
                    🚀 Ir al Panel de Admin
                </a>
                <hr>
                <p style="color: red; margin-top: 20px;"><strong>IMPORTANTE:</strong> Una vez dentro, cambia la password desde el panel de admin y luego elimina esta ruta del código por seguridad.</p>';
                
    } catch (\Exception $e) {
        return '<h1 style="color: red;">❌ Error</h1>
                <p><strong>Mensaje:</strong> ' . $e->getMessage() . '</p>
                <pre>' . $e->getTraceAsString() . '</pre>';
    }
});