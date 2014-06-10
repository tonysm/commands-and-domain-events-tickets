<?php

use Acme\Tickets\SubmitTicketCommand;
use Acme\Tickets\Tag;
use Acme\Tickets\Ticket;

class TicketsController extends BaseController
{
    /**
     * @return mixed
     */
    public function index()
    {
        $tickets = Ticket::newer()->paginate(10);

        return $this->render("tickets.index", compact('tickets'));
    }

    /**
     * @return mixed
     */
    public function create()
    {
        $tags = Tag::all();

        return $this->render('tickets.create', compact('tags'));
    }

    /**
     * @return mixed
     */
    public function store()
    {
        $command = new SubmitTicketCommand(
            Input::get("title"),
            Input::get('description'),
            (array) Input::get('tags')
        );

        $ticket = $this->commandBus->execute($command);

        return $this->redirectRoute("tickets.show", $ticket->id);
    }

    /**
     * @param string|int $ticket_id
     * @return mixed
     */
    public function show($ticket_id)
    {
        $ticket = Ticket::with("tags")->findOrFail($ticket_id);
        return $this->render("tickets.show", compact('ticket'));
    }

}