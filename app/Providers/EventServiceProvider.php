<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\DetalleCompraCreated;
use App\Observers\DetallecompraObserve;
use App\Observers\DetalleVentaObserver;
use App\Models\detallecompra;
use App\Models\detalleventa;
use App\Observers\AuthObserver;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    // protected $listen = [
    //     Registered::class => [
    //         SendEmailVerificationNotification::class,
    //     ],
    //     DetalleCompraCreated::class => [
    //         DetalleCompraObserver::class,
    //     ],
    // ];




    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        detallecompra::observe(DetallecompraObserve::class);
        detalleventa::observe(DetalleVentaObserver::class);

        Event::listen(Login::class, [AuthObserver::class, 'authenticated']);
        Event::listen(Logout::class, [AuthObserver::class, 'logout']);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }

    // protected $listen = [
    //     Login::class => [
    //         'App\Observers\AuthObserver@authenticated',
    //     ],
    //     Logout::class => [
    //         'App\Observers\AuthObserver@logout',
    //     ],
    // ];
}
