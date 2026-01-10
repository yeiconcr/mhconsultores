<?php

namespace App\Filament\Resources\SiteSettingResource\Pages;

use App\Filament\Resources\SiteSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSiteSettings extends ListRecords
{
    protected static string $resource = SiteSettingResource::class;

    protected function getHeaderActions(): array
    {
        return []; // Deshabilitar creación
    }

    public function getTabs(): array
    {
        return [
            'all' => \Filament\Resources\Components\Tab::make('Todos'),
            'hero' => \Filament\Resources\Components\Tab::make('Inicio')
                ->query(fn ($query) => $query->where('group', 'hero')),
            'stats' => \Filament\Resources\Components\Tab::make('Estadísticas')
                ->query(fn ($query) => $query->where('group', 'stats')),
            'contact' => \Filament\Resources\Components\Tab::make('Contacto')
                ->query(fn ($query) => $query->where('group', 'contact')),
            'about' => \Filament\Resources\Components\Tab::make('Nosotros')
                ->query(fn ($query) => $query->where('group', 'about')),
            'general' => \Filament\Resources\Components\Tab::make('Otros')
                ->query(fn ($query) => $query->whereNotIn('group', ['hero', 'stats', 'contact', 'about'])),
        ];
    }
}
