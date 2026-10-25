<?php

namespace App\Filament\Resources\Trainings\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class TrainingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(['default' => 1, 'lg' => 3])
                    ->schema([
                        // Kolom Kiri / Materi & Deskripsi Pelatihan
                        Group::make()
                            ->schema([
                                Section::make('Informasi Pelatihan & Workshop')
                                    ->description('Uraikan topik, tema, dan materi pelatihan atau sertifikasi.')
                                    ->icon('heroicon-o-presentation-chart-line')
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Nama Kegiatan / Pelatihan')
                                            ->placeholder('Contoh: Bimbingan Teknis Fasilitator Koding & AI Kemdikdasmen...')
                                            ->required()
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state)))
                                            ->maxLength(255),
                                        TextInput::make('slug')
                                            ->label('Permalink / Slug')
                                            ->placeholder('nama-pelatihan-otomatis')
                                            ->required()
                                            ->unique(ignoreRecord: true)
                                            ->maxLength(255),
                                        TextInput::make('theme')
                                            ->label('Tema / Fokus Pelatihan')
                                            ->placeholder('Contoh: Kecerdasan Artifisial Terapan & Python untuk Pendidik'),
                                        RichEditor::make('description')
                                            ->label('Deskripsi Materi Pelatihan')
                                            ->placeholder('Uraikan silabus pelatihan, metode praktikum, dan materi yang disampaikan...')
                                            ->fileAttachmentsDirectory('trainings/content')
                                            ->toolbarButtons([
                                                'attachFiles',
                                                'blockquote',
                                                'bold',
                                                'bulletList',
                                                'codeBlock',
                                                'h2',
                                                'h3',
                                                'italic',
                                                'link',
                                                'orderedList',
                                                'redo',
                                                'strike',
                                                'underline',
                                                'undo',
                                            ]),
                                    ]),

                                Section::make('Materi & Sertifikat Digital')
                                    ->icon('heroicon-o-link')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('slides_url')
                                                ->label('Tautan Slide / Materi')
                                                ->url()
                                                ->placeholder('https://...')
                                                ->prefix('📊'),
                                            TextInput::make('certificate_url')
                                                ->label('Tautan Sertifikat / Kredensial')
                                                ->url()
                                                ->placeholder('https://...')
                                                ->prefix('🎖️'),
                                        ]),
                                    ]),
                            ])
                            ->columnSpan(['default' => 1, 'lg' => 2]),

                        // Kolom Kanan / Sidebar Penyelenggara & Dokumentasi
                        Group::make()
                            ->schema([
                                Section::make('Penyelenggara & Waktu')
                                    ->icon('heroicon-o-calendar')
                                    ->schema([
                                        TextInput::make('organizer')
                                            ->label('Penyelenggara / Institusi')
                                            ->required()
                                            ->placeholder('Contoh: Kemdikdasmen RI / UNIPAR Manado'),
                                        TextInput::make('role')
                                            ->label('Peran / Jabatan')
                                            ->required()
                                            ->default('Pemateri / Fasilitator')
                                            ->placeholder('Contoh: Fasilitator Nasional, Keynote Speaker, Asesor'),
                                        DatePicker::make('event_date')
                                            ->label('Tanggal Pelaksanaan')
                                            ->default(now()),
                                        TextInput::make('location')
                                            ->label('Lokasi / Tempat')
                                            ->placeholder('Contoh: Manado / Hotel Grand Puri / Online Zoom'),
                                    ]),

                                Section::make('Foto Dokumentasi')
                                    ->icon('heroicon-o-photo')
                                    ->schema([
                                        FileUpload::make('image_url')
                                            ->label('Foto Kegiatan / Dokumentasi')
                                            ->image()
                                            ->imageEditor()
                                            ->directory('trainings/covers')
                                            ->maxSize(5120)
                                            ->helperText('Format JPG, PNG, WEBP maks 5MB.'),
                                    ]),

                                Section::make('Pengaturan Tampilan')
                                    ->icon('heroicon-o-adjustments-horizontal')
                                    ->schema([
                                        Toggle::make('is_featured')
                                            ->label('Pelatihan Unggulan')
                                            ->default(true),
                                        TextInput::make('order')
                                            ->label('Urutan Tampilan')
                                            ->numeric()
                                            ->default(0),
                                    ]),
                            ])
                            ->columnSpan(['default' => 1, 'lg' => 1]),
                    ]),
            ]);
    }
}
