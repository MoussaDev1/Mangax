<?php

namespace App\Factories\Manga;

use App\Factories\Manga\AbstractPiecesFactory;
use App\Builder\Manga\PiecesBuilder;
use App\Directors\PiecesDirector;
use App\Lib\DatabaseSingleton;
use App\Models\DAO\PiecesDAO;
use App\Services\PiecesService;

class PiecesFactory extends AbstractPiecesFactory
{

    public static function getDbConnection()
    {
        $database = DatabaseSingleton::getInstance();
        $pdo = $database->getConnection();
        return $pdo;
    }

    public static function getPiecesDao()
    {
        $pdo = self::getDbConnection();
        return new PiecesDAO($pdo);
    }

    public static function createPiecesBuilder(): PiecesService
    {
        return new PiecesService(self::getPiecesDao(), new PiecesDirector(new PiecesBuilder()));
    }
}
