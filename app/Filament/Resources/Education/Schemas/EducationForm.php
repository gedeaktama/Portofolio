<?php

namespace App\Filament\Resources\Education\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class EducationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('degree')
                    ->required(),
                TextInput::make('institution')
                    ->required(),
                TextInput::make('field_of_study')
                    ->default(null),
                TextInput::make('start_year')
                    ->required(),
                TextInput::make('end_year')
                    ->default(null),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_visible')
                    ->required(),
            ]);
    }
}
