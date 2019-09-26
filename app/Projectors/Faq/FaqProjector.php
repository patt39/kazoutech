<?php

namespace App\Projectors\Faq;


use App\Events\Faq\FaqCreatedEvent;
use App\Events\Faq\FaqDeletedEvent;
use App\Events\Faq\FaqUpdatedEvent;
use App\Model\admin\faq;
use Spatie\EventSourcing\Projectors\Projector;
use Spatie\EventSourcing\Projectors\ProjectsEvents;

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

    public function onFaqUpdated(FaqUpdatedEvent $event,int $aggregateUuid)
    {
        $faq = faq::faqId($aggregateUuid);
        $faq->update([
            'title' => $event->title,
            'body' => $event->body,
            'slug' => $event->slug,
            'categoryfaq_id' => $event->categoryfaq_id,
        ]);
    }

    public function onFaqDeleted(FaqDeletedEvent $event, int $aggregateUuid)
    {
        faq::faqId($aggregateUuid)->delete();
    }


}
