<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect;

use PHPUnit\Framework\TestCase;

class ProtectorTest extends TestCase
{
    public function testIncomplete(): void
    {
        $this->assertTrue(true, 'This should already work.');
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
}
