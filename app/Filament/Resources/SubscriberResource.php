<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubscriberResource\Pages;
use App\Models\Subscriber;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SubscriberResource extends Resource
{
    protected static ?string $model = Subscriber::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Marketing';

    protected static ?string $modelLabel = 'Suscriptor';

    protected static ?string $pluralModelLabel = 'Suscriptores';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('email')
                    ->label('Correo Electrónico')
                    ->searchable()
                    ->sortable()
                    ->copyable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha de Suscripción')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
            ])
            ->headerActions([
                Tables\Actions\Action::make('export')
                    ->label('Exportar CSV')
                    ->tooltip('Descargar lista completa')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->iconButton()
                    ->action(function () {
                        return response()->streamDownload(function () {
                            echo "\xEF\xBB\xBF"; // BOM for Excel compatibility
                            $handle = fopen('php://output', 'w');
                            fputcsv($handle, ['Email', 'Fecha de Registro']);

                            foreach (Subscriber::all() as $record) {
                                fputcsv($handle, [
                                    $record->email,
                                    $record->created_at->format('d/m/Y H:i'),
                                ]);
                            }

                            fclose($handle);
                        }, 'suscriptores-' . date('Y-m-d') . '.csv');
                    }),
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
            'index' => Pages\ListSubscribers::route('/'),
        ];
    }
}
