<?php

namespace App\Events\Faq;


use Spatie\EventSourcing\ShouldBeStored;

final class FaqCreatedEvent implements ShouldBeStored
{
    public $title;
    public $body;
    public $categoryfaq_id;

    public function __construct(string $title, $body, int $categoryfaq_id)
    {
        $this->title = $title;
        $this->body = $body;
        $this->categoryfaq_id = $categoryfaq_id;
    }
}
