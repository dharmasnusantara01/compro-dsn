<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CaseStudyResource\Pages;
use App\Models\CaseStudy;
use Filament\Forms\Components\DatePicker;
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

class CaseStudyResource extends Resource
{
    protected static string|null $model = CaseStudy::class;
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-folder-open';
    protected static \UnitEnum|string|null $navigationGroup = 'Content';
    protected static ?int $navigationSort = 2;
    protected static string|null $label = 'Case Study';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Case Study Info')->schema([
                TextInput::make('title')->required()->live(onBlur: true),
                TextInput::make('slug')->required()->unique(ignoreRecord: true),
                TextInput::make('client')->required(),
                TextInput::make('category')->required(),
                DatePicker::make('date'),
                FileUpload::make('cover')->image()->directory('portfolio'),
                RichEditor::make('content')->columnSpanFull(),
                Textarea::make('results')->rows(3)->columnSpanFull(),
            ])->columns(2),

            Section::make('SEO')->schema([
                TextInput::make('seo_title'),
                Textarea::make('seo_description')->rows(2),
            ])->columns(2),

            Section::make('Settings')->schema([
                Toggle::make('is_featured'),
                Toggle::make('is_active')->default(true),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('client')->searchable(),
                TextColumn::make('category'),
                TextColumn::make('date')->date()->sortable(),
                IconColumn::make('is_featured')->boolean(),
                IconColumn::make('is_active')->boolean(),
            ])
            ->defaultSort('date', 'desc')
            ->actions([EditAction::make()])
            ->bulkActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCaseStudies::route('/'),
            'create' => Pages\CreateCaseStudy::route('/create'),
            'edit' => Pages\EditCaseStudy::route('/{record}/edit'),
        ];
    }
}
