<?php

namespace App\Filament\Resources\ResearchProjects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ResearchProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('category')
                    ->required()
                    ->default('research'),
                TextInput::make('year')
                    ->required()
                    ->default('2024'),
                TextInput::make('role')
                    ->required()
                    ->default('Ketua Peneliti'),
                TextInput::make('funding_source')
                    ->default(null),
                TextInput::make('partner_institution')
                    ->default(null),
                Textarea::make('summary')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('output_results')
                    ->default(null)
                    ->columnSpanFull(),
                FileUpload::make('image_url')
                    ->image(),
                TextInput::make('document_url')
                    ->url()
                    ->default(null),
                TextInput::make('status')
                    ->required()
                    ->default('completed'),
                Toggle::make('is_featured')
                    ->required(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
