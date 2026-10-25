<?php

namespace App\Filament\Resources\ResearchProjects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ResearchProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(['default' => 1, 'lg' => 3])
                    ->schema([
                        // Kolom Kiri / Substansi Penelitian
                        Group::make()
                            ->schema([
                                Section::make('Substansi & Naskah Riset')
                                    ->description('Informasi mendalam mengenai metodologi, hipotesis, dan luaran penelitian ilmiah.')
                                    ->icon('heroicon-o-beaker')
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Judul Penelitian / Riset')
                                            ->placeholder('Contoh: Speedy Vision-based Human Detection Using Lightweight Deep Learning Network...')
                                            ->required()
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state)))
                                            ->maxLength(255),
                                        TextInput::make('slug')
                                            ->label('Permalink / Slug')
                                            ->placeholder('judul-penelitian-otomatis')
                                            ->required()
                                            ->unique(ignoreRecord: true)
                                            ->maxLength(255),
                                        RichEditor::make('summary')
                                            ->label('Abstrak / Ringkasan Riset')
                                            ->placeholder('Uraikan latar belakang riset, rumusan masalah, metodologi, dan tujuan penelitian...')
                                            ->required()
                                            ->fileAttachmentsDirectory('research/content')
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
                                        RichEditor::make('output_results')
                                            ->label('Temuan & Luaran Penelitian')
                                            ->placeholder('Capaian riset: prototipe software/hardware, persentase akurasi model, publikasi terakreditasi, atau HKI...')
                                            ->toolbarButtons([
                                                'bold',
                                                'bulletList',
                                                'italic',
                                                'link',
                                                'orderedList',
                                                'redo',
                                                'undo',
                                            ]),
                                        TextInput::make('document_url')
                                            ->label('Tautan Naskah / Paper / DOI')
                                            ->url()
                                            ->placeholder('https://doi.org/... atau link repositori riset')
                                            ->prefix('📄'),
                                    ]),
                            ])
                            ->columnSpan(['default' => 1, 'lg' => 2]),

                        // Kolom Kanan / Sidebar Metadata & Pendanaan
                        Group::make()
                            ->schema([
                                Section::make('Data & Institusi')
                                    ->icon('heroicon-o-building-library')
                                    ->schema([
                                        Select::make('category')
                                            ->label('Bidang Fokus Riset')
                                            ->options([
                                                'Artificial Intelligence & Computer Vision' => 'AI & Computer Vision',
                                                'Internet of Things & Embedded System' => 'IoT & Embedded System',
                                                'Software Engineering & Database' => 'Rekayasa Perangkat Lunak & Database',
                                                'Educational Technology' => 'Teknologi Pendidikan & Vokasi',
                                            ])
                                            ->default('Artificial Intelligence & Computer Vision')
                                            ->required(),
                                        Select::make('status')
                                            ->label('Status Penelitian')
                                            ->options([
                                                'completed' => 'Selesai (Completed)',
                                                'ongoing' => 'Sedang Berjalan (Ongoing)',
                                            ])
                                            ->default('completed')
                                            ->required()
                                            ->native(false),
                                        TextInput::make('year')
                                            ->label('Tahun Pelaksanaan')
                                            ->required()
                                            ->default(date('Y'))
                                            ->prefix('📅'),
                                        TextInput::make('role')
                                            ->label('Peran Peneliti')
                                            ->required()
                                            ->default('Ketua Peneliti')
                                            ->placeholder('Contoh: Ketua Peneliti, Anggota Peneliti'),
                                        TextInput::make('funding_source')
                                            ->label('Sumber Pendanaan')
                                            ->placeholder('Contoh: Hibah Kemendiktisaintek, LPPM UNIPAR, Mandiri'),
                                        TextInput::make('partner_institution')
                                            ->label('Institusi / Mitra Kolaborasi')
                                            ->placeholder('Contoh: Universitas Parna Raya / UNDIKSHA'),
                                    ]),

                                Section::make('Diagram / Gambar Riset')
                                    ->icon('heroicon-o-photo')
                                    ->schema([
                                        FileUpload::make('image_url')
                                            ->label('Gambar Skema / Alur Riset')
                                            ->image()
                                            ->imageEditor()
                                            ->directory('research/covers')
                                            ->maxSize(5120)
                                            ->helperText('Format JPG, PNG, WEBP maks 5MB.'),
                                    ]),

                                Section::make('Pengaturan Tampilan')
                                    ->icon('heroicon-o-adjustments-horizontal')
                                    ->schema([
                                        Toggle::make('is_featured')
                                            ->label('Riset Unggulan')
                                            ->helperText('Tampilkan di beranda utama')
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
