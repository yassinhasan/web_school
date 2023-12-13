<?php

namespace App\Providers;

use App\Http\Interfaces\AttednacneRepositoryInterface;
use App\Http\Interfaces\PostRepositoryInterface;
use App\Http\Interfaces\SettingsRepositoryInterface;
use App\Http\Interfaces\ZoomRepositoryInterface;
use App\Http\Reposirtory\AttendanceRepository;
use App\Http\Reposirtory\PostRepository ;
use App\Http\Reposirtory\SettingsRepository;
use App\Http\Reposirtory\ZoomRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PostRepositoryInterface::class , PostRepository::class);
        $this->app->bind(ZoomRepositoryInterface::class,ZoomRepository::class);
        $this->app->bind(SettingsRepositoryInterface::class,SettingsRepository::class);
        $this->app->bind(AttednacneRepositoryInterface::class,AttendanceRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
