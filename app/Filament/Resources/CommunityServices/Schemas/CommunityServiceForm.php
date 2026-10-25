<?php

namespace App\Filament\Resources\CommunityServices\Schemas;

use Filament\Forms\Components\FileUpload;
use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class CommunityServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(['default' => 1, 'lg' => 3])
            ->components([
                // Kolom Kiri / Konten Utama PKM
                Group::make()
                            ->schema([
                                Section::make('Substansi & Laporan PKM')
                                    ->description('Informasi lengkap program Pengabdian Kepada Masyarakat (PKM).')
                                    ->icon('heroicon-o-academic-cap')
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Judul Kegiatan PKM')
                                            ->placeholder('Contoh: Pelatihan Koding dan Kecerdasan Artifisial untuk Guru Informatika...')
                                            ->required()
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state)))
                                            ->maxLength(255),
                                        TextInput::make('slug')
                                            ->label('Permalink / Slug')
                                            ->placeholder('judul-kegiatan-pkm-otomatis')
                                            ->required()
                                            ->unique(ignoreRecord: true)
                                            ->maxLength(255),
                                        TinyEditor::make('description')
                                            ->label('Deskripsi Lengkap Pelaksanaan PKM')
                                            ->placeholder('Uraikan latar belakang masalah mitra, tujuan kegiatan, metode pelatihan/workshop, dan jalannya kegiatan...')
                                            ->required()
                                            ->profile('default')
                                            ->fileAttachmentsDirectory('community-services/content')
                                            ->showMenuBar()
                                            ->minHeight(400),
                                        TinyEditor::make('outcomes')
                                            ->label('Dampak & Luaran Hasil PKM (Outcomes)')
                                            ->placeholder('Contoh: Sertifikat pelatihan bagi 50 guru, modul ajar digital, peningkatan pemahaman 85%, artikel pengabdian...')
                                            ->profile('default')
                                            ->showMenuBar()
                                            ->minHeight(250),
                                    ]),
                            ])
                            ->columnSpan(['default' => 1, 'lg' => 2]),

                        // Kolom Kanan / Sidebar Metadata & Foto Dokumentasi
                        Group::make()
                            ->schema([
                                Section::make('Data Pelaksanaan & Mitra')
                                    ->icon('heroicon-o-information-circle')
                                    ->schema([
                                        TextInput::make('year')
                                            ->label('Tahun Pelaksanaan')
                                            ->required()
                                            ->default(date('Y'))
                                            ->prefix('📅'),
                                        TextInput::make('role')
                                            ->label('Peran dalam Tim PKM')
                                            ->required()
                                            ->default('Ketua Pelaksana PKM')
                                            ->placeholder('Contoh: Ketua Pelaksana, Narasumber Ahli, Anggota Tim'),
                                        TextInput::make('location')
                                            ->label('Lokasi Pengabdian')
                                            ->required()
                                            ->default('Sulawesi Utara')
                                            ->placeholder('Kota/Kabupaten pelaksanaan PKM'),
                                        TextInput::make('partner')
                                            ->label('Nama Mitra / Sasaran')
                                            ->placeholder('Contoh: MGMP Informatika Kota Manado / SMK N 1'),
                                        TextInput::make('partner_website')
                                            ->label('Website / Tautan Mitra')
                                            ->url()
                                            ->placeholder('https://...'),
                                    ]),

                                Section::make('Foto Dokumentasi')
                                    ->icon('heroicon-o-camera')
                                    ->schema([
                                        FileUpload::make('image_url')
                                            ->label('Foto Dokumentasi Utama')
                                            ->image()
                                            ->imageEditor()
                                            ->directory('community-services/covers')
                                            ->maxSize(5120)
                                            ->helperText('Format JPG, PNG, WEBP maks 5MB.'),
                                    ]),

                                Section::make('Pengaturan Tampilan')
                                    ->icon('heroicon-o-cog-6-tooth')
                                    ->schema([
                                        Toggle::make('is_featured')
                                            ->label('Program PKM Unggulan')
                                            ->helperText('Tampilkan di sorotan utama portofolio')
                                            ->default(true),
                                        TextInput::make('order')
                                            ->label('Urutan Tampilan')
                                            ->numeric()
                                            ->default(0),
                                    ]),
                            ])
                            ->columnSpan(['default' => 1, 'lg' => 1]),
            ]);
    }
}
