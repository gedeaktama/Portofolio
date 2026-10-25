<?php

namespace App\Filament\Resources\ResearchProjects\Tables;

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

class ResearchProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_url')
                    ->label('Diagram')
                    ->rounded()
                    ->defaultImageUrl(asset('images/profile.png')),
                TextColumn::make('title')
                    ->label('Judul Penelitian')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->wrap(),
                TextColumn::make('category')
                    ->label('Bidang Riset')
                    ->badge()
                    ->color('info')
                    ->searchable(),
                TextColumn::make('role')
                    ->label('Peran')
                    ->badge()
                    ->color('primary')
                    ->searchable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'completed' => 'success',
                        'ongoing' => 'warning',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'completed' => 'Selesai',
                        'ongoing' => 'Berjalan',
                        default => ucfirst($state),
                    }),
                TextColumn::make('year')
                    ->label('Tahun')
                    ->sortable(),
                TextColumn::make('funding_source')
                    ->label('Pendanaan')
                    ->searchable()
                    ->toggleable(),
                IconColumn::make('is_featured')
                    ->label('Unggulan')
                    ->boolean(),
                TextColumn::make('order')
                    ->label('Urutan')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->label('Bidang Fokus'),
                SelectFilter::make('status')
                    ->options([
                        'completed' => 'Selesai',
                        'ongoing' => 'Berjalan',
                    ]),
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
