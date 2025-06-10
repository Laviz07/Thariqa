<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MateriResource\Pages;
use App\Filament\Resources\MateriResource\RelationManagers;
use App\Models\Materi;
use Faker\Provider\Image;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MateriResource extends Resource
{
    protected static ?string $model = Materi::class;

    protected static ?string $navigationLabel = 'Daftar Materi';

    protected static ?string $modelLabel = 'Materi';

    protected static ?string $pluralLabel = 'Daftar Materi';

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('judul')
                    ->label('Judul Materi')
                    ->placeholder('masukan judul materi')
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                    ->required(),

                TextInput::make('slug')
                    ->label('Slug Materi')
                    ->readOnly(),

                Repeater::make('materi_contents')
                    ->label('Materi')
                    ->relationship()
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('subjudul')
                            ->label('Sub Judul Materi')
                            ->placeholder('masukan sub judul materi')
                            ->required(),

                        RichEditor::make('isi')
                            ->label('Isi Materi')
                            ->placeholder('masukan isi materi')
                            ->toolbarButtons([
                                'blockquote',
                                'bold',
                                'bulletList',
                                'codeBlock',
                                'h2',
                                'h3',
                                'italic',
                                'link',
                                'orderedList',
                                'redo',
                                'strike',
                                'underline',
                                'undo',
                            ])
                            ->required(),
                    ])
                    ->createItemButtonLabel('Tambah Isi Materi')
                    ->collapsible(),

                FileUpload::make('img')
                    ->label('Gambar Materi (16:9)')
                    ->image()
                    ->directory('materi_img')
                    ->disk('public')
                    ->visibility('public')
                    ->maxSize(1024)
                    ->required()
                    ->columnSpanFull()
                    ->panelLayout('grid'),

                Hidden::make('user_id')
                    ->default(fn() => Auth::id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('Gambar Materi')
                    ->getStateUsing(fn($record) => env('APP_URL') . '/storage/' . $record->img ?? '')
                    ->circular()
                    ->height(60)
                    ->width(60),

                TextColumn::make('judul')
                    ->label('Judul Materi')
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label('Penulis')
                    ->searchable()
                    ->formatStateUsing(fn(string $state) => ucwords($state)),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListMateris::route('/'),
            'create' => Pages\CreateMateri::route('/create'),
            'edit' => Pages\EditMateri::route('/{record}/edit'),
        ];
    }
}
