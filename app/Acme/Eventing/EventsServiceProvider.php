<?php namespace Acme\Eventing; 

use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Event;

class EventsServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $events = Config::get('acme.events');
        /** @var Dispatcher $dispatcher */
        $dispatcher = $this->app['events'];

        foreach ($events as $event => $listener)
            $dispatcher->listen($event, $listener);
    }
}