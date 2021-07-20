<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\DataStructures;

class WidgetResponse
{
    /**
     * @var string|null
     */
    public $htmlHead;

    /**
     * @var string|null
     */
    public $htmlBody;

    public function __construct(?string $htmlHead, ?string $htmlBody)
    {
        $this->htmlHead = $htmlHead;
        $this->htmlBody = $htmlBody;
    }
}
