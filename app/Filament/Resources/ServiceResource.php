<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ServiceResource extends Resource
{
    protected static string|null $model = Service::class;
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-briefcase';
    protected static \UnitEnum|string|null $navigationGroup = 'Content';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Service Info')->schema([
                TextInput::make('title')->required()->live(onBlur: true),
                TextInput::make('slug')->required()->unique(ignoreRecord: true),
                TextInput::make('icon')->placeholder('heroicon-o-server'),
                Textarea::make('short_desc')->required()->rows(2),
                RichEditor::make('content')->columnSpanFull(),
                FileUpload::make('image')->image()->directory('services'),
            ])->columns(2),

            Section::make('SEO')->schema([
                TextInput::make('seo_title'),
                Textarea::make('seo_description')->rows(2),
            ])->columns(2),

            Section::make('Settings')->schema([
                TextInput::make('order')->numeric()->default(0),
                Toggle::make('is_featured'),
                Toggle::make('is_active')->default(true),
            ])->columns(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order')->sortable()->width('60px'),
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('short_desc')->limit(50),
                IconColumn::make('is_featured')->boolean(),
                IconColumn::make('is_active')->boolean(),
            ])
            ->defaultSort('order')
            ->actions([EditAction::make()])
            ->bulkActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
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
