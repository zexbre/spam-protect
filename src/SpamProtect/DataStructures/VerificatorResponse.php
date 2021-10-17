<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\DataStructures;

class VerificatorResponse
{
    /**
     * @var bool|null
     */
    public $isHuman;

    /**
     * @var array
     */
    public $errors;

    public function __construct(?bool $isHuman, array $errors)
    {
        $this->isHuman = $isHuman;
        $this->errors = (array) $errors;
    }
}
