<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Verificators\ReCaptchaVersion2\Request\DataStructures;

use PHPUnit\Framework\TestCase;
use ZexBre\SpamProtect\Verificators\ReCaptchaVersion2\Request\DataStructures\RequestData;

class RequestDataTest extends TestCase
{
    public function testShoudHaveProviderField(): void
    {
        $this->assertClassHasAttribute('providerUrl', RequestData::class);
    }

    public function testShoudHaveSecretKeyField(): void
    {
        $this->assertClassHasAttribute('secretKey', RequestData::class);
    }

    public function testShoudHaveGResponseField(): void
    {
        $this->assertClassHasAttribute('gResponse', RequestData::class);
    }

    public function testShoudHaveIpField(): void
    {
        $this->assertClassHasAttribute('ip', RequestData::class);
    }

    public function testShoudHaveRequestHeaderField(): void
    {
        $this->assertClassHasAttribute('requestHeader', RequestData::class);
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
