<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\Facades\Gate;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->topNavigation()
            // ->login()
            ->colors([
                'primary' => Color::Green,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            // ->pages([
            //     Pages\Dashboard::class,
            // ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                // Authenticate::class,
                'isAdmin', 'isMember',
            ]);
    }

    public function boot(): void
    {
        // Batasi akses hanya untuk admin & member
        Gate::define('viewFilament', function ($user) {
            return in_array($user->role, ['admin', 'member']);
        });

        Filament::serving(function () {
            Filament::auth(fn() => auth()->check() && Gate::allows('viewFilament'));

            Filament::registerNavigationGroups([
                NavigationGroup::make()
                    ->label('Home')
                    ->icon('heroicon-o-home-modern'),

                NavigationGroup::make()
                    ->label('Tentang Kami')
                    ->icon('heroicon-o-information-circle'),

                NavigationGroup::make()
                    ->label('Materi')
                    ->icon('heroicon-o-book-open'),
            ]);

            Filament::registerNavigationItems([
                // Grup "Home"
                NavigationItem::make('Dashboard')
                    ->group('Home')
                    ->url(fn() => route('filament.admin.pages.dashboard')),

                NavigationItem::make('Beranda')
                    ->group('Home')
                    ->url(fn() => route('home')),

                // Grup "Materi"
                NavigationItem::make('Kelola Materi')
                    ->group('Materi')
                    ->url(fn() => route('filament.admin.resources.materis.index')),

                NavigationItem::make('Daftar Materi')
                    ->group('Materi')
                    ->url(fn() => route('materi')),

                // Grup "Tentang Kami"
                NavigationItem::make('Tentang Kami')
                    ->group('Tentang Kami')
                    ->url(fn() => route('about')),

                NavigationItem::make('Daftar Pengguna')
                    ->group('Tentang Kami')
                    ->url(fn() => route('filament.admin.resources.members.index')),
            ]);
        });
    }
}
