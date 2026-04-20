<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactMessageResource\Pages;
use App\Models\ContactMessage;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;

class ContactMessageResource extends Resource
{
    protected static string|null $model = ContactMessage::class;
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-envelope';
    protected static \UnitEnum|string|null $navigationGroup = 'Inbox';
    protected static ?int $navigationSort = 7;
    protected static string|null $label = 'Contact Message';

    public static function getNavigationBadge(): ?string
    {
        return (string) ContactMessage::unread()->count() ?: null;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make()->schema([
                \Filament\Forms\Components\TextInput::make('name')->disabled(),
                \Filament\Forms\Components\TextInput::make('email')->disabled(),
                \Filament\Forms\Components\TextInput::make('phone')->disabled(),
                \Filament\Forms\Components\TextInput::make('subject')->disabled(),
                Textarea::make('message')->disabled()->rows(4)->columnSpanFull(),
                Toggle::make('is_read'),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('subject')->limit(40),
                IconColumn::make('is_read')->boolean()->label('Read'),
                TextColumn::make('created_at')->dateTime()->sortable()->label('Received'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Filter::make('unread')->query(fn ($query) => $query->where('is_read', false)),
            ])
            ->actions([ViewAction::make()])
            ->bulkActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactMessages::route('/'),
            'view' => Pages\ViewContactMessage::route('/{record}'),
        ];
    }
}
