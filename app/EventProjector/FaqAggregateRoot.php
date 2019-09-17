<?php

namespace App\Projectors\EventProjector;

use App\EventProjector\Events\Faq\FaqCreatedEvent;
use App\EventProjector\Events\Faq\FaqDeletedEvent;
use Spatie\EventProjector\AggregateRoot;

final class FaqAggregateRoot extends AggregateRoot
{

    public function createAccount(string $name, string $faqId)
    {
        $this->recordThat(new FaqCreatedEvent($name, $faqId));
        return $this;
    }


    public function deleteFaq()
    {
        $this->recordThat(new FaqDeletedEvent());

        return $this;
    }
}
