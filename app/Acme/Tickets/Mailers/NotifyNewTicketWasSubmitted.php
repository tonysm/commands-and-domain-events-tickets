<?php namespace Acme\Tickets\Mailers;

use Acme\Tickets\TicketWasSubmitted;
use Illuminate\Log\Writer;

class NotifyNewTicketWasSubmitted
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
     * @param TicketWasSubmitted $event
     */
    public function handle($event)
    {
        $this->logger->info($event->ticket);
    }
} 