<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExemplarResource\Pages;
use App\Filament\Resources\ExemplarResource\RelationManagers;
use App\Models\Exemplar;
use App\Models\Section;
use App\Models\MaterialsCatalog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExemplarResource extends Resource
{
    protected static ?string $model = Exemplar::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('reference_code')->required(),
                Forms\Components\TextInput::make('state')->required(), 
                Forms\Components\DatePicker::make('acquisition_date'), 
                Forms\Components\Select::make('section_id')
                    ->label('Section')
                    ->options(Section::all()->pluck('name', 'id'))
                    ->searchable(),
                Forms\Components\Select::make('catalog_id')
                    ->label('MaterialsCatalog')
                    ->options(MaterialsCatalog::all()->pluck('name', 'id'))
                    ->searchable()
            ]);
    }

    public function save(array $data): void
    {
    
        $section = Section::find($data['section_id']);

        if ($section) {
        // Asigna el library_id al modelo
        $data['library_id'] = $section->library_id;
    }

    // Luego guarda el modelo con los datos
    $this->record->fill($data)->save();
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('reference_code'),
                Tables\Columns\TextColumn::make('state'),
                Tables\Columns\TextColumn::make('acquisition_date'),
                Tables\Columns\TextColumn::make('section_id.name'),
                Tables\Columns\TextColumn::make('library_id.name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListExemplars::route('/'),
            'create' => Pages\CreateExemplar::route('/create'),
            'edit' => Pages\EditExemplar::route('/{record}/edit'),
        ];
    }
}
