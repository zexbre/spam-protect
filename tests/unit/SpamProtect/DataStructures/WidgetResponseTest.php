<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\DataStructures;

use PHPUnit\Framework\TestCase;

class WidgetResponseTest extends TestCase
{
    private WidgetResponse $widgetResponse;

    protected function setUp(): void
    {
        $this->widgetResponse = new WidgetResponse(null, null);
    }

    public function testShoudHaveHtmlHeadField(): void
    {
        $this->assertObjectHasProperty('htmlHead', $this->widgetResponse);
    }

    public function testShoudHaveHtmlBodyField(): void
    {
        $this->assertObjectHasProperty('htmlBody', $this->widgetResponse);
    }

    public function testExpectedNumberOfClassMethods(): void
    {
        $expectedNumberOfMethods = 1;
        $realNumberOfMethods = get_class_methods(WidgetResponse::class);

        $this->assertCount($expectedNumberOfMethods, $realNumberOfMethods);
    }

    public function testExpectedNumberOfClassVariables(): void
    {
        $expectedNumberOfVariables = 2;
        $realNumberOfVariables = get_class_vars(WidgetResponse::class);

        $this->assertCount($expectedNumberOfVariables, $realNumberOfVariables);
    }
}
