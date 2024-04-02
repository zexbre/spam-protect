<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\DataStructures;

class VerificatorResponse
{
    public function __construct(
        public ?bool $isHuman,
        public array $errors,
    ) {
    }
}
