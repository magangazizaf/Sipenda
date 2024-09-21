<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Http\Services\KelasService;
use App\Http\Services\Impl\KelasServiceImpl;
use App\Http\Services\DosenService;
use App\Http\Services\MahasiswaService;
use App\Http\Services\Impl\DosenServiceImpl;
use App\Http\Services\Impl\MahasiswaServiceImpl;

use Exception;
use PDOException;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(KelasService::class, KelasServiceImpl::class);
        $this->app->bind(DosenService::class, DosenServiceImpl::class);
        $this->app->bind(MahasiswaService::class, MahasiswaServiceImpl::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Handle offline database

        //Use bootstrap 4 for pagination css
        Paginator::useBootstrapFour();
    }
}
