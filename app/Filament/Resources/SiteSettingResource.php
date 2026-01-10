<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteSettingResource\Pages;
use App\Models\SiteSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SiteSettingResource extends Resource
{
    protected static ?string $model = SiteSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationGroup = 'Configuración';

    protected static ?string $modelLabel = 'Configuración';

    protected static ?string $pluralModelLabel = 'Configuraciones del Sitio';

    protected static ?int $navigationSort = 100;

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Detalles de la Configuración')
                    ->schema([
                        Forms\Components\TextInput::make('label')
                            ->label('Nombre del Campo')
                            ->disabled()
                            ->columnSpanFull(),
                        
                        Forms\Components\Textarea::make('description')
                            ->label('¿Para qué sirve?')
                            ->disabled()
                            ->columnSpanFull(),

                        // Campos ocultos pero necesarios para la lógica
                        Forms\Components\Hidden::make('key'),
                        Forms\Components\Hidden::make('group'),
                        Forms\Components\Hidden::make('type'),
                        
                        // Valor dinámico según el tipo
                        Forms\Components\TextInput::make('value_text')
                            ->label('Contenido')
                            ->maxLength(65535)
                            ->visible(fn ($get) => $get('type') === 'text')
                            ->columnSpanFull(),
                            
                        Forms\Components\Textarea::make('value_textarea')
                            ->label('Contenido')
                            ->maxLength(65535)
                            ->rows(4)
                            ->visible(fn ($get) => $get('type') === 'textarea')
                            ->columnSpanFull(),
                            
                        Forms\Components\TextInput::make('value_number')
                            ->label('Valor Numérico')
                            ->numeric()
                            ->visible(fn ($get) => $get('type') === 'number')
                            ->columnSpanFull(),
                            
                        Forms\Components\FileUpload::make('value_image')
                            ->label('Imagen')
                            ->image()
                            ->directory('settings')
                            ->visibility('public')
                            ->visible(fn ($get) => $get('type') === 'image')
                            ->columnSpanFull(),
                    ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('updated_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('label')
                    ->label('Configuración')
                    ->searchable()
                    ->sortable()
                    ->description(fn (SiteSetting $record): string => $record->description ?? ''),
                
                Tables\Columns\TextColumn::make('value')
                    ->label('Valor Actual')
                    ->limit(50),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Última Actualización')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->badge()
                    ->color('gray'),
            ])
            ->filters([
                // Filtros eliminados ya que usamos Tabs
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Editar Contenido'),
            ])
            ->bulkActions([
                // Acciones masivas eliminadas para seguridad
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiteSettings::route('/'),
            'create' => Pages\CreateSiteSetting::route('/create'),
            'edit' => Pages\EditSiteSetting::route('/{record}/edit'),
        ];
    }
}
