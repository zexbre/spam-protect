<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Verificators\MathGuard\Response\Formatter;

use PHPUnit\Framework\TestCase;
use ZexBre\SpamProtect\DataStructures\VerificatorResponse;
use ZexBre\SpamProtect\Verificators\MathGuard\Response\Formatter\FromBoolean;

class FromBooleanTest extends TestCase
{
    public function testShoudReturnVerificatorResponseObject(): void
    {
        $object = FromBoolean::toVerificatorResponse(true);
        $this->assertInstanceOf(VerificatorResponse::class, $object);
    }
}
