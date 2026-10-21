<?php

namespace App\Filament\Resources\Experiences\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ExperienceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('position')
                    ->required(),
                TextInput::make('organization')
                    ->required(),
                TextInput::make('category')
                    ->required()
                    ->default('academic'),
                TextInput::make('start_date')
                    ->required(),
                TextInput::make('end_date')
                    ->default(null),
                Toggle::make('is_current')
                    ->required(),
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
