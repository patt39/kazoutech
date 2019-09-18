<?php

namespace App\Projectors\EventProjector;

use App\EventProjector\Events\Faq\FaqCreatedEvent;
use App\EventProjector\Events\Faq\FaqDeletedEvent;
use Spatie\EventProjector\AggregateRoot;

final class FaqAggregateRoot extends AggregateRoot
{

    public function createFaq(string $title, $body, int $categoryfaq_id)
    {
        $this->recordThat(new FaqCreatedEvent($title,$body,$categoryfaq_id));
        return $this;
    }


    public function deleteFaq()
    {
        $this->recordThat(new FaqDeletedEvent());
        return $this;
    }
}
