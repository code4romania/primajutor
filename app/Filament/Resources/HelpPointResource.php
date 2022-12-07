<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HelpPointResource\Pages;
use App\Filament\Resources\HelpPointResource\RelationManagers;
use App\Models\City;
use App\Models\County;
use App\Models\HelpPoint;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions\LocaleSwitcher;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Layout;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HelpPointResource extends Resource
{
    use Translatable;

    protected static ?string $model = HelpPoint::class;

    protected static ?string $navigationIcon = 'heroicon-o-location-marker';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required()->translateLabel(),
                Select::make('type')->options([
                    'defibrilator' => 'Defibrilator',
                    'punct-ajutor' => 'Punct Ajutor'
                ])->required(),
                Select::make('county_id')
                    ->label('County')
                    ->options(County::all()->pluck('name', 'id')->toArray())
                    ->required()
                    ->reactive()
                    ->searchable()
                    ->afterStateUpdated(fn (callable $set) => $set('city_id', null)),
                Select::make('city_id')
                    ->label('City')
                    ->required()
                    ->options(
                        fn (callable $get) => County::find($get('county_id'))
                            ?->cities
                            ->pluck('name', 'id')
                    )
                    ->searchable()
                    ->reactive(),
                TextInput::make('address')->required(),
                TextInput::make('lat')->required(),
                TextInput::make('lng')->required(),
                TextInput::make('time_schedule')->required()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('type')->enum([
                    'defibrilator' => 'Defibrilator',
                    'punct-ajutor' => 'Punct Ajutor'
                ]),
                TextColumn::make('county_id')
                    ->label('County')
                    ->formatStateUsing(function (string $state) {
                        $county = County::find($state);
                        return (string) $county->name;
                    }),
                TextColumn::make('city_id')
                    ->label('City')
                    ->formatStateUsing(function (string $state) {
                        $city = City::find($state);
                        return (string) $city->name;
                    }),
                TextColumn::make('address'),
            ])
            ->filters([
                    SelectFilter::make('county_id')
                        ->label('County')
                        ->options(County::whereHas('helpPoints')->pluck('name', 'id')->toArray())
                        ->searchable(),
                    SelectFilter::make('city_id')
                        ->label('City')
                        ->options(City::whereHas('helpPoints')->pluck('name', 'id')->toArray())
                        ->searchable()
                ],
                layout: Layout::AboveContent,
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
            'index' => Pages\ListHelpPoints::route('/'),
            'create' => Pages\CreateHelpPoint::route('/create'),
            'edit' => Pages\EditHelpPoint::route('/{record}/edit'),
        ];
    }
}
