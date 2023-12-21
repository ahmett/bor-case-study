<?php

namespace App\Providers;

use App\Contracts\Repositories\EmployeeRepositoryInterface;
use App\Contracts\Repositories\TrackRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Repositories\VehicleRepositoryInterface;
use App\Contracts\Services\AuthenticationServiceInterface;
use App\Contracts\Services\EmployeeServiceInterface;
use App\Contracts\Services\TrackServiceInterface;
use App\Contracts\Services\VehicleServiceInterface;
use App\Repositories\EmployeeRepository;
use App\Repositories\TrackRepository;
use App\Repositories\UserRepository;
use App\Repositories\VehicleRepository;
use App\Services\AuthenticationService;
use App\Services\EmployeeService;
use App\Services\TrackService;
use App\Services\VehicleService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [
        // Service bindings
        AuthenticationServiceInterface::class => AuthenticationService::class,
        TrackServiceInterface::class => TrackService::class,
        VehicleServiceInterface::class => VehicleService::class,
        EmployeeServiceInterface::class => EmployeeService::class,

        // Repository bindings
        UserRepositoryInterface::class => UserRepository::class,
        TrackRepositoryInterface::class => TrackRepository::class,
        VehicleRepositoryInterface::class => VehicleRepository::class,
        EmployeeRepositoryInterface::class => EmployeeRepository::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ($this->bindings as $abstract => $concrete) {
            $this->app->bind($abstract, fn () => new $concrete());
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
