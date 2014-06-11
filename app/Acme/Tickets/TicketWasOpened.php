<?php namespace Acme\Tickets; 

class TicketWasOpened
{
    /** @var Ticket */
    public $ticket;

    /**
     * @param Ticket $ticket
     */
    function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }
}