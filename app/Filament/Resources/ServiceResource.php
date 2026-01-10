<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Contenido';

    protected static ?string $modelLabel = 'Servicio';

    protected static ?string $pluralModelLabel = 'Servicios';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Detalle del Servicio')
                    ->tabs([
                        // Pestaña 1: Información Principal
                        Forms\Components\Tabs\Tab::make('Información General')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\Select::make('category_id')
                                            ->relationship('category', 'name')
                                            ->label('Categoría')
                                            ->required()
                                            ->preload()
                                            ->searchable(),
                                            
                                        Forms\Components\TextInput::make('title')
                                            ->label('Título del Servicio')
                                            ->required()
                                            ->maxLength(255)
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', \Illuminate\Support\Str::slug($state)) : null),

                                        Forms\Components\TextInput::make('slug')
                                            ->label('URL Amigable (Slug)')
                                            ->required()
                                            ->maxLength(255)
                                            ->unique(ignoreRecord: true)
                                            ->helperText('Se genera automáticamente del título. Ejemplo: consultoria-iso-9001'),

                                        Forms\Components\TextInput::make('price_from')
                                            ->label('Precio Desde')
                                            ->numeric()
                                            ->prefix('$')
                                            ->helperText('Opcional. Solo para referencia.'),
                                            
                                        Forms\Components\TextInput::make('duration')
                                            ->label('Duración Estimada')
                                            ->placeholder('Ej: 2 semanas, 1 mes...')
                                            ->maxLength(255),
                                            
                                        Forms\Components\TextInput::make('order')
                                            ->label('Orden de Aparición')
                                            ->numeric()
                                            ->default(0),

                                        Forms\Components\Toggle::make('active')
                                            ->label('Visible en la web')
                                            ->default(true)
                                            ->inline(false),
                                            
                                        Forms\Components\Toggle::make('is_featured')
                                            ->label('Destacado en Inicio')
                                            ->default(false)
                                            ->inline(false),
                                    ]),
                                
                                Forms\Components\Textarea::make('short_description')
                                    ->label('Descripción Corta')
                                    ->rows(3)
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpanFull()
                                    ->helperText('Se muestra en las tarjetas de la página de inicio.'),
                            ]),

                        // Pestaña 2: Contenido Detallado
                        Forms\Components\Tabs\Tab::make('Contenido Detallado')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Forms\Components\RichEditor::make('description')
                                    ->label('Descripción Completa')
                                    ->required()
                                    ->columnSpanFull(),
                                
                                Forms\Components\TagsInput::make('benefits')
                                    ->label('Beneficios Clave')
                                    ->placeholder('Escribe un beneficio y presiona Enter')
                                    ->columnSpanFull()
                                    ->helperText('Lista de ventajas que obtendrá el cliente.'),
                                    
                                Forms\Components\TagsInput::make('deliverables')
                                    ->label('Entregables')
                                    ->placeholder('Escribe un entregable y presiona Enter')
                                    ->columnSpanFull()
                                    ->helperText('Documentos o resultados tangibles al finalizar el servicio.'),
                            ]),

                        // Pestaña 3: Multimedia
                        Forms\Components\Tabs\Tab::make('Multimedia')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Forms\Components\TextInput::make('icon')
                                    ->label('Icono (FontAwesome)')
                                    ->placeholder('fas fa-cog')
                                    ->helperText('Nombre de la clase de FontAwesome. Ej: fas fa-chart-line'),

                                Forms\Components\FileUpload::make('image')
                                    ->label('Imagen Principal')
                                    ->image()
                                    ->directory('services')
                                    ->visibility('public')
                                    ->imageResizeMode('cover')
                                    ->imageCropAspectRatio('16:9')
                                    ->imageResizeTargetWidth('1920')
                                    ->imageResizeTargetHeight('1080'),
                            ]),
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Imagen')
                    ->circular(),
                
                Tables\Columns\TextColumn::make('title')
                    ->label('Servicio')
                    ->searchable()
                    ->sortable()
                    ->description(fn (Service $record): string => \Illuminate\Support\Str::limit($record->short_description, 50)),
                
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Categoría')
                    ->sortable()
                    ->badge()
                    ->color('info'),

                Tables\Columns\IconColumn::make('active')
                    ->label('Visible')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Destacado')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('order')
                    ->label('Orden')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado')
                    ->dateTime('d/m/Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('order', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->relationship('category', 'name')
                    ->label('Categoría'),
                    
                Tables\Filters\TernaryFilter::make('active')
                    ->label('Estado Visible'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
