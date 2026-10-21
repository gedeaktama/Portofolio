<?php

namespace App\Filament\Resources\PortfolioProjects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PortfolioProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('project_category_id')
                    ->numeric()
                    ->default(null),
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('problem_statement')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('solution_description')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('technologies')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('key_features')
                    ->default(null)
                    ->columnSpanFull(),
                FileUpload::make('image_url')
                    ->image(),
                TextInput::make('demo_url')
                    ->url()
                    ->default(null),
                TextInput::make('repository_url')
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
