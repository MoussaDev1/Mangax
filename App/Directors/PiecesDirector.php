<?php

namespace App\Directors;

use App\Models\Pieces;
use App\Builder\Manga\PiecesBuilder;

class PiecesDirector
{
    private PiecesBuilder $builder;

    public function __construct(PiecesBuilder $builder = null)
    {
        $this->builder = $builder ?? new PiecesBuilder();
    }

    public function CreateManga(array $data): Pieces
    {
        return $this->builder
            ->setId((int)$data['id'])
            ->setType(strtolower($data['type']))
            ->setTitle($data['title'])
            ->setGenre($data['genre'])
            ->setCover($data['cover'])
            ->setRating((float)$data['rating'])
            ->setDescription($data['description'])
            ->setAuthor($data['author'])
            ->Create();
    }
}
