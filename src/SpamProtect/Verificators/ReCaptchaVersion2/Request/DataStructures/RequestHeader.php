<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Verificators\ReCaptchaVersion2\Request\DataStructures;

class RequestHeader
{
    ///**
    // * @var string
    // */
    //public $contentType; // 'text/plain; charset=utf-8';

    /**
     * @var string
     */
    public $accept;

    ///**
    // * @var string
    // */
    //public $acceptEncoding; // 'gzip,deflate,sdch'

    /**
     * @var string
     */
    public $acceptLanguage;

    /**
     * @var string
     */
    public $referer;

    /**
     * @var string
     */
    public $userAgent;

    public function __construct(string $accept, string $acceptLanguage, string $referer, string $userAgent){
        $this->accept = $accept;
        $this->acceptLanguage = $acceptLanguage;
        $this->referer = $referer;
        $this->userAgent = $userAgent;
    }
}
