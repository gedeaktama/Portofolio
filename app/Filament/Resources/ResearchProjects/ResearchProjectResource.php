<?php

namespace App\Filament\Resources\ResearchProjects;

use App\Filament\Resources\ResearchProjects\Pages\CreateResearchProject;
use App\Filament\Resources\ResearchProjects\Pages\EditResearchProject;
use App\Filament\Resources\ResearchProjects\Pages\ListResearchProjects;
use App\Filament\Resources\ResearchProjects\Schemas\ResearchProjectForm;
use App\Filament\Resources\ResearchProjects\Tables\ResearchProjectsTable;
use App\Models\ResearchProject;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ResearchProjectResource extends Resource
{
    protected static ?string $model = ResearchProject::class;
    protected static string|\UnitEnum|null $navigationGroup = 'Akademik & Riset';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Penelitian & Riset';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBeaker;

    public static function form(Schema $schema): Schema
    {
        return ResearchProjectForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ResearchProjectsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListResearchProjects::route('/'),
            'create' => CreateResearchProject::route('/create'),
            'edit' => EditResearchProject::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}

