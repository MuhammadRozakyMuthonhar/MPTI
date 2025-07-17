<?php

namespace App\Providers;

use Filament\Panel;
use Filament\PanelProvider;
use Illuminate\Support\Facades\Auth;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('admin')
            ->path('admin')
            ->login() // ⛔ Tidak perlu `auth()` di sini
            ->authGuard('web') // ✅ Pakai guard yang sesuai
            ->middleware([
                StartSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
