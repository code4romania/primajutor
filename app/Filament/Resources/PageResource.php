<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Models\Page;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class PageResource extends Resource
{
    use Translatable;

    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Checkbox::make('show_in_header'),
                        Checkbox::make('show_in_footer'),
                        TextInput::make('title')
                            ->afterStateUpdated(function (Closure $get, Closure $set, ?string $state) {
                                if (! $get('is_slug_changed_manually') && filled($state)) {
                                    $set('alias', Str::slug($state));
                                }
                            })
                            ->reactive()
                            ->required(),
                        TextInput::make('alias')->label('Slug')->afterStateUpdated(function (Closure $set) {
                                $set('is_slug_changed_manually', true);
                            })
                            ->required()
                            ->unique(),
                        Hidden::make('is_slug_changed_manually')
                            ->default(false)
                            ->dehydrated(false),
                        RichEditor::make('content')
                            ->toolbarButtons([
                                'attachFiles',
                                'blockquote',
                                'bold',
                                'bulletList',
                                'codeBlock',
                                'h2',
                                'h3',
                                'italic',
                                'link',
                                'orderedList',
                                'redo',
                                'strike',
                                'undo',
                            ]),
                        SpatieMediaLibraryFileUpload::make('banner')->collection('banner'),
                        TextInput::make('seo_title'),
                        Textarea::make('seo_keywords'),
                        Textarea::make('seo_description'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                CheckboxColumn::make('show_in_header'),
                CheckboxColumn::make('show_in_footer'),
                TextColumn::make('title')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
