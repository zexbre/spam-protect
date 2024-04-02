<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Verificators\ReCaptchaVersion2\Request\DataStructures;

class RequestHeader
{
    public function __construct(
//        public string $contentType, // 'text/plain; charset=utf-8'
        public string $accept,
//        public string $acceptEncoding, // 'gzip,deflate,sdch'
        public string $acceptLanguage,
        public string $referer,
        public string $userAgent,
    ){
    }
}
