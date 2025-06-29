<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\LatestMateri;
use App\Filament\Widgets\StatsOverview;
use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard';

    protected static bool $shouldRegisterNavigation = false;

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class,
            LatestMateri::class,
        ];
    }
}
