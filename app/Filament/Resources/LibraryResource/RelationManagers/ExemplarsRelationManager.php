<?php

//namespace App\Filament\Resources\ExemplarResource\RelationManagers;
//namespace App\Filament\Resources\LibraryResource\RelationManagers;
namespace App\Filament\Resources\SectionResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExemplarsRelationManager extends RelationManager
{
    protected static string $relationship = 'exemplars';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                //Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('reference_code')->required(),
                Forms\Components\TextInput::make('state')->required(),
                //Forms\Components\TextInput::make('sacquisition_date')->required(),   
                Forms\Components\DatePicker::make('acquisition_date'), 
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                //Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('reference_code'),
                Tables\Columns\TextColumn::make('state'),
                Tables\Columns\TextColumn::make('acquisition_date'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
