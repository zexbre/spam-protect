<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Verificators\ReCaptchaVersion2\Request\DataStructures;

use PHPUnit\Framework\TestCase;
use ZexBre\SpamProtect\Verificators\ReCaptchaVersion2\Request\DataStructures\RequestHeader;

class RequestHeaderTest extends TestCase
{
    public function testShoudHaveAcceptField(): void
    {
        $this->assertClassHasAttribute('accept', RequestHeader::class);
    }

    public function testShoudHaveAcceptLanguageField(): void
    {
        $this->assertClassHasAttribute('acceptLanguage', RequestHeader::class);
    }

    public function testShoudHaveRefererField(): void
    {
        $this->assertClassHasAttribute('referer', RequestHeader::class);
    }

    public function testShoudHaveUserAgentField(): void
    {
        $this->assertClassHasAttribute('userAgent', RequestHeader::class);
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
