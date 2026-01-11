<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Solo crea el usuario si no existe
        if (!User::where('email', 'admin@mhconsultores.com')->exists()) {
            User::create([
                'name' => 'Administrador MH',
                'email' => 'admin@mhconsultores.com',
                'password' => Hash::make('MHConsultores2026!'),
            ]);
        }
    }
}
