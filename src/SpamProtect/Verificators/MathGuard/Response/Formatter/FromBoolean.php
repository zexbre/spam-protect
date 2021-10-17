<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Verificators\MathGuard\Response\Formatter;

use stdClass;
use ZexBre\SpamProtect\DataStructures\VerificatorResponse;
use ZexBre\SpamProtect\Factory\ResponseDataFactory;

class FromBoolean
{
    public static function toVerificatorResponse(?bool $response): VerificatorResponse
    {
        $obj = self::boolToObject($response);

        return ResponseDataFactory::makeVerificatorResponse(
            $obj->success ?? null,
            $obj->{'error-codes'} ?? []
        );
    }

    private static function boolToObject(?bool $response): stdClass
    {
        $formatted = new stdClass();
        $formatted->success = isset($response) ? $response : null;
        return $formatted;
    }
}
