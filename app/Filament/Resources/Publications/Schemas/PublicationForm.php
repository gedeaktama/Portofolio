<?php

namespace App\Filament\Resources\Publications\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PublicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('authors')
                    ->required()
                    ->default('Gede Erik Aktama'),
                Toggle::make('is_first_author')
                    ->required(),
                TextInput::make('publication_year')
                    ->required()
                    ->numeric()
                    ->default(2023),
                TextInput::make('journal_name')
                    ->required(),
                TextInput::make('indexing_status')
                    ->required()
                    ->default('SINTA'),
                TextInput::make('volume')
                    ->default(null),
                TextInput::make('issue')
                    ->default(null),
                TextInput::make('pages')
                    ->default(null),
                TextInput::make('doi')
                    ->default(null),
                TextInput::make('url')
                    ->url()
                    ->default(null),
                Textarea::make('abstract')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('keywords')
                    ->default(null),
                TextInput::make('category')
                    ->required()
                    ->default('Computer Vision & AI'),
                TextInput::make('file_path')
                    ->default(null),
                Toggle::make('is_published')
                    ->required(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
