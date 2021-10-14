<?php

namespace ZexBre\SpamProtect\Contracts;

use ZexBre\SpamProtect\DataStructures\VerificatorResponse;

interface Protector
{
    public function verify(): self;

    public function isHuman() : bool;

    public function isRobot(): bool;
    
    public function isValidResponse(): bool;

    public function isInvalidResponse(): bool;

    public function getErrors(): array;

    public function getVerificatorResponse(): VerificatorResponse;
}
