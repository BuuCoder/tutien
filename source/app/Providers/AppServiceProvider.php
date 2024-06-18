<?php

namespace App\Providers;

use App\Repositories\CheckIn\CheckInRepositoryInterface;
use App\Repositories\CheckIn\EloquentCheckInRepository;
use App\Repositories\Garden\EloquentGardenRepository;
use App\Repositories\Garden\GardenRepositoryInterface;
use App\Repositories\PasswordResetToken\EloquentPasswordResetTokenRepository;
use App\Repositories\PasswordResetToken\PasswordResetTokenRepositoryInterface;
use App\Repositories\Session\EloquentSessionRepository;
use App\Repositories\Session\SessionRepositoryInterface;
use App\Repositories\User\EloquentUserRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, EloquentUserRepository::class);
        $this->app->bind(CheckInRepositoryInterface::class, EloquentCheckInRepository::class);
        $this->app->bind(GardenRepositoryInterface::class, EloquentGardenRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
