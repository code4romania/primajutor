<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\PointResource\Pages;
use App\Models\County;
use App\Models\Point;
use Filament\Forms;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Contracts\Database\Eloquent\Builder;

class PointResource extends Resource
{
    use Translatable;

    protected static ?string $model = Point::class;

    protected static ?string $navigationIcon = 'heroicon-o-location-marker';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\Select::make('type')
                            ->options([
                                'defibrilator' => 'Defibrilator',
                                'punct-ajutor' => 'Punct Ajutor',
                            ])
                            ->required(),

                        Forms\Components\TextInput::make('time_schedule')
                            ->required(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Location')
                    ->schema([
                        Forms\Components\TextInput::make('address')
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

                        Forms\Components\TextInput::make('lat')
                            ->numeric()
                            ->minValue(-90)
                            ->maxValue(90)
                            ->required(),

                        Forms\Components\TextInput::make('lng')
                            ->numeric()
                            ->minValue(-180)
                            ->maxValue(180)
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
                Tables\Columns\TextColumn::make('type')->enum([
                    'defibrilator' => 'Defibrilator',
                    'punct-ajutor' => 'Punct Ajutor',
                ]),
                Tables\Columns\TextColumn::make('county.name')
                    ->label('County'),
                Tables\Columns\TextColumn::make('city.name')
                    ->label('City'),
                Tables\Columns\TextColumn::make('address'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'defibrilator' => 'Defibrilator',
                        'punct-ajutor' => 'Punct Ajutor',
                    ]),

                Tables\Filters\SelectFilter::make('county')
                    ->relationship('county', 'name', fn (Builder $query) => $query->whereHas('points'))
                    ->searchable(),

                Tables\Filters\SelectFilter::make('city')
                    ->relationship('city', 'name', fn (Builder $query) => $query->whereHas('points'))
                    ->searchable(),
            ], layout: Tables\Filters\Layout::AboveContent)
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
            'index' => Pages\ListPoints::route('/'),
            'create' => Pages\CreatePoint::route('/create'),
            'edit' => Pages\EditPoint::route('/{record}/edit'),
        ];
    }
}
