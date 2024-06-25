<?php

namespace App\Providers;

use App\Repositories\Badge\BadgeRepositoryInterface;
use App\Repositories\Badge\EloquentBadgeRepository;
use App\Repositories\CheckIn\CheckInRepositoryInterface;
use App\Repositories\CheckIn\EloquentCheckInRepository;
use App\Repositories\Garden\EloquentGardenRepository;
use App\Repositories\Garden\GardenRepositoryInterface;
use App\Repositories\Item\EloquentItemRepository;
use App\Repositories\Item\ItemRepositoryInterface;
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
        $this->app->bind(ItemRepositoryInterface::class, EloquentItemRepository::class);
        $this->app->bind(BadgeRepositoryInterface::class, EloquentBadgeRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
