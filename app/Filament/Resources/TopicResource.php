<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\TopicResource\Pages;
use App\Models\Topic;
use Closure;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;

class TopicResource extends Resource
{
    use Translatable;

    protected static ?string $model = Topic::class;

    protected static ?string $navigationIcon = 'heroicon-o-support';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->afterStateUpdated(function (Closure $get, Closure $set, ?string $state) {
                        if (! $get('is_slug_changed_manually') && filled($state)) {
                            $set('slug', Str::slug($state));
                        }
                    })
                    ->reactive()
                    ->required(),
                TextInput::make('slug')->afterStateUpdated(function (Closure $set) {
                    $set('is_slug_changed_manually', true);
                })
                    ->required()
                    ->unique(),
                Hidden::make('is_slug_changed_manually')
                    ->default(false)
                    ->dehydrated(false),
                TextInput::make('seo_title'),
                TextArea::make('seo_keywords'),
                TextArea::make('seo_description'),
                Repeater::make('helpTopicSteps')
                    ->relationship()
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('step_number')->numeric()->required(),
                        TextInput::make('title')->required(),
                        RichEditor::make('content')->required(),
                        SpatieMediaLibraryFileUpload::make('banner')->collection('banner'),
                    ]),
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
            'index' => Pages\ListTopics::route('/'),
            'create' => Pages\CreateTopic::route('/create'),
            'edit' => Pages\EditTopic::route('/{record}/edit'),
        ];
    }
}
