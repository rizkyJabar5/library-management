<?php

namespace App\Providers;

use App\Http\Responses\LogoutResponse;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Publisher;
use App\Models\Transaction;
use App\Models\User;
use App\Policies\UserPolicy;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse as LogoutResponseContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $singletons = [
        \Filament\Http\Responses\Auth\Contracts\LoginResponse::class => \App\Http\Responses\LoginResponse::class,
        \Filament\Http\Responses\Auth\Contracts\LogoutResponse::class => \App\Http\Responses\LogoutResponse::class,
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LogoutResponseContract::class, LogoutResponse::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(User::class, UserPolicy::class);
        Gate::policy(Author::class, UserPolicy::class);
        Gate::policy(Publisher::class, UserPolicy::class);
        Gate::policy(Genre::class, UserPolicy::class);
        Gate::policy(Book::class, UserPolicy::class);
        Gate::policy(Transaction::class, UserPolicy::class);

        Model::preventSilentlyDiscardingAttributes(! $this->app->isProduction());
        // Model::preventAccessingMissingAttributes(! $this->app->isProduction());
    }
}
