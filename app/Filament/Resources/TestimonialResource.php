<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Models\Testimonial;
use Filament\Forms\Components\FileUpload;
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

class TestimonialResource extends Resource
{
    protected static string|null $model = Testimonial::class;
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static \UnitEnum|string|null $navigationGroup = 'Content';
    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make()->schema([
                TextInput::make('author')->required(),
                TextInput::make('role')->required(),
                TextInput::make('company')->required(),
                FileUpload::make('photo')->image()->directory('testimonials'),
                Textarea::make('quote')->required()->rows(3)->columnSpanFull(),
                TextInput::make('order')->numeric()->default(0),
                Toggle::make('is_featured'),
                Toggle::make('is_active')->default(true),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order')->sortable()->width('60px'),
                TextColumn::make('author')->searchable(),
                TextColumn::make('company'),
                TextColumn::make('quote')->limit(60),
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
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
