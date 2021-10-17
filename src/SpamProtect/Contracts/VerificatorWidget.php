<?php

namespace ZexBre\SpamProtect\Contracts;

use ZexBre\SpamProtect\DataStructures\WidgetResponse;

interface VerificatorWidget
{
    public function render(): WidgetResponse;
}
