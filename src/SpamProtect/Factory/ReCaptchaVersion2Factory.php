<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Factory;

use ZexBre\SpamProtect\Contracts\Protector;
use ZexBre\SpamProtect\DataStructures\WidgetResponse;
use ZexBre\SpamProtect\ProtectorImpl;
use ZexBre\SpamProtect\ProtectorWidgetImpl;
use ZexBre\SpamProtect\Utility\Helper;
use ZexBre\SpamProtect\Verificators\ReCaptchaVersion2\Request\DataStructures\RequestData;
use ZexBre\SpamProtect\Verificators\ReCaptchaVersion2\Request\DataStructures\RequestHeader;
use ZexBre\SpamProtect\Verificators\ReCaptchaVersion2\Request\Request;
use ZexBre\SpamProtect\Verificators\ReCaptchaVersion2\VerificatorImpl;
use ZexBre\SpamProtect\Verificators\ReCaptchaVersion2\VerificatorWidgetImpl;

class ReCaptchaVersion2Factory
{
    private static $defaultHttpUserAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0';

    public static function getWidgetResponse(array $params): WidgetResponse
    {
        $verificatorWidget = new VerificatorWidgetImpl(
            $params['hl'] ? 'hl=' . strip_tags($params['hl']) : '',
            $params['reCaptchaSiteKey'] ? strip_tags($params['reCaptchaSiteKey']) : ''
        );

        return (new ProtectorWidgetImpl)->render($verificatorWidget);
    }

    public static function getProtector(array $params, bool $allowDebug = false): Protector
    {
        $requestHeader = new RequestHeader(
            $params['accept'] ?? 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
            $params['acceptLanguage'] ?? 'en-US,en;q=0.5',
            $params['httpReferer'] ?? strip_tags($_SERVER['HTTP_REFERER']),
            $params['httpUserAgent'] ?? self::$defaultHttpUserAgent
        );

        $requestData = new RequestData(
            'https://www.google.com/recaptcha/api/siteverify',
            $params['reCaptchaSecretKey'],
            $params['gReCaptchaResponse'],
            Helper::realIP(),
            $requestHeader
        );

        $request = new Request($requestData, $allowDebug);
        $verificator = new VerificatorImpl($request);

        return new ProtectorImpl($verificator);
    }
}
