<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Verificators\MathGuard\Request\DataStructures;

use PHPUnit\Framework\TestCase;

class RequestDataTest extends TestCase
{
    private RequestData $requestData;

    protected function setUp(): void
    {
        $this->requestData = new RequestData(null, null, null);
    }

    public function testShoudHaveMathguardAnswerField(): void
    {
        $this->assertObjectHasProperty('mathguardAnswer', $this->requestData);
    }

    public function testShoudHaveMathguardCodeField(): void
    {
        $this->assertObjectHasProperty('mathguardCode', $this->requestData);
    }

    public function testShoudHavePrimeField(): void
    {
        $this->assertObjectHasProperty('prime', $this->requestData);
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
