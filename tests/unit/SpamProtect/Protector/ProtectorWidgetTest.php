<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Protector;

use PHPUnit\Framework\TestCase;
use ZexBre\SpamProtect\Contracts\ProtectorWidget;
use ZexBre\SpamProtect\Contracts\VerificatorWidget;
use ZexBre\SpamProtect\DataStructures\WidgetResponse;
use ZexBre\SpamProtect\ProtectorWidgetImpl;

class ProtectorWidgetTest extends TestCase
{
    /**
     * @var Protector
     */
    private $protectorWidget;

    public function setUp(): void
    {
        $this->protectorWidget = new ProtectorWidgetImpl();
    }

    public function testIsInstanceOfProtectorWidgetInterface(): void
    {
        $this->assertInstanceOf(ProtectorWidget::class, $this->protectorWidget);
    }

    public function testWidgetRenderingMustReturnWidgetResponseDataStructure()
    {
        $verificatorWidget = $this->createStub(VerificatorWidget::class);

        $widgetResponse = $this->protectorWidget->render($verificatorWidget);

        $this->assertInstanceOf(WidgetResponse::class, $widgetResponse);
    }
}
