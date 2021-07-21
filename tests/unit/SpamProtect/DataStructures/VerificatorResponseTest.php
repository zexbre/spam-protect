<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\DataStructures;

use PHPUnit\Framework\TestCase;
use ZexBre\SpamProtect\DataStructures\VerificatorResponse;

class VerificatorResponseTest extends TestCase
{
    public function testShoudHaveIsHumanField(): void
    {
        $this->assertClassHasAttribute('isHuman', VerificatorResponse::class);
    }

    public function testShoudHaveIsErorsField(): void
    {
        $this->assertClassHasAttribute('errors', VerificatorResponse::class);
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
