<?php

namespace App\Filament\Resources\Media\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MediaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('file_path')
                    ->required(),
                TextInput::make('file_type')
                    ->required()
                    ->default('image'),
                TextInput::make('file_size')
                    ->numeric()
                    ->default(null),
                TextInput::make('caption')
                    ->default(null),
                TextInput::make('category')
                    ->default(null),
            ]);
    }
}
