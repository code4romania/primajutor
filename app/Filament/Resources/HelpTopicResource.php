<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HelpTopicResource\Pages;
use App\Filament\Resources\HelpTopicResource\RelationManagers;
use App\Models\HelpTopic;
use Filament\Forms;
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
use Filament\Tables\Columns\TextInputColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HelpTopicResource extends Resource
{
    use Translatable;

    protected static ?string $model = HelpTopic::class;

    protected static ?string $navigationIcon = 'heroicon-o-support';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required(),
                TextInput::make('slug')->required(),
                Forms\Components\Section::make('Seo')
                    ->schema([
                        TextInput::make('seo_title'),
                        TextArea::make('seo_keywords'),
                        TextArea::make('seo_description'),
                    ]),
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
            'index' => Pages\ListHelpTopics::route('/'),
            'create' => Pages\CreateHelpTopic::route('/create'),
            'edit' => Pages\EditHelpTopic::route('/{record}/edit'),
        ];
    }
}
