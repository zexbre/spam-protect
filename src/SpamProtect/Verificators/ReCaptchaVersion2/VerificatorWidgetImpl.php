<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect\Verificators\ReCaptchaVersion2;

use DOMDocument;
use DOMElement;
use ZexBre\SpamProtect\Contracts\VerificatorWidget;
use ZexBre\SpamProtect\DataStructures\WidgetResponse;
use ZexBre\SpamProtect\Factory\ResponseDataFactory;

class VerificatorWidgetImpl implements VerificatorWidget
{
    private DOMDocument $domDocument;
    private DOMElement $head;
    private DOMElement $body;

    public function __construct(string $head = '', string $body = '')
    {
        $this->domDocument = new \DOMDocument();
        $this->makeScriptTag($head);
        $this->makeDivTag($body);
    }

    public function render(): WidgetResponse
    {
        return ResponseDataFactory::makeWidgetResponse(
            $this->domDocument->saveHTML($this->head),
            $this->domDocument->saveHTML($this->body)
        );
    }

    public function addAttributeToDivTag(string $qualifiedName, ?string $value)
    {
        $oldBody = $this->domDocument->removeChild($this->body);
        $oldBody->setAttribute($qualifiedName, $value);

        $this->body = $oldBody;
        $this->domDocument->appendChild($this->body);
    }

    private function makeScriptTag(string $head = ''): void
    {
        $src = '//www.google.com/recaptcha/api.js';
        if ($head) {
            $src .= "?{$head}";
        }

        $this->head = $this->domDocument->createElement("script");
        $this->head->setAttribute("src", $src);
        $this->domDocument->appendChild($this->head);
    }

    private function makeDivTag(string $body = ''): void
    {
        $this->body = $this->domDocument->createElement("div");
        $this->body->setAttribute("class", "g-recaptcha");
        $this->body->setAttribute("data-sitekey", $body);
        $this->domDocument->appendChild($this->body);
    }
}
