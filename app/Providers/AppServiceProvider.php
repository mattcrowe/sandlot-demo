<?php

namespace App\Providers;

use App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(GateContract $gate, Router $router)
    {
        Schema::defaultStringLength(191);

        // morphMap
        Relation::morphMap([
            'notes' => App\Note::class,
        ]);

        // observers
        App\Note::observe(App\Observers\NoteObserver::class);

        // route model binding
        $router->model('note', App\Note::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {


    }
}
