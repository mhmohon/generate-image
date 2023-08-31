<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ImageGenerateResource\Pages;
use App\Filament\Resources\ImageGenerateResource\RelationManagers;
use App\Models\ImageGenerate;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ImageGenerateResource extends Resource
{
    protected static ?string $model = ImageGenerate::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    Forms\Components\TextInput::make('keyword')
                        ->required()
                        ->maxLength(255)
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('keyword')
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'danger' => 'failed',
                        'warning' => 'processing',
                        'success' => fn ($state) => in_array($state, ['completed']),
                    ]),
                Tables\Columns\TextColumn::make('created_at')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('keyword'),
                TextEntry::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'processing' => 'gray',
                        'completed' => 'success',
                        'failed' => 'danger',
                    }),
                TextEntry::make('promot'),
                ImageEntry::make('src')->width(300)->height(300),
                TextEntry::make('response'),
                TextEntry::make('created_at')
                    ->since(),
            ])
            ->columns(1)
            ->inlineLabel();
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageImageGenerates::route('/'),
        ];
    }    
}
