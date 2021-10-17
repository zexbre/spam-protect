<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Verificators\MathGuard\Request\DataStructures;

class RequestData
{
    /**
     * @var string
     */
    public $mathguardAnswer;

    /**
     * @var string
     */
    public $mathguardCode;

    /**
     * @var int
     */
    public $prime;

    public function __construct(?string $mathguardAnswer, ?string $mathguardCode, ?int $prime) {
        $this->mathguardAnswer = $mathguardAnswer;
        $this->mathguardCode = $mathguardCode;
        $this->prime = $prime;
    }
}
