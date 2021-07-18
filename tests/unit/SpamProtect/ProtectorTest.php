<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect;

use PHPUnit\Framework\TestCase;
use ZexBre\SpamProtect\Contracts\Protector;
use ZexBre\SpamProtect\ProtectorImpl;

class ProtectorTest extends TestCase
{
    public function testIsInstanceOfProtectorInterface(): void
    {
        $this->assertInstanceOf(Protector::class, new ProtectorImpl());
    }
}
