<?php namespace Acme\Commanding; 

use Illuminate\Events\Dispatcher as LaravelDispatcher;
use Illuminate\Log\Writer;

class Dispatcher
{
    /**
     * @var LaravelDispatcher
     */
    private $eventsDispatcher;

    /**
     * @var \Illuminate\Log\Writer
     */
    private $logger;

    /**
     * @param LaravelDispatcher $eventsDispatcher
     * @param Writer $logger
     */
    function __construct(LaravelDispatcher $eventsDispatcher, Writer $logger)
    {
        $this->eventsDispatcher = $eventsDispatcher;
        $this->logger = $logger;
    }

    /**
     * @param array $events
     */
    public function dispatch(array $events)
    {
        foreach ($events as $event)
        {
            $event_name = $this->getEventName($event);
            $this->eventsDispatcher->fire($event_name, $event);

            $this->log($event_name);
        }
    }

    /**
     * @param $event
     * @return string
     */
    private function getEventName($event)
    {
        return str_replace("\\", '.', get_class($event));
    }

    /**
     * @param string $event_name
     */
    private function log($event_name)
    {
        $this->logger->info("Event was fired: {$event_name}");
    }
}