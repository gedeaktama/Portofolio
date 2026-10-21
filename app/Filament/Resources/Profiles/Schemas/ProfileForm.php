<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->default(null),
                TextInput::make('full_name')
                    ->required()
                    ->default('Gede Erik Aktama, S.Pd., M.Pd.'),
                TextInput::make('nickname')
                    ->default('Erik'),
                TextInput::make('title_prefix')
                    ->default(null),
                TextInput::make('title_suffix')
                    ->required()
                    ->default('S.Pd., M.Pd.'),
                TextInput::make('primary_role')
                    ->required()
                    ->default('Dosen Program Studi Sistem Komputer, Universitas Parna Raya'),
                TextInput::make('secondary_role')
                    ->required()
                    ->default('Fasilitator Nasional Koding dan Kecerdasan Artifisial (KKA) Kemdikdasmen'),
                TextInput::make('tertiary_role')
                    ->required()
                    ->default('Ketua Program Studi Sistem Komputer'),
                TextInput::make('business_role')
                    ->required()
                    ->default('CEO PT Aktama Digital Antika'),
                TextInput::make('tagline')
                    ->required()
                    ->default('Akademisi, Inovator Teknologi, dan Penggerak Transformasi Digital.'),
                Textarea::make('short_bio')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('full_bio')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('avatar_url')
                    ->url()
                    ->default(null),
                TextInput::make('cv_file_url')
                    ->url()
                    ->default(null),
                TextInput::make('location')
                    ->required()
                    ->default('Manado, Sulawesi Utara, Indonesia'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required()
                    ->default('erikaktama@parnaraya.ac.id'),
                TextInput::make('phone')
                    ->tel()
                    ->default(null),
                TextInput::make('whatsapp')
                    ->default(null),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
