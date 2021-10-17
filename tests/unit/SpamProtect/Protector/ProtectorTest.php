<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Protector;

use PHPUnit\Framework\TestCase;
use ZexBre\SpamProtect\Contracts\Protector;
use ZexBre\SpamProtect\Contracts\Verificator;
use ZexBre\SpamProtect\DataStructures\VerificatorResponse;
use ZexBre\SpamProtect\ProtectorImpl;

class ProtectorTest extends TestCase
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

    public function testIsInstanceOfProtectorInterface(): void
    {
        $this->assertInstanceOf(Protector::class, $this->protector);
    }

    public function testProtectorVerifyingMustReturnSelf()
    {
        $verifiedProtector = $this->protector->verify();

        $this->assertSame($this->protector, $verifiedProtector);
    }

    public function testResponseForHumanRequest(): void
    {
        $this->verificator->method('verify')
             ->willReturn(new VerificatorResponse(true, []));

        $this->protector->verify();

        $this->assertTrue($this->protector->isHuman());
        $this->assertFalse($this->protector->isRobot());
        $this->assertFalse($this->protector->isInvalidResponse());
        $this->assertTrue($this->protector->isValidResponse());
        $this->assertEmpty($this->protector->getErrors());
    }

    public function testResponseForRobotRequest(): void
    {
        $this->verificator->method('verify')
             ->willReturn(new VerificatorResponse(false, []));

        $this->protector->verify();

        $this->assertFalse($this->protector->isHuman());
        $this->assertTrue($this->protector->isRobot());
        $this->assertFalse($this->protector->isInvalidResponse());
        $this->assertTrue($this->protector->isValidResponse());
        $this->assertEmpty($this->protector->getErrors());
    }

    public function testResponseIsInvalid(): void
    {
        $this->verificator->method('verify')
             ->willReturn(new VerificatorResponse(null, ['some-error']));

        $this->protector->verify();

        $this->assertFalse($this->protector->isHuman());
        $this->assertFalse($this->protector->isRobot());
        $this->assertTrue($this->protector->isInvalidResponse());
        $this->assertFalse($this->protector->isValidResponse());
        $this->assertNotEmpty($this->protector->getErrors());
    }

    public function testVerifiedProtectorContainVerificatorResponseDataStructure()
    {
        $this->protector->verify();

        $this->assertInstanceOf(
            VerificatorResponse::class,
            $this->protector->getVerificatorResponse()
        );
    }
}
