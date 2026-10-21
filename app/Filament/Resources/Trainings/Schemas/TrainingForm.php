<?php

namespace App\Filament\Resources\Trainings\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TrainingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('theme')
                    ->default(null),
                TextInput::make('organizer')
                    ->required(),
                TextInput::make('role')
                    ->required()
                    ->default('Pemateri'),
                DatePicker::make('event_date'),
                TextInput::make('location')
                    ->default(null),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                FileUpload::make('image_url')
                    ->image(),
                TextInput::make('slides_url')
                    ->url()
                    ->default(null),
                TextInput::make('certificate_url')
                    ->url()
                    ->default(null),
                Toggle::make('is_featured')
                    ->required(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
