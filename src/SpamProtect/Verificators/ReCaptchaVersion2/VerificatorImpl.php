<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Verificators\ReCaptchaVersion2;

use Exception;
use ZexBre\SpamProtect\Contracts\Verificator;
use ZexBre\SpamProtect\DataStructures\VerificatorResponse;
use ZexBre\SpamProtect\Exceptions\InvalidVerificationExecutionException;
use ZexBre\SpamProtect\Verificators\ReCaptchaVersion2\Request\Request;
use ZexBre\SpamProtect\Verificators\ReCaptchaVersion2\Response\Formatter\FromString;

class VerificatorImpl implements Verificator
{
    public function __construct(
        private Request $request,
    ) {
    }

    public function verify(): VerificatorResponse
    {
        try {
            $response = $this->request->send();
        } catch (InvalidVerificationExecutionException | Exception $exc) {
            $response = $this->makeErrorCodesResponse($exc->getMessage());
        }

        return FromString::toVerificatorResponse($response);
    }

    private function makeErrorCodesResponse(string $message): string
    {
        return "{\"error-codes\":[\"{$message}\"]}";
    }
}
