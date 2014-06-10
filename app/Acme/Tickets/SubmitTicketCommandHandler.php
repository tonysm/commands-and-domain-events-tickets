<?php namespace Acme\Tickets; 

use Acme\Commanding\Dispatcher;

class SubmitTicketCommandHandler
{
    /**
     * @var Ticket
     */
    private $ticket;
    /**
     * @var \Acme\Commanding\Dispatcher
     */
    private $dispatcher;

    function __construct(Ticket $ticket, Dispatcher $dispatcher)
    {
        $this->ticket = $ticket;
        $this->dispatcher = $dispatcher;
    }

    public function handle($command)
    {
        $ticket = $this->ticket->submit($command->title, $command->description, $command->tags);

        $this->dispatcher->dispatch($ticket->releaseEvents());

        return $ticket;
    }
}