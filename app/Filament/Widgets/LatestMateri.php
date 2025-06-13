<?php

namespace App\Filament\Widgets;

use App\Models\Materi;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestMateri extends BaseWidget
{
    protected static ?string $heading = 'Materi Terbaru';
    protected bool $hasHeading = true;
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 1;

    public function table(Table $table): Table
    {
        return $table
            ->heading('Materi Terbaru')

            ->query(
                Materi::query()
                    ->with('user')
                    ->orderBy('created_at', 'desc')
                    ->limit(5)
            )

            ->columns([
                Tables\Columns\ImageColumn::make('img')
                    ->label('Gambar Materi')
                    ->getStateUsing(fn($record) => asset('storage/' . $record->img))
                    ->height(60)
                    ->width(130),

                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul Materi')
                    ->searchable(),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Penulis')
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->dateTime(),
            ]);
    }
}
