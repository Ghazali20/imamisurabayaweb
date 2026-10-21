<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroSliderResource\Pages;
use App\Models\HeroSlider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HeroSliderResource extends Resource
{
    protected static ?string $model = HeroSlider::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'Banner Beranda (Hero)';
    protected static ?string $pluralModelLabel = 'Banner Beranda';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul Utama Baris Pertama (Warna Hitam)')
                    ->placeholder('Contoh: Mangaka ka kampuang,')
                    ->maxLength(255),
                Forms\Components\TextInput::make('highlight_title')
                    ->label('Judul Sorotan Baris Kedua (Warna Merah)')
                    ->placeholder('Contoh: Manjulang ka rantau')
                    ->maxLength(255),
                Forms\Components\Textarea::make('subtitle')
                    ->label('Keterangan / Slogan Banner')
                    ->rows(2),
                Forms\Components\FileUpload::make('image')
                    ->label('Gambar Banner (Landscape)')
                    ->image()
                    ->directory('hero-sliders')
                    ->required(),
                Forms\Components\Toggle::make('is_active')
                    ->label('Tampilkan di Beranda')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->square(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Utama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('highlight_title')
                    ->label('Judul Sorotan')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Aktif'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHeroSliders::route('/'),
            'create' => Pages\CreateHeroSlider::route('/create'),
            'edit' => Pages\EditHeroSlider::route('/{record}/edit'),
        ];
    }
}