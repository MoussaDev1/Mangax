<?php

namespace App\Factories\Manga;

use App\Services\PiecesService;


abstract class AbstractPiecesFactory
{
    abstract public static function createPiecesBuilder(): PiecesService;
}
