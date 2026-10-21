<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationLabel = 'Kegiatan Mendatang';

    protected static ?string $pluralModelLabel = 'Kegiatan Mendatang';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Nama Kegiatan')
                    ->required()
                    ->maxLength(255),

                Forms\Components\DatePicker::make('event_date')
                    ->label('Tanggal Pelaksanaan')
                    ->required()
                    ->default(now()),

                Forms\Components\TextInput::make('location')
                    ->label('Lokasi Kegiatan')
                    ->placeholder('misal: Kampus Surabaya / Gedung Serbaguna')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('category')
                    ->label('Kategori')
                    ->options([
                        'Rutin' => 'Rutin',
                        'Edukasi' => 'Edukasi',
                        'Internal' => 'Internal',
                        'Umum' => 'Umum',
                    ])
                    ->default('Rutin')
                    ->required(),

                Forms\Components\TextInput::make('link_url')
                    ->label('Link Pendaftaran / Info (Opsional)')
                    ->placeholder('https://...')
                    ->url()
                    ->maxLength(255)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Nama Kegiatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('event_date')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('location')
                    ->label('Lokasi'),
                Tables\Columns\BadgeColumn::make('category')
                    ->label('Kategori')
                    ->colors([
                        'primary' => 'Rutin',
                        'success' => 'Edukasi',
                        'warning' => 'Internal',
                        'danger' => 'Umum',
                    ]),
            ])
            ->defaultSort('event_date', 'asc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}