<?php

namespace App\Filament\Resources\CommunityServices\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CommunityServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('location')
                    ->required()
                    ->default('Sulawesi Utara'),
                TextInput::make('partner')
                    ->default(null),
                TextInput::make('partner_website')
                    ->url()
                    ->default(null),
                TextInput::make('year')
                    ->required()
                    ->default('2024'),
                TextInput::make('role')
                    ->required()
                    ->default('Ketua Pelaksana PKM'),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('outcomes')
                    ->default(null)
                    ->columnSpanFull(),
                FileUpload::make('image_url')
                    ->image(),
                Toggle::make('is_featured')
                    ->required(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
