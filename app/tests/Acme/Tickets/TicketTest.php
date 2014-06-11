<?php namespace Acme\Tickets; 

class TicketTest extends \TestCase
{
    /** @test */
    function it_should_provide_event_was_submitted_event_when_an_event_is_open()
    {
        $ticket = new Ticket();
        $ticket->open("New ticket", "Description", []);

        $events = $ticket->releaseEvents();

        $this->assertCount(1, $events);
        $this->assertInstanceOf('Acme\Tickets\TicketWasOpened', $events[0]);
        $this->assertEquals($ticket, $events[0]->ticket);
    }

} 