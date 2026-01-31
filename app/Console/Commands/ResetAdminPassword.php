<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ResetAdminPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:reset-password 
                            {email? : El email del usuario (por defecto: admin@mhconsultores.com)}
                            {--password= : La nueva contraseña (se solicitará si no se proporciona)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Resetea la contraseña de un usuario o crea uno nuevo';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Obtener el email del argumento o usar el predeterminado
        $email = $this->argument('email') ?? 'admin@mhconsultores.com';
        
        // Obtener la contraseña de la opción o solicitarla
        $password = $this->option('password') ?? $this->secret('Ingresa la nueva contraseña');
        
        if (empty($password)) {
            $this->error('La contraseña no puede estar vacía.');
            return 1;
        }

        // Buscar o crear el usuario
        $user = User::where('email', $email)->first();
        
        if ($user) {
            // Actualizar contraseña existente
            $user->password = Hash::make($password);
            $user->save();
            
            $this->info("✓ Contraseña actualizada exitosamente para: {$email}");
            $this->line("  Nombre: {$user->name}");
        } else {
            // Crear nuevo usuario
            $name = $this->ask('Nombre del nuevo usuario', 'Administrador');
            
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
            ]);
            
            $this->info("✓ Usuario creado exitosamente: {$email}");
            $this->line("  Nombre: {$user->name}");
        }
        
        $this->newLine();
        $this->line("Puedes iniciar sesión en:");
        $this->line("  URL: " . config('app.url') . "/admin/login");
        $this->line("  Email: {$email}");
        $this->line("  Contraseña: [la que acabas de establecer]");
        
        return 0;
    }
}
