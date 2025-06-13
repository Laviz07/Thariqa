<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemberResource\Pages;
use App\Filament\Resources\MemberResource\RelationManagers;
use App\Models\User;
use Dom\Text;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class MemberResource extends Resource
{
    protected static ?string $model = User::class;


    protected static ?string $navigationLabel = 'Daftar Pengguna';

    protected static ?string $modelLabel = 'Pengguna';

    protected static ?string $pluralLabel = 'Daftar Pengguna';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama Panggilan Anggota Kelompok')
                    ->placeholder('masukan nama panggilan anggota kelompok')
                    ->autocapitalize('words')
                    ->required(),

                TextInput::make('full_name')
                    ->label('Nama Lengkap Anggota Kelompok')
                    ->placeholder('masukan nama lengkap anggota kelompok')
                    ->autocapitalize('words')
                    ->required(),

                TextInput::make('npm')
                    ->label('NPM')
                    ->numeric()
                    ->length(13)
                    ->placeholder('masukkan NPM')
                    ->required(),

                TextInput::make('email')
                    ->label('Email')
                    ->placeholder('masukkan email unsika')
                    ->required()
                    ->email(),

                TextInput::make('tugas')
                    ->label('Tugas Anggota Kelompok')
                    ->placeholder('masukan tugas anggota kelompok')
                    ->autocapitalize('words')
                    ->visible(fn($record) => Auth::user()->role === 'admin')
                    ->required(),

                Select::make('role')
                    ->options([
                        'admin' => 'Admin',
                        'member' => 'Member',
                    ])
                    ->visible(fn($record) => Auth::user()->role === 'admin')
                    ->required(),

                // Password dan konfirmasi password dalam Fieldset supaya rapih
                Fieldset::make('Password')
                    ->schema([
                        TextInput::make('password')
                            ->label('Password')
                            ->placeholder('Masukkan password baru jika ingin mengganti')
                            ->password()
                            ->revealable()
                            ->dehydrated(fn($state) => filled($state)) // hanya simpan jika diisi
                            ->required(fn($livewire, $get) => $livewire instanceof \App\Filament\Resources\MemberResource\Pages\CreateMember)
                            ->confirmed(), // harus sama dengan password_confirmation

                        TextInput::make('password_confirmation')
                            ->label('Konfirmasi Password')
                            ->placeholder('Konfirmasi password baru')
                            ->password()
                            ->revealable()
                            ->required(fn($livewire, $get) => $livewire instanceof \App\Filament\Resources\MemberResource\Pages\CreateMember),
                    ])
                    ->columns(2),

                FileUpload::make('avatar')
                    ->label('Gambar Anggota Kelompok (9:16)')
                    ->image()
                    ->directory('avatar')
                    ->disk('public')
                    ->visibility('public')
                    ->maxSize(1024)
                    ->maxFiles(4)
                    ->required()
                    ->columnSpanFull()
                    ->panelLayout('grid')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('user.avatar')
                    ->label('Foto Profil')
                    // ->getStateUsing(
                    //     fn($record) =>
                    //     $record->avatar
                    //         ? env('APP_URL') . '/storage/' . $record->avatar
                    //         : url('images/profile.png')
                    // )
                    ->getStateUsing(
                        fn($record) =>
                        $record->avatar
                            ? asset('storage/' . $record->avatar)
                            : asset('images/profile.png')
                    )
                    ->circular()
                    ->height(60)
                    ->width(60),

                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),

                TextColumn::make('full_name')
                    ->label('Nama Lengkap')
                    ->searchable(),

                TextColumn::make('npm')
                    ->label('NPM')
                    ->searchable(),

                // TextColumn::make('email')
                //     ->label('Email')
                //     ->searchable(),

                TextColumn::make('tugas')
                    ->label('Tugas')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->visible(fn($record) => Auth::user()->role === 'admin' || Auth::id() === $record->id),

                // Action::make('changePassword')
                //     ->label('Ubah Password')
                //     ->icon('heroicon-m-pencil-square')
                //     ->color('primary')
                //     ->form([
                //         TextInput::make('password')
                //             ->label('Password Baru')
                //             ->required()
                //             ->password()
                //             ->minLength(8)
                //             ->dehydrateStateUsing(fn($state) => bcrypt($state)),

                //         TextInput::make('password_confirmation')
                //             ->label('Konfirmasi Password Baru')
                //             ->required()
                //             ->password()
                //             ->minLength(8)
                //             ->same('password'),
                //     ])
                //     ->action(function (array $data, User $record) {
                //         // Simpan password baru
                //         $record->password = $data['password'];
                //         $record->save();

                //         // Optional: kasih notifikasi sukses
                //         \Filament\Notifications\Notification::make()
                //             ->title('Password berhasil diubah')
                //             ->success()
                //             ->send();
                //     })
                //     ->visible(fn($record) => Auth::user()->role === 'admin' || Auth::id() === $record->id),

                Tables\Actions\DeleteAction::make()
                    ->visible(fn() => Auth::user()->role === 'admin'),
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
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'edit' => Pages\EditMember::route('/{record}/edit'),
        ];
    }
}
