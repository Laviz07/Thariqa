<?php

namespace App\Filament\Widgets;

use App\Models\Materi;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 0;

    protected function getColumns(): int
    {
        return 2;
    }

    protected function getStats(): array
    {
        return [
            Card::make('Jumlah Pengguna', User::count())
                ->description('Termasuk admin dan member')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('info'),

            Card::make('Jumlah Materi', Materi::count())
                ->description('Jumlah materi yang ada')
                ->descriptionIcon('heroicon-o-cube')
                ->color('primary'),
        ];
    }
}
