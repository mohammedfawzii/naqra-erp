<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Test\TestRepository;
use App\Repositories\Blogs\BlogsRepository;
use App\Repositories\Artical\ArticalRepository;
use App\Repositories\Test\TestRepositoryInterface;
use App\Repositories\Blogs\BlogsRepositoryInterface;
use App\Repositories\Artical\ArticalRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       Model::unguard();

    }
}
