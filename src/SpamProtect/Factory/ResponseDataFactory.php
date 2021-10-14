<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Factory;

use ZexBre\SpamProtect\DataStructures\VerificatorResponse;
use ZexBre\SpamProtect\DataStructures\WidgetResponse;

class ResponseDataFactory
{
    public static function makeVerificatorResponse(?bool $success, ?array $errorCodes = []): VerificatorResponse
    {
        return new VerificatorResponse(
            $success ?? null,
            $errorCodes ?? []
        );
    }

    public static function makeWidgetResponse(?string $head, ?string $body): WidgetResponse
    {
        return new WidgetResponse($head, $body);
    }
}
