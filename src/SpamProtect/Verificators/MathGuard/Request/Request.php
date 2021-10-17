<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Verificators\MathGuard\Request;

use ZexBre\MathGuard\MathGuard;
use ZexBre\SpamProtect\Exceptions\InvalidVerificationExecutionException;
use ZexBre\SpamProtect\Verificators\MathGuard\Request\DataStructures\RequestData;

class Request
{
    /**
     * @var boolean
     */
    private $allowDebug = false;

    /**
     * @var RequestData
     */
    private $data;

    /**
     * @var bool
     */
    private $response;

    public function __construct(RequestData $data, bool $allowDebug = false)
    {
        $this->data = $data;
        $this->allowDebug = $allowDebug;
    }

    public function send(): bool
    {
        $this->execute();
        $responseData = $this->getResponseData();

        if ($this->allowDebug) {
            $this->dumpRequest()->dumpResponse();
            exit();
        }

        return $responseData;
    }

    private function execute(): self
    {
        $this->response = $this->hasPrime()
            ? $this->executeWithPrime()
            : $this->executeWithoutPrime();

        if ($this->response !== false && $this->response !== true) {
            $message = 'Verification execution is not valid!';
            $message .= '(' . json_encode($this->response) . ')';
            throw new InvalidVerificationExecutionException($message);
        }

        return $this;
    }

    private function hasPrime(): bool
    {
        return is_int($this->data->prime);
    }

    private function executeWithPrime(): bool
    {
        return MathGuard::checkResult(
            $this->data->mathguardAnswer,
            $this->data->mathguardCode,
            $this->data->prime
        );
    }

    private function executeWithoutPrime(): bool
    {
        return MathGuard::checkResult(
            $this->data->mathguardAnswer,
            $this->data->mathguardCode
        );
    }

    private function getResponseData(): bool
    {
        return $this->response;
    }

    private function dumpRequest(): self
    {
        echo '=== REQUEST HEADER ===';
        var_dump($this->data);

        return $this;
    }

    private function dumpResponse(): self
    {
        echo '=== RESPONSE HEADER ===';
        var_dump($this->response);

        return $this;
    }
}
