<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Verificators\MathGuard;

use Exception;
use ZexBre\SpamProtect\Contracts\Verificator;
use ZexBre\SpamProtect\DataStructures\VerificatorResponse;
use ZexBre\SpamProtect\Exceptions\InvalidVerificationExecutionException;
use ZexBre\SpamProtect\Verificators\MathGuard\Request\Request;
use ZexBre\SpamProtect\Verificators\MathGuard\Response\Formatter\FromBoolean;

class VerificatorImpl implements Verificator
{
    /**
     * @var Request
     */
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function verify(): VerificatorResponse
    {
        try {
            $response = $this->request->send();
        } catch (InvalidVerificationExecutionException | Exception $exc) {
            $response = $this->makeErrorCodesResponse($exc->getMessage());
        }

        return FromBoolean::toVerificatorResponse($response);
    }

    private function makeErrorCodesResponse(string $message): string
    {
        return "{\"error-codes\":[\"{$message}\"]}";
    }
}
