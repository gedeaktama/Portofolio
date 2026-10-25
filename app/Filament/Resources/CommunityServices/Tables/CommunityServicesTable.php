<?php

namespace App\Filament\Resources\CommunityServices\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class CommunityServicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_url')
                    ->label('Dokumentasi')
                    ->rounded()
                    ->defaultImageUrl(asset('images/profile.png')),
                TextColumn::make('title')
                    ->label('Judul Kegiatan PKM')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->wrap(),
                TextColumn::make('role')
                    ->label('Peran')
                    ->badge()
                    ->color('primary')
                    ->searchable(),
                TextColumn::make('partner')
                    ->label('Mitra PKM')
                    ->searchable(),
                TextColumn::make('location')
                    ->label('Lokasi')
                    ->searchable(),
                TextColumn::make('year')
                    ->label('Tahun')
                    ->badge()
                    ->color('info')
                    ->sortable(),
                IconColumn::make('is_featured')
                    ->label('Unggulan')
                    ->boolean(),
                TextColumn::make('order')
                    ->label('Urutan')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
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
