<?php namespace Acme\Eventing; 

trait EventProvider
{
    /**
     * @var array
     */
    protected $pendingEvents = [];

    /**
     * @param mixed $event
     */
    protected function raise($event)
    {
        $this->pendingEvents[] = $event;
    }

    /**
     * @return array
     */
    public function releaseEvents()
    {
        $events = $this->pendingEvents;

        $this->pendingEvents = [];

        return $events;
    }
}