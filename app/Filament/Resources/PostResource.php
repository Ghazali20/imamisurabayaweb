<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Berita & Galeri';

    protected static ?string $pluralModelLabel = 'Berita & Galeri';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state)))
                    ->label('Judul Kegiatan / Artikel'),

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->readOnly()
                    ->label('Slug URL'),

                Forms\Components\TextInput::make('author_name')
                    ->maxLength(255)
                    ->label('Nama Pengirim / Penulis Publik')
                    ->placeholder('Kosongkan jika dari pengurus'),

                Forms\Components\Toggle::make('is_published')
                    ->label('Publikasikan di Website Utama')
                    ->helperText('Matikan jika berita masih dalam tahap peninjauan (pending).')
                    ->default(true)
                    ->required(),

                Forms\Components\FileUpload::make('thumbnail')
                    ->image()
                    ->directory('posts')
                    ->visibility('public')
                    ->label('Foto Kegiatan / Poster')
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('instagram_post_url')
                    ->url()
                    ->maxLength(255)
                    ->placeholder('https://www.instagram.com/p/xxx/')
                    ->label('Link Postingan Instagram (Opsional)')
                    ->columnSpanFull(),

                Forms\Components\RichEditor::make('content')
                    ->nullable()
                    ->columnSpanFull()
                    ->label('Keterangan Kegiatan / Isi Artikel'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Foto'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->limit(40)
                    ->label('Judul'),
                Tables\Columns\TextColumn::make('author_name')
                    ->searchable()
                    ->label('Penulis / Pengirim')
                    ->placeholder('Pengurus IMAMI'),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean()
                    ->label('Tayang'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->label('Tanggal'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Status Tayang')
                    ->trueLabel('Sudah Dipublikasikan')
                    ->falseLabel('Menunggu Moderasi'),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}