<?php

namespace App\EventProjector\Projectors\Faq;


use App\EventProjector\Events\Faq\FaqCreatedEvent;
use App\EventProjector\Events\Faq\FaqDeletedEvent;
use App\Model\admin\faq;
use Spatie\EventProjector\Projectors\Projector;
use Spatie\EventProjector\Projectors\ProjectsEvents;

final class FaqProjector implements Projector
{
    use ProjectsEvents;

    public function onFaqCreated(FaqCreatedEvent $event)
    {

        faq::create($event->faqAttributes);
    }



    public function onFaqDeleted(FaqDeletedEvent $event, string $id)
    {
        faq::faqId($id)->delete();
    }


}
