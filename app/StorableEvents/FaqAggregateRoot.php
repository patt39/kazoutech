<?php

namespace App\StorableEvents;


use App\Events\Faq\FaqCreatedEvent;
use App\Events\Faq\FaqDeletedEvent;
use App\Events\Faq\FaqUpdatedEvent;
use Spatie\EventProjector\AggregateRoot;

final class FaqAggregateRoot extends AggregateRoot
{

    public function createFaq(string $title, $body, int $categoryfaq_id)
    {
        $this->recordThat(new FaqCreatedEvent($title,$body,$categoryfaq_id));
        return $this;
    }

    public function updateFaq(string $title, $body,string $slug, int $categoryfaq_id)
    {
        $this->recordThat(new FaqUpdatedEvent($title,$body,$slug,$categoryfaq_id));
        return $this;
    }


    public function deleteFaq()
    {
        $this->recordThat(new FaqDeletedEvent());
        return $this;
    }
}
