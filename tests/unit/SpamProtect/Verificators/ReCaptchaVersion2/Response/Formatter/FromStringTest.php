<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Verificators\ReCaptchaVersion2\Response\Formatter;

use PHPUnit\Framework\TestCase;
use ZexBre\SpamProtect\DataStructures\VerificatorResponse;
use ZexBre\SpamProtect\Verificators\ReCaptchaVersion2\Response\Formatter\FromString;

class FromStringTest extends TestCase
{
    public function testShoudReturnVerificatorResponseObject(): void
    {
        $object = FromString::toVerificatorResponse('some string');
        $this->assertInstanceOf(VerificatorResponse::class, $object);
    }
}
