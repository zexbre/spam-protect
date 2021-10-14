<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Verificators\ReCaptchaVersion2\Request\DataStructures;

class RequestData
{
    /**
     * @var string
     */
    public $providerUrl;

    /**
     * @var string
     */
    public $secretKey;

    /**
     * @var string
     */
    public $gResponse;

    /**
     * @var string
     */
    public $ip;

    /**
     * @var RequestHeader
     */
    public $requestHeader;

    public function __construct(
        string $providerUrl,
        string $secretKey,
        string $gResponse,
        string $ip,
        RequestHeader $requestHeader
    ){
        $this->providerUrl = $providerUrl;
        $this->secretKey = $secretKey;
        $this->gResponse = $gResponse;
        $this->ip = $ip;
        $this->requestHeader = $requestHeader;
    }
}
