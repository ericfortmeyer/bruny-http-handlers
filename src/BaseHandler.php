<?php

declare(strict_types=1);

namespace Bruny\HttpHandlers;

use function header;

abstract class BaseHandler
{
    protected object $page;

    protected function displayView(...$args): void
    {
        $page = $this->page;
        $page(...$args);
    }

    protected static function getHost(): string
    {
        return str_replace($_SERVER["REQUEST_URI"], "", $_SERVER["HTTP_ORIGIN"] ?? $_SERVER["HTTP_REFERER"]);
    }

    protected static function redirectTo(string $returnUrl): void
    {
        header("Location: ${returnUrl}");
    }
}
