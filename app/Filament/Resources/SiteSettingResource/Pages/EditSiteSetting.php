<?php

namespace App\Filament\Resources\SiteSettingResource\Pages;

use App\Filament\Resources\SiteSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSiteSetting extends EditRecord
{
    protected static string $resource = SiteSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function mutateFormDataBeforeFill(array $data): array
    {
        $type = $data['type'] ?? 'text';
        $value = $data['value'] ?? null;

        if ($type === 'text') {
            $data['value_text'] = $value;
        } elseif ($type === 'textarea') {
            $data['value_textarea'] = $value;
        } elseif ($type === 'number') {
            $data['value_number'] = $value;
        } elseif ($type === 'image') {
            $data['value_image'] = $value;
        }

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $type = $data['type'] ?? 'text';

        if ($type === 'text') {
            $data['value'] = $data['value_text'] ?? null;
        } elseif ($type === 'textarea') {
            $data['value'] = $data['value_textarea'] ?? null;
        } elseif ($type === 'number') {
            $data['value'] = $data['value_number'] ?? null;
        } elseif ($type === 'image') {
            $data['value'] = $data['value_image'] ?? null;
        }

        return $data;
    }
}
