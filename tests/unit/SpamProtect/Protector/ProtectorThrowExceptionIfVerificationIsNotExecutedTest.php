<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Protector;

use PHPUnit\Framework\TestCase;
use ZexBre\SpamProtect\Contracts\Protector;
use ZexBre\SpamProtect\Contracts\Verificator;
use ZexBre\SpamProtect\DataStructures\VerificatorResponse;
use ZexBre\SpamProtect\Exceptions\VerificationIsNotExecutedException;
use ZexBre\SpamProtect\ProtectorImpl;

class ProtectorThrowExceptionIfVerificationIsNotExecutedTest extends TestCase
{
    /**
     * @var Verificator
     */
    private $verificator;

    /**
     * @var Protector
     */
    private $protector;

    public function setUp(): void
    {
        $this->verificator = $this->createStub(Verificator::class);
        $this->protector = new ProtectorImpl($this->verificator);
    }

    public function testIsHumanCheck(): void
    {
        $this->verificator->method('verify')
             ->willReturn(new VerificatorResponse(true, []));

        $this->expectException(VerificationIsNotExecutedException::class);

        $this->protector->isHuman();
    }

    public function testisRobotCheck(): void
    {
        $this->expectException(VerificationIsNotExecutedException::class);

        $this->protector->isRobot();
    }

    public function testIsValidResponseCheck(): void
    {
        $this->expectException(VerificationIsNotExecutedException::class);

        $this->protector->isValidResponse();
    }

    public function testIsInvalidResponseCheck(): void
    {
        $this->expectException(VerificationIsNotExecutedException::class);

        $this->protector->isInvalidResponse();
    }

    public function testGetErrorsCheck(): void
    {
        $this->expectException(VerificationIsNotExecutedException::class);

        $this->protector->getErrors();
    }

    public function testGetDataStructure()
    {
        $this->expectException(VerificationIsNotExecutedException::class);

        $this->protector->getVerificatorResponse();
    }
}
