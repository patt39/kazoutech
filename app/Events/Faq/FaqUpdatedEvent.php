<?php

namespace App\Events\Faq;


use Spatie\EventProjector\ShouldBeStored;

final class FaqUpdatedEvent implements ShouldBeStored
{
    public $title;
    public $body;
    public $slug;
    public $categoryfaq_id;

    public function __construct(string $title, $body,string $slug, int $categoryfaq_id)
    {
        $this->title = $title;
        $this->body = $body;
        $this->slug = $slug;
        $this->categoryfaq_id = $categoryfaq_id;
    }
}
