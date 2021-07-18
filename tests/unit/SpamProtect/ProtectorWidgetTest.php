<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect;

use PHPUnit\Framework\TestCase;
use ZexBre\SpamProtect\Contracts\ProtectorWidget;
use ZexBre\SpamProtect\ProtectorWidgetImpl;

class ProtectorWidgetTest extends TestCase
{
    public function testIsInstanceOfProtectorWidgetInterface(): void
    {
        $this->assertInstanceOf(ProtectorWidget::class, new ProtectorWidgetImpl());
    }
}
