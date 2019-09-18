<?php

namespace App\Projectors\Faq;


use App\Events\Faq\FaqCreatedEvent;
use App\Events\Faq\FaqDeletedEvent;
use App\Model\admin\faq;
use Spatie\EventProjector\Projectors\Projector;
use Spatie\EventProjector\Projectors\ProjectsEvents;

final class FaqProjector implements Projector
{
    use ProjectsEvents;

    public function onFaqCreated(FaqCreatedEvent $event)
    {
        faq::create([
            'title' => $event->title,
            'body' => $event->body,
            'categoryfaq_id' => $event->categoryfaq_id,
        ]);
    }

    public function onFaqDeleted(FaqDeletedEvent $event, int $aggregateUuid)
    {
        faq::faqId($aggregateUuid)->delete();
    }


}
