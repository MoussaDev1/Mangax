<?php

namespace App\Builder\Manga;

use App\Models\Pieces;
use App\Builder\Manga\IPiecesBuilder;

class PiecesBuilder implements IPiecesBuilder
{
    private ?Pieces $pieces = null;

    public function setId(int $id): self
    {
        if ($this->pieces === null) {
            $this->pieces = new Pieces();
        }

        $this->pieces->setId($id);
        return $this;
    }

    public function setType(string $type): self
    {
        if ($this->pieces === null) {
            $this->pieces = new Pieces();
        }

        // Validation du type
        if (!in_array($type, ['manga', 'anime'])) {
            throw new \InvalidArgumentException("Type '$type' non supporté. Seuls 'manga' et 'anime' sont acceptés.");
        }

        $this->pieces->setType($type);
        return $this;
    }

    public function setTitle(string $title): self
    {
        if ($this->pieces === null) {
            throw new \LogicException("Le type doit être défini avant d'utiliser les setters.");
        }

        $this->pieces->setTitle($title);
        return $this;
    }

    public function setGenre(string $genre): self
    {
        if ($this->pieces === null) {
            throw new \LogicException("Le type doit être défini avant d'utiliser les setters.");
        }

        $this->pieces->setGenre($genre);
        return $this;
    }

    public function setCover(string $cover): self
    {
        if ($this->pieces === null) {
            throw new \LogicException("Le type doit être défini avant d'utiliser les setters.");
        }

        $this->pieces->setCover($cover);
        return $this;
    }

    public function setRating(float $rating): self
    {
        if ($this->pieces === null) {
            throw new \LogicException("Le type doit être défini avant d'utiliser les setters.");
        }

        $this->pieces->setRating($rating);
        return $this;
    }

    public function setDescription(string $description): self
    {
        if ($this->pieces === null) {
            throw new \LogicException("Le type doit être défini avant d'utiliser les setters.");
        }

        $this->pieces->setDescription($description);
        return $this;
    }

    public function setAuthor(string $author): self
    {
        if ($this->pieces === null) {
            throw new \LogicException("Le type doit être défini avant d'utiliser les setters.");
        }

        $this->pieces->setAuthor($author);
        return $this;
    }

    public function create(): Pieces
    {
        if ($this->pieces === null) {
            throw new \LogicException("Aucune pièce n'a été configurée.");
        }

        $piece = $this->pieces; // Cloner l'objet pour éviter les conflits dans de futurs appels
        $this->pieces = null; // Réinitialiser pour permettre une nouvelle construction
        return $piece;
    }
}
