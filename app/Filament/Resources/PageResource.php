<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Closure;
use Filament\Forms;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
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
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Card::make()
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->afterStateUpdated(function (Closure $get, Closure $set, ?string $state) {
                                        if (! $get('is_slug_changed_manually') && filled($state)) {
                                            $set('alias', Str::slug($state));
                                        }
                                    })
                                    ->reactive()
                                    ->required(),
                                Forms\Components\TextInput::make('alias')->label('Slug')->afterStateUpdated(function (Closure $set) {
                                    $set('is_slug_changed_manually', true);
                                })
                                    ->required()
                                    ->unique(),
                                Forms\Components\Hidden::make('is_slug_changed_manually')
                                    ->default(false)
                                    ->dehydrated(false),

                                Forms\Components\SpatieMediaLibraryFileUpload::make('banner')
                                    ->collection('banner')
                                    ->image(),

                                Forms\Components\RichEditor::make('content'),

                            ]),

                        Forms\Components\Section::make('SEO')
                            ->schema([
                                Forms\Components\TextInput::make('seo_title'),
                                Forms\Components\TagsInput::make('seo_keywords')
                                    ->separator(),
                                Forms\Components\Textarea::make('seo_description'),
                            ])
                            ->collapsible(),
                    ])
                    ->columnSpan(2),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Navigation')
                            ->schema([
                                Forms\Components\Toggle::make('show_in_header'),
                                Forms\Components\Toggle::make('show_in_footer'),
                            ]),
                    ]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\CheckboxColumn::make('show_in_header'),
                Tables\Columns\CheckboxColumn::make('show_in_footer'),
                Tables\Columns\TextColumn::make('title'),
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
