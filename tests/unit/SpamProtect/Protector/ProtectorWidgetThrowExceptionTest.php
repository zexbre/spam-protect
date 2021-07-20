<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Protector;

use ArgumentCountError;
use PHPUnit\Framework\TestCase;
use ZexBre\SpamProtect\ProtectorWidgetImpl;

class ProtectorWidgetThrowExceptionTest extends TestCase
{
    public function testThrowExceptionIfVerificatorWidgetArgumentIsNotSet()
    {
        $this->expectException(ArgumentCountError::class);
        (new ProtectorWidgetImpl)->render();
    }
}
