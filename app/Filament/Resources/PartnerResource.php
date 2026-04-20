<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnerResource\Pages;
use App\Models\Partner;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PartnerResource extends Resource
{
    protected static string|null $model = Partner::class;
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-building-office-2';
    protected static \UnitEnum|string|null $navigationGroup = 'Content';
    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make()->schema([
                TextInput::make('name')->required(),
                TextInput::make('url')->url(),
                FileUpload::make('logo')->image()->directory('partners'),
                TextInput::make('order')->numeric()->default(0),
                Toggle::make('is_active')->default(true),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order')->sortable()->width('60px'),
                ImageColumn::make('logo')->height(40),
                TextColumn::make('name')->searchable(),
                TextColumn::make('url')->limit(40),
                IconColumn::make('is_active')->boolean(),
            ])
            ->defaultSort('order')
            ->actions([EditAction::make()])
            ->bulkActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPartners::route('/'),
            'create' => Pages\CreatePartner::route('/create'),
            'edit' => Pages\EditPartner::route('/{record}/edit'),
        ];
    }
}
