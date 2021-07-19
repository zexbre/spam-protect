<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\DataStructures;

use PHPUnit\Framework\TestCase;
use ZexBre\SpamProtect\DataStructures\WidgetResponse;

class WidgetResponseTest extends TestCase
{

    public function testShoudHaveHtmlHeadField(): void
    {
        $this->assertClassHasAttribute('htmlHead', WidgetResponse::class);
    }

    public function testShoudHaveHtmlBodyField(): void
    {
        $this->assertClassHasAttribute('htmlBody', WidgetResponse::class);
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
