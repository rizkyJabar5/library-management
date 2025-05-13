<?php

namespace App\Providers\Filament;

use App\Filament\Student\Pages\Auth\EditProfile;
use App\Settings\GeneralSettings;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use App\Filament\Student\Widgets\AccountWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class StudentPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('student')
            ->path('student')
            ->profile(EditProfile::class)
            ->favicon(fn (GeneralSettings $settings) => Storage::disk('public')
                ->url($settings->site_favicon))
            ->brandName(fn (GeneralSettings $settings) => $settings->site_name)
            ->brandLogo(fn (GeneralSettings $settings) => Storage::disk('public')
                ->url($settings->site_logo))
            ->darkModeBrandLogo(function (GeneralSettings $settings) {
                $darkBrandLogo = $settings->site_logo_dark
                ? $settings->site_logo_dark
                : $settings->site_logo;

                return Storage::disk('public')->url($darkBrandLogo);
            })
            ->brandLogoHeight(fn (GeneralSettings $settings) => $settings->site_logoHeight)
            ->colors([
                'primary' => Color::Emerald,
            ])
            ->globalSearchKeyBindings(['ctrl+k, command+k'])
            ->discoverResources(in: app_path('Filament/Student/Resources'), for: 'App\\Filament\\Student\\Resources')
            ->discoverPages(in: app_path('Filament/Student/Pages'), for: 'App\\Filament\\Student\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Student/Widgets'), for: 'App\\Filament\\Student\\Widgets')
            ->widgets([
                AccountWidget::class,
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
            ]);
    }
}
