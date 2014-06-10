<?php namespace Acme\Eventing; 

interface EventProviderInterface
{
    /** @return array */
    public function releaseEvents();
} 