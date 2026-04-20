<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use App\Models\User;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PostResource extends Resource
{
    protected static string|null $model = Post::class;
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-newspaper';
    protected static \UnitEnum|string|null $navigationGroup = 'Blog';
    protected static ?int $navigationSort = 6;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Post Content')->schema([
                TextInput::make('title')->required()->live(onBlur: true),
                TextInput::make('slug')->required()->unique(ignoreRecord: true),
                FileUpload::make('cover')->image()->directory('blog'),
                Textarea::make('excerpt')->rows(2),
                RichEditor::make('content')->columnSpanFull(),
            ])->columns(2),

            Section::make('Classification')->schema([
                TextInput::make('category'),
                TagsInput::make('tags'),
                Select::make('author_id')
                    ->label('Author')
                    ->options(User::pluck('name', 'id'))
                    ->required(),
                DateTimePicker::make('published_at'),
            ])->columns(2),

            Section::make('SEO')->schema([
                TextInput::make('seo_title'),
                Textarea::make('seo_description')->rows(2),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('category'),
                TextColumn::make('author.name'),
                TextColumn::make('published_at')->dateTime()->sortable(),
            ])
            ->defaultSort('published_at', 'desc')
            ->actions([EditAction::make()])
            ->bulkActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
