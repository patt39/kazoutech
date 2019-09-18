<?php

namespace App\Events\Faq;

use Spatie\EventProjector\ShouldBeStored;
/*
class FaqDeletedEvent implements ShouldBeStored
{

    /** @var string *
    public $faqId;

    public function __construct(string $faqId)
    {
        $this->faqId = $faqId;
    }
}
*/

final class FaqDeletedEvent implements ShouldBeStored
{
}
