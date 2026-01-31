<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationLabel = 'Inicio';
    
    protected static ?string $title = 'Panel de Control';

    public function getHeading(): string
    {
        return 'Bienvenido a MH Consultores';
    }

    public function getSubheading(): ?string
    {
        return 'Gestiona servicios, configuración del sitio y mensajes de contacto';
    }
}
