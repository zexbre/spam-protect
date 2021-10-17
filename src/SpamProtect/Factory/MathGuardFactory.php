<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Factory;

use ZexBre\SpamProtect\Contracts\Protector;
use ZexBre\SpamProtect\DataStructures\WidgetResponse;
use ZexBre\SpamProtect\ProtectorImpl;
use ZexBre\SpamProtect\ProtectorWidgetImpl;
use ZexBre\SpamProtect\Verificators\MathGuard\Request\DataStructures\RequestData;
use ZexBre\SpamProtect\Verificators\MathGuard\Request\Request;
use ZexBre\SpamProtect\Verificators\MathGuard\VerificatorImpl;
use ZexBre\SpamProtect\Verificators\MathGuard\VerificatorWidgetImpl;

class MathGuardFactory
{
    public static function getWidgetResponse(array $params): WidgetResponse
    {
        $verificatorWidget = new VerificatorWidgetImpl(
            $params['prime'] ?? null
        );

        return (new ProtectorWidgetImpl)->render($verificatorWidget);
    }

    public static function getProtector(array $params, bool $allowDebug = false): Protector
    {

        $requestData = new RequestData(
            $params['mathguard_answer'] ?? null,
            $params['mathguard_code'] ?? null,
            $params['prime'] ?? null
        );

        $request = new Request($requestData, $allowDebug);
        $verificator = new VerificatorImpl($request);

        return new ProtectorImpl($verificator);
    }
}
