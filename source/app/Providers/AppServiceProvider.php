<?php

namespace App\Providers;

use App\Repositories\AlchemyFurnace\AlchemyFurnaceRepositoryInterface;
use App\Repositories\AlchemyFurnace\EloquentAlchemyFurnaceRepository;
use App\Repositories\Badge\BadgeRepositoryInterface;
use App\Repositories\Badge\EloquentBadgeRepository;
use App\Repositories\CheckIn\CheckInRepositoryInterface;
use App\Repositories\CheckIn\EloquentCheckInRepository;
use App\Repositories\CraftPotion\EloquentCraftPotionRepository;
use App\Repositories\Garden\EloquentGardenRepository;
use App\Repositories\Garden\GardenRepositoryInterface;
use App\Repositories\CraftPotion\CraftPotionRepositoryInterface;
use App\Repositories\Item\EloquentItemRepository;
use App\Repositories\Item\ItemRepositoryInterface;
use App\Repositories\Mine\EloquentMineRepository;
use App\Repositories\Mine\MineRepositoryInterface;
use App\Repositories\Potion\EloquentPotionRepository;
use App\Repositories\Potion\PotionRepositoryInterface;
use App\Repositories\Rank\EloquentRankRepository;
use App\Repositories\Rank\RankRepositoryInterface;
use App\Repositories\System\EloquentSystemRepository;
use App\Repositories\System\SystemRepositoryInterface;
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
        $this->app->bind(SystemRepositoryInterface::class, EloquentSystemRepository::class);
        $this->app->bind(RankRepositoryInterface::class, EloquentRankRepository::class);
        $this->app->bind(MineRepositoryInterface::class, EloquentMineRepository::class);
        $this->app->bind(PotionRepositoryInterface::class, EloquentPotionRepository::class);
        $this->app->bind(AlchemyFurnaceRepositoryInterface::class, EloquentAlchemyFurnaceRepository::class);
        $this->app->bind(CraftPotionRepositoryInterface::class, EloquentCraftPotionRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
