<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Protector;

use ArgumentCountError;
use PHPUnit\Framework\TestCase;
use ZexBre\SpamProtect\ProtectorImpl;

class ProtectorThrowExceptionForMissingArgumentsTest extends TestCase
{
    public function testExceptionForEmptyConstructorArguments(): void
    {
        $this->expectException(ArgumentCountError::class);
        new ProtectorImpl();
    }
}
