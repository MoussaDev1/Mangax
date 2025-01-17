<?php

namespace App\Lib;

class ViewsLib
{
    public static function render(string $view, array $data = []): void
    {
        extract($data, EXTR_SKIP);
        include __DIR__ . '/../Views/' . $view . '.php';
    }
}
