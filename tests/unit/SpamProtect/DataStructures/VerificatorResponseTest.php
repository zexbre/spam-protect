<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\DataStructures;

use PHPUnit\Framework\TestCase;

class VerificatorResponseTest extends TestCase
{
    private VerificatorResponse $verificator;

    protected function setUp(): void
    {
        $this->verificator = new VerificatorResponse(null, []);
    }

    public function testShoudHaveIsHumanField(): void
    {
        $this->assertObjectHasProperty('isHuman', $this->verificator);
    }

    public function testShoudHaveIsErorsField(): void
    {
        $this->assertObjectHasProperty('errors', $this->verificator);
    }

    public function testExpectedNumberOfClassMethods(): void
    {
        $expectedNumberOfMethods = 1;
        $realNumberOfMethods = get_class_methods(VerificatorResponse::class);

        $this->assertCount($expectedNumberOfMethods, $realNumberOfMethods);
    }

    public function testExpectedNumberOfClassVariables(): void
    {
        $expectedNumberOfVariables = 2;
        $realNumberOfVariables = get_class_vars(VerificatorResponse::class);

        $this->assertCount($expectedNumberOfVariables, $realNumberOfVariables);
    }
}
