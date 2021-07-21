<?php

namespace ZexBre\SpamProtect\Contracts;

use ZexBre\SpamProtect\DataStructures\VerificatorResponse;

interface Verificator
{
    public function verify(): VerificatorResponse;
}
