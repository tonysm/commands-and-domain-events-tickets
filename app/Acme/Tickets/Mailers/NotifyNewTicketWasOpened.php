<?php namespace Acme\Tickets\Mailers;

use Acme\Tickets\TicketWasOpened;
use Illuminate\Log\Writer;

class NotifyNewTicketWasOpened
{
    /**
     * @var \Illuminate\Log\Writer
     */
    private $logger;

    /**
     * @param Writer $logger
     */
    function __construct(Writer $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param TicketWasOpened $event
     */
    public function handle($event)
    {
        $this->logger->info($event->ticket);
    }
} 