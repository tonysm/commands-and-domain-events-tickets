<?php namespace Acme\Tickets;

use Acme\Core\Entity;
use Acme\Eventing\EventProvider;

class Tag extends Entity
{
    use EventProvider;

    public $timestamps = false;

    protected $visible = ['id', 'name'];
}