<?php

declare(strict_types=1);

namespace ZexBre\SpamProtect;

use ZexBre\SpamProtect\Contracts\VerificatorWidget;
use ZexBre\SpamProtect\Contracts\ProtectorWidget;
use ZexBre\SpamProtect\DataStructures\WidgetResponse;

class ProtectorWidgetImpl implements ProtectorWidget
{
    public function render(VerificatorWidget $verificatorWidget): WidgetResponse
    {
        return $verificatorWidget->render();
    }
}
