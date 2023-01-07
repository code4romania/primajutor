<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\GuideResource\Pages;
use App\Models\Guide;
use Camya\Filament\Forms\Components\TitleWithSlugInput;
use Filament\Forms;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use FilamentTiptapEditor\TiptapEditor;

class GuideResource extends Resource
{
    use Translatable;

    protected static ?string $model = Guide::class;

    protected static ?string $navigationIcon = 'heroicon-o-support';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        TitleWithSlugInput::make(
                            urlPath: '/ghid/'
                        ),
                    ]),

                Forms\Components\Section::make('Steps')
                    ->schema([
                        Forms\Components\Repeater::make('steps')
                            ->relationship()
                            ->columnSpanFull()
                            ->orderable('position')
                            ->defaultItems(1)
                            ->disableLabel()
                            ->schema([
                                Forms\Components\SpatieMediaLibraryFileUpload::make('banner')
                                    ->collection('banner'),
                                Forms\Components\TextInput::make('title')
                                    ->required(),
                                TiptapEditor::make('content')
                                    ->required(),

                            ]),
                    ])
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('slug'),
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
            'index' => Pages\ListGuides::route('/'),
            'create' => Pages\CreateGuide::route('/create'),
            'edit' => Pages\EditGuide::route('/{record}/edit'),
        ];
    }
}
