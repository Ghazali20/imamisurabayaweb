<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Galeri Kegiatan';

    protected static ?string $pluralModelLabel = 'Galeri Kegiatan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul Kegiatan')
                    ->required()
                    ->maxLength(255),

                Forms\Components\DatePicker::make('event_date')
                    ->label('Tanggal Kegiatan')
                    ->default(now()),

                Forms\Components\FileUpload::make('image')
                    ->label('Foto Kegiatan')
                    ->image()
                    ->directory('galleries')
                    ->visibility('public')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('description')
                    ->label('Keterangan / Deskripsi Singkat')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Foto'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Kegiatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('event_date')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}