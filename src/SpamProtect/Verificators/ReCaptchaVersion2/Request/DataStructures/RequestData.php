<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Verificators\ReCaptchaVersion2\Request\DataStructures;

class RequestData
{
    public function __construct(
        public string $providerUrl,
        public string $secretKey,
        public string $gResponse,
        public string $ip,
        public RequestHeader $requestHeader,
    ){
    }
}
