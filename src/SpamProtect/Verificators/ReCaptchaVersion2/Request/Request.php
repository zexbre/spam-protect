<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Verificators\ReCaptchaVersion2\Request;

use ZexBre\SpamProtect\Exceptions\InvalidVerificationExecutionException;
use ZexBre\SpamProtect\Verificators\ReCaptchaVersion2\Request\DataStructures\RequestData;

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
     * @var \CurlHandle
     */
    private $ch;

    /**
     * @var string
     */
    private $response;

    public function __construct(RequestData $data, bool $allowDebug = false)
    {
        $this->data = $data;
        $this->allowDebug = $allowDebug;
    }

    public function send(): string
    {
        $this->initConnection()->setConnectionOptions()->execute();
        $responseData = $this->getResponseData();

        if ($this->allowDebug) {
            $this->dumpRequest()->dumpResponse();
        }

        $this->closeConnection();

        if ($this->allowDebug) {
            exit();
        }

        return $responseData;
    }

    private function initConnection(): self
    {
        $this->ch = curl_init();
        return $this;
    }

    private function setConnectionOptions(): self
    {
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, $this->getHttpHeader());
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, 2); // moguci problemi sa verifikacijom sadrzaja
        curl_setopt($this->ch, CURLOPT_HEADER, true);
        curl_setopt($this->ch, CURLOPT_POST, true);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $this->getPostFields());
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->ch, CURLOPT_USERAGENT, $this->data->requestHeader->userAgent);
        curl_setopt($this->ch, CURLOPT_URL, $this->data->providerUrl);

        return $this;
    }

    private function getHttpHeader(): array
    {
        return [
            'Accept: ' . $this->data->requestHeader->accept,
            'Accept-Language: ' . $this->data->requestHeader->acceptLanguage,
            'Referer: ' . $this->data->requestHeader->referer,
        ];
    }

    private function getPostFields(): array
    {
        return [
            'secret' => $this->data->secretKey,
            'response' => $this->data->gResponse,
            'remoteip' => $this->data->ip,
        ];
    }

    private function execute(): self
    {
        $this->response = curl_exec($this->ch);

        if ($this->response === false || curl_error($this->ch)) {
            $message = 'Verification execution is not valid!';
            $message .= ' (URL: ' . $this->data->providerUrl;
            $message .= ' | error: ' . curl_error($this->ch) . ')';
            throw new InvalidVerificationExecutionException($message);
        }

        return $this;
    }

    private function getResponseData(): string
    {
        return mb_substr($this->response, $this->getResponseHeaderSize());
    }

    private function getResponseHeader(): string
    {
        return mb_substr($this->response, 0, $this->getResponseHeaderSize());
    }

    private function getResponseHeaderSize(): int
    {
        $responseInfo = $this->getResponseInfo();
        return $responseInfo['header_size'];
    }

    private function getResponseInfo(): array
    {
        return curl_getinfo($this->ch);
    }

    private function closeConnection(): self
    {
        curl_close($this->ch);
        return $this;
    }

    private function dumpRequest(): self
    {
        $url = parse_url($this->data->providerUrl);
        $query = empty($url['query']) ? '' : "?{$url['query']}";
        $fragment = empty($url['fragment']) ? '' : "#{$url['fragment']}";

        $requestHeader = $this->getHttpHeader();
        array_unshift($requestHeader, "User-Agent: {$this->data->requestHeader->userAgent}");
        array_unshift($requestHeader, 'Host: ' . $url['host']);
        array_unshift($requestHeader, 'GET ' . $url['path'] . $query . $fragment);

        echo '=== REQUEST HEADER ===';
        var_dump($requestHeader);

        return $this;
    }

    private function dumpResponse(): self
    {
        echo '=== RESPONSE HEADER ===';
        var_dump('RESPONSE INFO:', $this->getResponseInfo());
        var_dump('RESPONSE HEADER:', $this->getResponseHeader());
        var_dump('RESPONSE DATA:', $this->getResponseData());
        var_dump('RESPONSE (full):', $this->response);

        return $this;
    }
}
