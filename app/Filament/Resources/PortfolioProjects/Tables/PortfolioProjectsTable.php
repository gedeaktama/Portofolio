<?php

namespace App\Filament\Resources\PortfolioProjects\Tables;

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

class PortfolioProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_url')
                    ->label('Mockup')
                    ->rounded()
                    ->defaultImageUrl(asset('images/profile.png')),
                TextColumn::make('title')
                    ->label('Nama Proyek')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->wrap(),
                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->badge()
                    ->color('info')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'completed' => 'success',
                        'in_progress' => 'warning',
                        'maintenance' => 'gray',
                        default => 'info',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'completed' => 'Selesai',
                        'in_progress' => 'Pengerjaan',
                        'maintenance' => 'Maintenance',
                        default => ucfirst($state),
                    }),
                TextColumn::make('technologies')
                    ->label('Tech Stack')
                    ->badge()
                    ->color('gray')
                    ->separator(',')
                    ->limitList(3),
                IconColumn::make('is_featured')
                    ->label('Unggulan')
                    ->boolean(),
                TextColumn::make('order')
                    ->label('Urutan')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('project_category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name'),
                SelectFilter::make('status')
                    ->options([
                        'completed' => 'Selesai',
                        'in_progress' => 'Dalam Pengerjaan',
                        'maintenance' => 'Pemeliharaan',
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
