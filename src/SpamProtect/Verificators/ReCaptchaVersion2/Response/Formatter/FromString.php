<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Verificators\ReCaptchaVersion2\Response\Formatter;

use stdClass;
use ZexBre\SpamProtect\DataStructures\VerificatorResponse;
use ZexBre\SpamProtect\Factory\ResponseDataFactory;

class FromString
{
    public static function toVerificatorResponse(?string $response): VerificatorResponse
    {
        $obj = self::stringToObject($response);

        return ResponseDataFactory::makeVerificatorResponse(
            $obj->success ?? null,
            $obj->{'error-codes'} ?? []
        );
    }

    private static function stringToObject(?string $response): stdClass
    {
        return self::isJson($response) ? json_decode($response) : new stdClass();
    }

    private static function isJson(?string $string): bool
    {
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }
}
