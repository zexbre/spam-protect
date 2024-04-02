<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Verificators\ReCaptchaVersion2\Request\DataStructures;

use PHPUnit\Framework\TestCase;

class RequestHeaderTest extends TestCase
{
    private RequestHeader $requestHeader;

    protected function setUp(): void
    {
        $this->requestHeader = new RequestHeader('', '', '', '');
    }

    public function testShoudHaveAcceptField(): void
    {
        $this->assertObjectHasProperty('accept', $this->requestHeader);
    }

    public function testShoudHaveAcceptLanguageField(): void
    {
        $this->assertObjectHasProperty('acceptLanguage', $this->requestHeader);
    }

    public function testShoudHaveRefererField(): void
    {
        $this->assertObjectHasProperty('referer', $this->requestHeader);
    }

    public function testShoudHaveUserAgentField(): void
    {
        $this->assertObjectHasProperty('userAgent', $this->requestHeader);
    }

    public function testExpectedNumberOfClassMethods(): void
    {
        $expectedNumberOfMethods = 1;
        $realNumberOfMethods = get_class_methods(RequestHeader::class);

        $this->assertCount($expectedNumberOfMethods, $realNumberOfMethods);
    }

    public function testExpectedNumberOfClassVariables(): void
    {
        $expectedNumberOfVariables = 4;
        $realNumberOfVariables = get_class_vars(RequestHeader::class);

        $this->assertCount($expectedNumberOfVariables, $realNumberOfVariables);
    }
}
