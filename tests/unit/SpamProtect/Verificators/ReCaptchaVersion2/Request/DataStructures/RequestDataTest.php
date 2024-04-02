<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Verificators\ReCaptchaVersion2\Request\DataStructures;

use PHPUnit\Framework\TestCase;

class RequestDataTest extends TestCase
{
    private RequestData $requestData;

    protected function setUp(): void
    {
        $requestHeader = $this->createStub(RequestHeader::class);
        $this->requestData = new RequestData('', '', '', '', $requestHeader);
    }

    public function testShoudHaveProviderField(): void
    {
        $this->assertObjectHasProperty('providerUrl', $this->requestData);
    }

    public function testShoudHaveSecretKeyField(): void
    {
        $this->assertObjectHasProperty('secretKey', $this->requestData);
    }

    public function testShoudHaveGResponseField(): void
    {
        $this->assertObjectHasProperty('gResponse', $this->requestData);
    }

    public function testShoudHaveIpField(): void
    {
        $this->assertObjectHasProperty('ip', $this->requestData);
    }

    public function testShoudHaveRequestHeaderField(): void
    {
        $this->assertObjectHasProperty('requestHeader', $this->requestData);
    }

    public function testExpectedNumberOfClassMethods(): void
    {
        $expectedNumberOfMethods = 1;
        $realNumberOfMethods = get_class_methods(RequestData::class);

        $this->assertCount($expectedNumberOfMethods, $realNumberOfMethods);
    }

    public function testExpectedNumberOfClassVariables(): void
    {
        $expectedNumberOfVariables = 5;
        $realNumberOfVariables = get_class_vars(RequestData::class);

        $this->assertCount($expectedNumberOfVariables, $realNumberOfVariables);
    }

}
