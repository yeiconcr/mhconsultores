<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactMessageResource\Pages;
use App\Filament\Resources\ContactMessageResource\RelationManagers;
use App\Models\ContactMessage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Support\Enums\FontWeight;

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $modelLabel = 'Mensaje de Contacto';

    protected static ?string $pluralModelLabel = 'Mensajes de Contacto';

    protected static ?string $navigationGroup = 'Comunicación';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Información del Contacto')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nombre')
                            ->required()
                            ->disabled()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->disabled()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('phone')
                            ->label('Teléfono')
                            ->tel()
                            ->disabled()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('company')
                            ->label('Empresa')
                            ->disabled()
                            ->maxLength(255),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Mensaje')
                    ->schema([
                        Forms\Components\TextInput::make('subject')
                            ->label('Asunto')
                            ->required()
                            ->disabled()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('message')
                            ->label('Mensaje')
                            ->required()
                            ->disabled()
                            ->rows(6)
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Gestión')
                    ->schema([
                        Forms\Components\Toggle::make('is_read')
                            ->label('Marcar como leído')
                            ->default(false)
                            ->reactive()
                            ->afterStateUpdated(function ($state, $record) {
                                if ($state && $record && !$record->read_at) {
                                    $record->markAsRead();
                                }
                            }),

                        Forms\Components\DateTimePicker::make('read_at')
                            ->label('Fecha de lectura')
                            ->disabled()
                            ->displayFormat('d/m/Y H:i'),

                        Forms\Components\DateTimePicker::make('replied_at')
                            ->label('Fecha de respuesta')
                            ->displayFormat('d/m/Y H:i'),

                        Forms\Components\TextInput::make('ip_address')
                            ->label('Dirección IP')
                            ->disabled()
                            ->maxLength(255),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable()
                    ->weight(FontWeight::Bold),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->icon('heroicon-m-envelope'),

                Tables\Columns\TextColumn::make('subject')
                    ->label('Asunto')
                    ->searchable()
                    ->sortable()
                    ->limit(40)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 40) {
                            return null;
                        }
                        return $state;
                    }),

                Tables\Columns\IconColumn::make('is_read')
                    ->label('Leído')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->sortable(),

                Tables\Columns\IconColumn::make('replied_at')
                    ->label('Respondido')
                    ->boolean()
                    ->getStateUsing(fn ($record) => $record->replied_at !== null)
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-clock')
                    ->trueColor('success')
                    ->falseColor('warning')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Recibido')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_read')
                    ->label('Estado de lectura')
                    ->placeholder('Todos')
                    ->trueLabel('Leídos')
                    ->falseLabel('No leídos'),

                Tables\Filters\Filter::make('replied')
                    ->label('Respondidos')
                    ->query(fn (Builder $query): Builder => $query->whereNotNull('replied_at')),

                Tables\Filters\Filter::make('not_replied')
                    ->label('Sin responder')
                    ->query(fn (Builder $query): Builder => $query->whereNull('replied_at')),

                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')
                            ->label('Desde'),
                        Forms\Components\DatePicker::make('created_until')
                            ->label('Hasta'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('markAsRead')
                    ->label('Marcar como leído')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->hidden(fn (ContactMessage $record): bool => $record->is_read)
                    ->action(fn (ContactMessage $record) => $record->markAsRead())
                    ->requiresConfirmation(),

                Tables\Actions\Action::make('markAsReplied')
                    ->label('Marcar como respondido')
                    ->icon('heroicon-o-envelope')
                    ->color('info')
                    ->hidden(fn (ContactMessage $record): bool => $record->replied_at !== null)
                    ->action(fn (ContactMessage $record) => $record->markAsReplied())
                    ->requiresConfirmation(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('markAsRead')
                        ->label('Marcar como leídos')
                        ->icon('heroicon-o-check')
                        ->color('success')
                        ->action(fn ($records) => $records->each->markAsRead()),

                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->poll('30s');
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
            'index' => Pages\ListContactMessages::route('/'),
            'view' => Pages\ViewContactMessage::route('/{record}'),
            'edit' => Pages\EditContactMessage::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::unread()->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        $unreadCount = static::getModel()::unread()->count();
        return $unreadCount > 0 ? 'danger' : 'success';
    }
}
