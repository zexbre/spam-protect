<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect;

use ZexBre\SpamProtect\Contracts\Protector;
use ZexBre\SpamProtect\Contracts\Verificator;
use ZexBre\SpamProtect\DataStructures\VerificatorResponse;
use ZexBre\SpamProtect\Exceptions\VerificationIsNotExecutedException;

class ProtectorImpl implements Protector
{
    private bool $isVerificationExecuted = false;
    private VerificatorResponse|null $verificatorResponse;

    public function __construct(
        private Verificator $verificator,
    ) {
    }

    public function verify(): Protector
    {
        $this->verificatorResponse = $this->verificator->verify();
        $this->verificationExecuted();
        return $this;
    }

    public function isHuman(): bool
    {
        return $this->isValidResponse() && $this->getVerificatorResponse()->isHuman;
    }

    public function isRobot(): bool
    {
        return $this->isValidResponse() && !$this->isHuman();
    }

    public function isValidResponse(): bool
    {
        return isset($this->getVerificatorResponse()->isHuman);
    }

    public function isInvalidResponse(): bool
    {
        return !$this->isValidResponse();
    }

    public function getErrors(): array
    {
        return $this->getVerificatorResponse()->errors;
    }

    public function getVerificatorResponse(): VerificatorResponse
    {
        if ($this->whetherVerificationHasNotBeenExecuted()) {
            throw new VerificationIsNotExecutedException();
        }

        return $this->verificatorResponse;
    }

    private function verificationExecuted(): Protector
    {
        $this->isVerificationExecuted = true;
        return $this;
    }

    private function whetherVerificationHasNotBeenExecuted(): bool
    {
        return $this->isVerificationExecuted() === false;
    }

    private function isVerificationExecuted(): bool
    {
        return $this->isVerificationExecuted;
    }
}
