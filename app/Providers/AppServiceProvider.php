<?php

namespace App\Providers;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
      $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
        $event->menu->add(

        );
        if(\Auth::check()){
          if(\Auth::user()->role == 0){
            $event->menu->add('Admin');
            $event->menu->add(
              [
                'text' => 'Add Products',
                'url' => route('product.create'),
              ],
              [
                'text' => 'All Products',
                'url' => route('product.all'),
              ],
              [
                'text' => 'Create Order',
                'url' => route('order.create'),
              ],
              [
                'text' => 'All Orders',
                'url' => route('order.all'),
              ],

            );
          }
          else {
            $event->menu->add(
              [
                'text' => 'Make Order',
                'url' => route('order.create'),
              ],
              [
                'text' => 'My Orders',
                'url' => route('order.myOrders'),
              ],
            );
          }
        }
      });
    }
}
