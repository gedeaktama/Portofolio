<?php

namespace App\Filament\Resources\Publications\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class PublicationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('slug')
                    ->searchable(),
                TextColumn::make('authors')
                    ->searchable(),
                IconColumn::make('is_first_author')
                    ->boolean(),
                TextColumn::make('publication_year')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('journal_name')
                    ->searchable(),
                TextColumn::make('indexing_status')
                    ->searchable(),
                TextColumn::make('volume')
                    ->searchable(),
                TextColumn::make('issue')
                    ->searchable(),
                TextColumn::make('pages')
                    ->searchable(),
                TextColumn::make('doi')
                    ->searchable(),
                TextColumn::make('url')
                    ->searchable(),
                TextColumn::make('keywords')
                    ->searchable(),
                TextColumn::make('category')
                    ->searchable(),
                TextColumn::make('file_path')
                    ->searchable(),
                IconColumn::make('is_published')
                    ->boolean(),
                TextColumn::make('order')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
