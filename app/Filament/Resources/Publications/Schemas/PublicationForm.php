<?php

namespace App\Filament\Resources\Publications\Schemas;

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

class PublicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(['default' => 1, 'lg' => 3])
            ->components([
                // Kolom Kiri / Naskah Buku & Paper
                Group::make()
                            ->schema([
                                Section::make('Informasi Buku & Naskah Ilmiah')
                                    ->description('Judul, penulis, sinopsis buku, dan ringkasan karya ilmiah.')
                                    ->icon('heroicon-o-book-open')
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Judul Buku / Naskah Publikasi')
                                            ->placeholder('Contoh: Pemrograman Dasar Komputer dengan Python...')
                                            ->required()
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state)))
                                            ->maxLength(255),
                                        TextInput::make('slug')
                                            ->label('Permalink / Slug')
                                            ->placeholder('judul-buku-otomatis')
                                            ->required()
                                            ->unique(ignoreRecord: true)
                                            ->maxLength(255),
                                        TextInput::make('authors')
                                            ->label('Penulis / Kolaborator')
                                            ->required()
                                            ->default('Gede Erik Aktama, S.Pd., M.Pd.')
                                            ->placeholder('Gede Erik Aktama, S.Pd., M.Pd., dkk.'),
                                        RichEditor::make('abstract')
                                            ->label('Sinopsis Buku / Abstrak Publikasi')
                                            ->placeholder('Sinopsis lengkap buku referensi atau naskah jurnal...')
                                            ->fileAttachmentsDirectory('publications/content')
                                            ->toolbarButtons([
                                                'bold',
                                                'bulletList',
                                                'italic',
                                                'link',
                                                'orderedList',
                                                'redo',
                                                'undo',
                                            ]),
                                        TextInput::make('keywords')
                                            ->label('Kata Kunci (Keywords)')
                                            ->placeholder('Contoh: Python, Algoritma, Basis Data, Computer Vision, AI'),
                                    ]),

                                Section::make('Data Penerbitan, ISBN, & Akreditasi')
                                    ->description('Kredensial penerbit terdaftar IKAPI/Perpusnas, sertifikat HKI Kemenkumham, atau jurnal terindeks SINTA.')
                                    ->icon('heroicon-o-identification')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('journal_name')
                                                ->label('Penerbit / Nama Jurnal')
                                                ->required()
                                                ->placeholder('Contoh: CV. Inovasi Publishing Indonesia (IKAPI) / Jurnal Nasional'),
                                            TextInput::make('indexing_status')
                                                ->label('Status Indeks / No. ISBN / HKI')
                                                ->required()
                                                ->placeholder('Contoh: ISBN: 978-634-7568-29-8 atau HKI No. EC00202444536 atau SINTA 4'),
                                            TextInput::make('volume')
                                                ->label('Volume / Edisi / Cetakan')
                                                ->placeholder('Contoh: Cetakan Pertama (Februari 2026) / Vol. 8'),
                                            TextInput::make('issue')
                                                ->label('Issue / No. Sertifikat / Pencatatan')
                                                ->placeholder('Contoh: Sertifikat Penulis No. 150 / No. 2'),
                                            TextInput::make('pages')
                                                ->label('Jumlah Halaman / Range Hlm')
                                                ->placeholder('Contoh: 148 hlm atau 115-124'),
                                            TextInput::make('doi')
                                                ->label('DOI / No. Identifikasi Buku')
                                                ->placeholder('Contoh: ISBN 978-634-7568-29-8 atau 10.xxxx/xxx'),
                                        ]),
                                        TextInput::make('url')
                                            ->label('Tautan Verifikasi Resmi (SINTA / Scholar / Perpusnas / Penerbit)')
                                            ->url()
                                            ->placeholder('https://sinta.kemdiktisaintek.go.id/authors/profile/6798063')
                                            ->prefix('🔗'),
                                    ]),
                            ])
                            ->columnSpan(['default' => 1, 'lg' => 2]),

                        // Kolom Kanan / Sidebar Klasifikasi & Sampul/Sertifikat
                        Group::make()
                            ->schema([
                                Section::make('Kategori & Kepenulisan')
                                    ->icon('heroicon-o-tag')
                                    ->schema([
                                        Select::make('category')
                                            ->label('Kategori Karya')
                                            ->options([
                                                'Buku Referensi & Ajar' => 'Buku Referensi & Ajar (ISBN)',
                                                'Buku & Hak Cipta (HKI)' => 'Buku & Modul HKI Kemenkumham',
                                                'Computer Vision & AI' => 'Artikel Jurnal (AI & Vision)',
                                                'Internet of Things (IoT)' => 'Artikel Jurnal (IoT)',
                                                'Sistem Cerdas & Komputasi' => 'Artikel Jurnal (Sistem Cerdas)',
                                            ])
                                            ->default('Buku Referensi & Ajar')
                                            ->required(),
                                        TextInput::make('publication_year')
                                            ->label('Tahun Terbit')
                                            ->required()
                                            ->numeric()
                                            ->default(date('Y'))
                                            ->prefix('📅'),
                                        Toggle::make('is_first_author')
                                            ->label('Penulis Pertama (First Author)')
                                            ->default(true),
                                        Toggle::make('is_published')
                                            ->label('Publikasikan di Web')
                                            ->default(true),
                                        TextInput::make('order')
                                            ->label('Urutan Tampilan')
                                            ->numeric()
                                            ->default(0),
                                    ]),

                                Section::make('Sertifikat / Sampul Buku')
                                    ->icon('heroicon-o-photo')
                                    ->schema([
                                        FileUpload::make('file_path')
                                            ->label('Upload Sertifikat Penerbit / Sampul Buku')
                                            ->image()
                                            ->imageEditor()
                                            ->directory('books')
                                            ->maxSize(5120)
                                            ->helperText('Gambar sertifikat penerbit atau sampul buku.'),
                                    ]),
                            ])
                            ->columnSpan(['default' => 1, 'lg' => 1]),
            ]);
    }
}
