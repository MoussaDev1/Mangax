<?php

namespace App\Builder\Manga;

use App\Models\Pieces;

interface IPiecesBuilder
{
    public function setType(string $type): self;
    public function setTitle(string $title): self;
    public function setGenre(string $genre): self;
    public function setCover(string $cover): self;
    public function setRating(float $rating): self;
    public function setDescription(string $description): self;
    public function setAuthor(string $author): self;

    public function Create(): Pieces;
}
