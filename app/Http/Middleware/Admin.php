<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
      protected $events;
      public function __construct(Dispatcher $events){
       $this->events = $events;
      }
      public function handle($request, Closure $next)
      {
        if(\Auth::check()){
          if(\Auth::user()->role == 0){
            return $next($request);
          }
          else {
            return redirect()->route('login');
          }
        }
      }
}
