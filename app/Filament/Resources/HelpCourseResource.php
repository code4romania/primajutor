<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HelpCourseResource\Pages;
use App\Filament\Resources\HelpCourseResource\RelationManagers;
use App\Models\City;
use App\Models\County;
use App\Models\HelpCourse;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Layout;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HelpCourseResource extends Resource
{
    use Translatable;

    protected static ?string $model = HelpCourse::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required(),
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
                    ->options(function (callable $get) {
                        $county = County::find($get('county_id'));
                        if (!$county) {
                            return [];
                        }
                        return City::where('county_id', $county->id)->pluck('name', 'id');
                    })
                    ->searchable()
                    ->reactive(),
                TextInput::make('info')->required(),
                TextInput::make('link')->url()->required(),
                DatePicker::make('date')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('date'),
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
            ])
            ->filters([
                    SelectFilter::make('county_id')
                        ->label('County')
                        ->options(County::whereHas('helpCourses')->pluck('name', 'id')->toArray())
                        ->searchable(),
                    SelectFilter::make('city_id')
                        ->label('City')
                        ->options(City::whereHas('helpCourses')->pluck('name', 'id')->toArray())
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
            'index' => Pages\ListHelpCourses::route('/'),
            'create' => Pages\CreateHelpCourse::route('/create'),
            'edit' => Pages\EditHelpCourse::route('/{record}/edit'),
        ];
    }
}
