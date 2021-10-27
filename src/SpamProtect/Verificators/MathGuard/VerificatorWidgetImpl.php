<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Verificators\MathGuard;

use ZexBre\MathGuard\MathGuard;
use ZexBre\SpamProtect\Contracts\VerificatorWidget;
use ZexBre\SpamProtect\DataStructures\WidgetResponse;
use ZexBre\SpamProtect\Factory\ResponseDataFactory;

class VerificatorWidgetImpl implements VerificatorWidget
{
    /**
     * @var integer|null
     */
    private $prime;

    public function __construct(?int $prime)
    {
        $this->prime = $prime;
    }

    public function render(): WidgetResponse
    {
        $body = $this->prime
            ? MathGuard::returnQuestion($this->prime)
            : MathGuard::returnQuestion();

        return ResponseDataFactory::makeWidgetResponse('', $body);
    }
}
