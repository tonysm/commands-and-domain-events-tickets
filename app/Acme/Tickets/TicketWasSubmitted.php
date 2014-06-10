<?php namespace Acme\Tickets; 

class TicketWasSubmitted
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