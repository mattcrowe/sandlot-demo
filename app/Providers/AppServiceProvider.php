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
        //        // policies
//        $this->registerPolicies($gate);
//
//        // morphMap
//        Relation::morphMap([
//            'bottles' => App\Bottle::class,
//            'clients' => App\Client::class,
//            'colors' => App\Color::class,
//            'customized_bottles' => App\CustomizedBottle::class,
//            'demos' => App\Demo::class,
//        ]);
//
//        // observers
//        App\Client::observe(App\Observers\ClientObserver::class);
//        App\Demo::observe(App\Observers\DemoObserver::class);

        // route model binding
        $router->model('player', App\Player::class);
        $router->model('team', App\Team::class);
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
