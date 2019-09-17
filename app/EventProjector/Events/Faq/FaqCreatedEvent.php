<?php

namespace App\EventProjector\Events\Faq;


use Spatie\EventProjector\ShouldBeStored;

class FaqCreatedEvent implements ShouldBeStored
{
    /** @var string */
    public $id;

    /** @var array */
    public $faqAttributes;

    public function __construct(array $faqAttributes)
    {
        $this->id = $faqAttributes['id'];

        $this->faqAttributes = $faqAttributes;
    }
}
