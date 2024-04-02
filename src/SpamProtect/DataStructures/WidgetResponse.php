<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\DataStructures;

class WidgetResponse
{
    public function __construct(
        public ?string $htmlHead,
        public ?string $htmlBody,
    ){
    }
}
