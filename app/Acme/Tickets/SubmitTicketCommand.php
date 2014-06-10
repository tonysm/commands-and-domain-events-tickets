<?php namespace Acme\Tickets; 

class SubmitTicketCommand
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public  $description;

    /**
     * @var array
     */
    public $tags;

    /**
     * @param string $title
     * @param string $description
     * @param array $tags
     */
    function __construct($title, $description, array $tags)
    {
        $this->title = $title;
        $this->description = $description;
        $this->tags = $tags;
    }
} 