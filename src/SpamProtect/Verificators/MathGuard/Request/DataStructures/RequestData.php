<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Verificators\MathGuard\Request\DataStructures;

class RequestData
{
    public function __construct(
        public ?string $mathguardAnswer,
        public ?string $mathguardCode,
        public ?int $prime,
    ) {
    }
}
