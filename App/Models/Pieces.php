<?php

namespace App\Models;

class Pieces
{
    protected string $id;
    protected string $type;
    protected string $title;
    protected string $genre;
    protected string $cover;
    protected float $rating;
    protected string $description;
    protected string $author;


    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }
    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }
    //-----------------------------------------
    public function getTitle(): string
    {
        return $this->title;
    }
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }
    //-----------------------------------------
    public function getGenre(): string
    {
        return $this->genre;
    }
    public function setGenre(string $genre): self
    {
        $this->genre = $genre;
        return $this;
    }
    //-----------------------------------------

    public function getCover(): string
    {
        return $this->cover;
    }
    public function setCover(string $cover): self
    {
        $this->cover = $cover;
        return $this;
    }
    //-----------------------------------------

    public function getRating(): float
    {
        return $this->rating;
    }
    public function setRating(float $rating): self
    {
        $this->rating = $rating;
        return $this;
    }
    //-----------------------------------------

    public function getDescription(): string
    {
        return $this->description;
    }
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }
    //-----------------------------------------

    public function getAuthor(): string
    {
        return $this->author;
    }
    public function setAuthor(string $author): self
    {
        $this->author = $author;
        return $this;
    }
}