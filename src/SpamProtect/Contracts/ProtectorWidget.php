<?php

namespace ZexBre\SpamProtect\Contracts;

use ZexBre\SpamProtect\Contracts\VerificatorWidget;
use ZexBre\SpamProtect\DataStructures\WidgetResponse;

interface ProtectorWidget
{
    public function render(VerificatorWidget $verificatorWidget): WidgetResponse;
}
