<?php

namespace App\Filament\Resources\Publications\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class PublicationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('file_path')
                    ->label('Sertifikat / Sampul')
                    ->rounded()
                    ->defaultImageUrl(asset('images/profile.png')),
                TextColumn::make('title')
                    ->label('Judul Karya')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->wrap(),
                TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Buku Referensi & Ajar' => 'success',
                        'Buku & Hak Cipta (HKI)' => 'warning',
                        default => 'info',
                    })
                    ->searchable(),
                TextColumn::make('indexing_status')
                    ->label('ISBN / HKI / Akreditasi')
                    ->badge()
                    ->color('gray')
                    ->searchable(),
                TextColumn::make('journal_name')
                    ->label('Penerbit / Jurnal')
                    ->searchable()
                    ->limit(25),
                TextColumn::make('publication_year')
                    ->label('Tahun')
                    ->sortable(),
                IconColumn::make('is_published')
                    ->label('Publik')
                    ->boolean(),
                TextColumn::make('order')
                    ->label('Urutan')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->label('Kategori'),
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
