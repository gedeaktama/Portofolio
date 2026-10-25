<?php

namespace App\Filament\Resources\PortfolioProjects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PortfolioProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(['default' => 1, 'lg' => 3])
            ->components([
                // Kolom Kiri / Informasi Utama Proyek
                Group::make()
                            ->schema([
                                Section::make('Detail & Narasi Proyek')
                                    ->description('Uraikan latar belakang masalah, solusi rekayasa, dan fitur-fitur unggulan sistem.')
                                    ->icon('heroicon-o-cpu-chip')
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Nama Proyek / Aplikasi')
                                            ->placeholder('Contoh: Sistem Informasi Akademik & RPL Berbasis Cloud...')
                                            ->required()
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state)))
                                            ->maxLength(255),
                                        TextInput::make('slug')
                                            ->label('Permalink / Slug')
                                            ->placeholder('nama-proyek-otomatis')
                                            ->required()
                                            ->unique(ignoreRecord: true)
                                            ->maxLength(255),
                                        Textarea::make('problem_statement')
                                            ->label('Tantangan / Latar Belakang Masalah')
                                            ->placeholder('Jelaskan permasalahan riil yang melatarbelakangi dibangunnya proyek ini...')
                                            ->rows(3),
                                        RichEditor::make('solution_description')
                                            ->label('Solusi & Implementasi Teknis')
                                            ->placeholder('Uraikan arsitektur sistem, algoritma, serta bagaimana solusi ini mengatasi masalah...')
                                            ->required()
                                            ->fileAttachmentsDirectory('projects/content')
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
                                        RichEditor::make('key_features')
                                            ->label('Fitur-Fitur Kunci Sistem')
                                            ->placeholder('Daftar kapabilitas utama sistem yang telah dibangun...')
                                            ->toolbarButtons([
                                                'bold',
                                                'bulletList',
                                                'italic',
                                                'link',
                                                'orderedList',
                                                'redo',
                                                'undo',
                                            ]),
                                    ]),

                                Section::make('Tautan & Akses Demo')
                                    ->icon('heroicon-o-globe-alt')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('demo_url')
                                                ->label('Tautan Live / Demo Web')
                                                ->url()
                                                ->placeholder('https://...')
                                                ->prefix('🌐'),
                                            TextInput::make('repository_url')
                                                ->label('Repositori Kode (GitHub / GitLab)')
                                                ->url()
                                                ->placeholder('https://github.com/...')
                                                ->prefix('💻'),
                                        ]),
                                    ]),
                            ])
                            ->columnSpan(['default' => 1, 'lg' => 2]),

                        // Kolom Kanan / Sidebar Klasifikasi & Mockup
                        Group::make()
                            ->schema([
                                Section::make('Klasifikasi & Status')
                                    ->icon('heroicon-o-tag')
                                    ->schema([
                                        Select::make('project_category_id')
                                            ->label('Kategori Proyek')
                                            ->relationship('category', 'name')
                                            ->searchable()
                                            ->preload()
                                            ->createOptionForm([
                                                TextInput::make('name')
                                                    ->label('Nama Kategori')
                                                    ->required()
                                                    ->live(onBlur: true)
                                                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                                                TextInput::make('slug')
                                                    ->label('Slug')
                                                    ->required(),
                                            ]),
                                        Select::make('status')
                                            ->label('Status Pengerjaan')
                                            ->options([
                                                'completed' => 'Selesai (Completed / Live)',
                                                'in_progress' => 'Dalam Pengerjaan (In Progress)',
                                                'maintenance' => 'Pemeliharaan (Maintenance)',
                                            ])
                                            ->default('completed')
                                            ->required()
                                            ->native(false),
                                        TagsInput::make('technologies')
                                            ->label('Teknologi / Stack')
                                            ->placeholder('Ketik tag lalu enter...')
                                            ->suggestions([
                                                'Laravel',
                                                'Vue.js',
                                                'React',
                                                'Python',
                                                'YOLOv8',
                                                'OpenCV',
                                                'Tailwind CSS',
                                                'MySQL',
                                                'PostgreSQL',
                                                'Docker',
                                                'IoT',
                                                'ESP32',
                                                'Filament CMS',
                                            ]),
                                    ]),

                                Section::make('Tangkapan Layar / Cover')
                                    ->icon('heroicon-o-photo')
                                    ->schema([
                                        FileUpload::make('image_url')
                                            ->label('Gambar Mockup / Screenshot')
                                            ->image()
                                            ->imageEditor()
                                            ->directory('projects/covers')
                                            ->maxSize(5120)
                                            ->helperText('Format JPG, PNG, WEBP maks 5MB.'),
                                    ]),

                                Section::make('Pengaturan Tampilan')
                                    ->icon('heroicon-o-adjustments-horizontal')
                                    ->schema([
                                        Toggle::make('is_featured')
                                            ->label('Proyek Unggulan')
                                            ->helperText('Tampilkan di etalase beranda utama')
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
