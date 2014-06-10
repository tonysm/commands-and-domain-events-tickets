<?php namespace Acme\Tickets; 

use Acme\Core\Entity;
use Acme\Eventing\EventProvider;
use Illuminate\Database\Eloquent\Builder;

class Ticket extends Entity
{
    use EventProvider;

    protected $fillable = ['title', 'description'];

    /**
     * @param string $title
     * @param string $description
     * @param array $tags
     * @return Ticket
     */
    public function submit($title, $description, array $tags = [])
    {
        $this->attributes = ['title' => $title, 'description' => $description];
        $this->save();

        $this->tags()->saveMany(Tag::whereIn('id', $tags)->get()->all());
        // loading tags
        $this->tags;

        $this->raise(new TicketWasSubmitted($this));

        return $this;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('Acme\Tickets\Tag', 'ticket_tags');
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeNewer(Builder $query)
    {
        return $query->orderBy('id', 'DESC');
    }
} 