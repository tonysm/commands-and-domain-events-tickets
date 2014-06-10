<?php namespace Acme\Core;

use Acme\Eventing\EventProviderInterface;
use Illuminate\Database\Eloquent\Model;

abstract class Entity extends Model implements EventProviderInterface
{
}