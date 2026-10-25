<?php

namespace App\Filament\Resources\BlogPosts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class BlogPostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(['default' => 1, 'lg' => 3])
            ->components([
                // Kolom Kiri / Konten Utama (WordPress Editor Area)
                        Group::make()
                            ->schema([
                                Section::make('Editor Konten Artikel')
                                    ->description('Tulis naskah artikel, ringkasan, dan konten lengkap dengan editor visual kaya fitur.')
                                    ->icon('heroicon-o-document-text')
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Judul Artikel')
                                            ->placeholder('Masukkan judul artikel yang menarik...')
                                            ->required()
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state)))
                                            ->maxLength(255),
                                        TextInput::make('slug')
                                            ->label('Permalink / Slug')
                                            ->placeholder('judul-artikel-otomatis')
                                            ->required()
                                            ->unique(ignoreRecord: true)
                                            ->maxLength(255)
                                            ->helperText('URL ramah mesin pencari, otomatis dibuat dari judul.'),
                                        Textarea::make('summary')
                                            ->label('Ringkasan Singkat (Excerpt)')
                                            ->placeholder('Tulis ringkasan singkat artikel untuk ditampilkan di feed kartu pratinjau dan media sosial...')
                                            ->rows(3),
                                        RichEditor::make('content')
                                            ->label('Isi Artikel Lengkap')
                                            ->placeholder('Mulai menulis artikel di sini... Gunakan heading, gambar, kutipan, dan kode untuk memperkaya artikel.')
                                            ->required()
                                            ->fileAttachmentsDirectory('posts/content')
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

                                Section::make('Optimasi Mesin Pencari (SEO)')
                                    ->description('Sesuaikan pratinjau artikel saat muncul di hasil pencarian Google.')
                                    ->icon('heroicon-o-magnifying-glass')
                                    ->collapsed()
                                    ->schema([
                                        TextInput::make('seo_title')
                                            ->label('Judul SEO (Meta Title)')
                                            ->placeholder('Biarkan kosong jika sama dengan judul artikel')
                                            ->maxLength(70),
                                        Textarea::make('meta_description')
                                            ->label('Deskripsi Meta (Meta Description)')
                                            ->placeholder('Deskripsi ringkas yang memikat pembaca di hasil pencarian (maksimal 160 karakter)...')
                                            ->rows(3)
                                            ->maxLength(160),
                                    ]),
                            ])
                            ->columnSpan(['default' => 1, 'lg' => 2]),

                        // Kolom Kanan / Sidebar WordPress (Publikasi, Kategori, Cover)
                        Group::make()
                            ->schema([
                                Section::make('Status & Terbit')
                                    ->icon('heroicon-o-paper-airplane')
                                    ->schema([
                                        Select::make('status')
                                            ->label('Status Publikasi')
                                            ->options([
                                                'draft' => 'Draft (Konsep)',
                                                'published' => 'Published (Diterbitkan)',
                                                'archived' => 'Archived (Diarsipkan)',
                                            ])
                                            ->default('published')
                                            ->required()
                                            ->native(false),
                                        DateTimePicker::make('published_at')
                                            ->label('Jadwal Terbit')
                                            ->default(now()),
                                        Toggle::make('is_featured')
                                            ->label('Jadikan Artikel Unggulan')
                                            ->helperText('Tampilkan di sorotan utama beranda')
                                            ->default(false),
                                        TextInput::make('reading_time_minutes')
                                            ->label('Estimasi Baca (Menit)')
                                            ->numeric()
                                            ->default(5)
                                            ->prefix('⏱️'),
                                        TextInput::make('views_count')
                                            ->label('Jumlah Pembaca')
                                            ->numeric()
                                            ->default(0)
                                            ->disabled()
                                            ->dehydrated(),
                                    ]),

                                Section::make('Kategori & Taksonomi')
                                    ->icon('heroicon-o-folder')
                                    ->schema([
                                        Select::make('blog_category_id')
                                            ->label('Kategori')
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
                                        Select::make('tags')
                                            ->label('Tag / Label')
                                            ->relationship('tags', 'name')
                                            ->multiple()
                                            ->searchable()
                                            ->preload()
                                            ->createOptionForm([
                                                TextInput::make('name')
                                                    ->label('Nama Tag')
                                                    ->required()
                                                    ->live(onBlur: true)
                                                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                                                TextInput::make('slug')
                                                    ->label('Slug')
                                                    ->required(),
                                            ]),
                                        Select::make('user_id')
                                            ->label('Penulis')
                                            ->relationship('author', 'name')
                                            ->searchable()
                                            ->preload()
                                            ->default(fn () => auth()->id()),
                                    ]),

                                Section::make('Gambar Utama (Cover)')
                                    ->icon('heroicon-o-photo')
                                    ->schema([
                                        FileUpload::make('featured_image')
                                            ->label('Upload Cover Artikel')
                                            ->image()
                                            ->imageEditor()
                                            ->directory('posts/covers')
                                            ->maxSize(5120)
                                            ->helperText('Format JPG, PNG, WEBP maks 5MB.'),
                                    ]),
                            ])
                            ->columnSpan(['default' => 1, 'lg' => 1]),
            ]);
    }
}
