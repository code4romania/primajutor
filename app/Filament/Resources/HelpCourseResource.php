<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\HelpCourseResource\Pages;
use App\Models\City;
use App\Models\County;
use App\Models\HelpCourse;
use Filament\Forms;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Contracts\Database\Eloquent\Builder;

class HelpCourseResource extends Resource
{
    use Translatable;

    protected static ?string $model = HelpCourse::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('info')
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\Select::make('county_id')
                            ->label('County')
                            ->options(County::pluck('name', 'id'))
                            ->required()
                            ->reactive()
                            ->searchable()
                            ->afterStateUpdated(fn (callable $set) => $set('city_id', null)),

                        Forms\Components\Select::make('city_id')
                            ->label('City')
                            ->required()
                            ->options(
                                fn (callable $get) => County::find($get('county_id'))
                                    ?->cities
                                    ->pluck('name', 'id')
                            )
                            ->searchable()
                            ->reactive(),

                        Forms\Components\TextInput::make('link')
                            ->url()
                            ->required(),

                        Forms\Components\DatePicker::make('date')
                            ->required(),
                    ])
                    ->columns(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('date'),
                Tables\Columns\TextColumn::make('county_id')
                    ->label('County')
                    ->formatStateUsing(function (string $state) {
                        $county = County::find($state);

                        return (string) $county->name;
                    }),
                Tables\Columns\TextColumn::make('city_id')
                    ->label('City')
                    ->formatStateUsing(function (string $state) {
                        $city = City::find($state);

                        return (string) $city->name;
                    }),
            ])
            ->filters(
                [
                    Tables\Filters\SelectFilter::make('county')
                        ->relationship('county', 'name', fn (Builder $query) => $query->whereHas('helpCourses'))
                        ->searchable(),

                    Tables\Filters\SelectFilter::make('city')
                        ->relationship('city', 'name', fn (Builder $query) => $query->whereHas('helpCourses'))
                        ->searchable(),
                ],
                layout: Tables\Filters\Layout::AboveContent,
            )
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
            'index' => Pages\ListHelpCourses::route('/'),
            'create' => Pages\CreateHelpCourse::route('/create'),
            'edit' => Pages\EditHelpCourse::route('/{record}/edit'),
        ];
    }
}
