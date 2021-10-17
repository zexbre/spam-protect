<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Verificators\MathGuard\Request\DataStructures;

use PHPUnit\Framework\TestCase;
use ZexBre\SpamProtect\Verificators\MathGuard\Request\DataStructures\RequestData;

class RequestDataTest extends TestCase
{
    public function testShoudHaveMathguardAnswerField(): void
    {
        $this->assertClassHasAttribute('mathguardAnswer', RequestData::class);
    }

    public function testShoudHaveMathguardCodeField(): void
    {
        $this->assertClassHasAttribute('mathguardCode', RequestData::class);
    }

    public function testShoudHavePrimeField(): void
    {
        $this->assertClassHasAttribute('prime', RequestData::class);
    }

    public function testExpectedNumberOfClassMethods(): void
    {
        $expectedNumberOfMethods = 1;
        $realNumberOfMethods = get_class_methods(RequestData::class);

        $this->assertCount($expectedNumberOfMethods, $realNumberOfMethods);
    }

    public function testExpectedNumberOfClassVariables(): void
    {
        $expectedNumberOfVariables = 3;
        $realNumberOfVariables = get_class_vars(RequestData::class);

        $this->assertCount($expectedNumberOfVariables, $realNumberOfVariables);
    }

}
