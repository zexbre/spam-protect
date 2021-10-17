<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Verificators\ReCaptchaVersion2;

use ZexBre\SpamProtect\Contracts\VerificatorWidget;
use ZexBre\SpamProtect\DataStructures\WidgetResponse;
use ZexBre\SpamProtect\Factory\ResponseDataFactory;

class VerificatorWidgetImpl implements VerificatorWidget
{
    /**
     * @var string
     */
    public $head;

    /**
     * @var string
     */
    public $body;

    public function __construct(string $head = '', string $body = '')
    {
        $this->head = "<script src=\"//www.google.com/recaptcha/api.js?{$head}\"></script>";
        $this->body = "<div class=\"g-recaptcha\" data-sitekey=\"{$body}\"></div>";
    }

    public function render(): WidgetResponse
    {
        return ResponseDataFactory::makeWidgetResponse($this->head, $this->body);
    }
}
