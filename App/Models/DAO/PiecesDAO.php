<?php

namespace App\Models\DAO;

use App\Models\Pieces;
use App\Directors\PiecesDirector;
use App\Builder\Manga\PiecesBuilder;
use PDO;

class PiecesDAO
{
    private PDO $pdo;
    private PiecesDirector $piecesDirector;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;

        $piecesBuilder = new PiecesBuilder();
        $this->piecesDirector = new PiecesDirector($piecesBuilder);
    }

    public function mapToModel(array $data)
    {
        return $this->piecesDirector->CreateManga($data);
    }

    public function CreatePiece(Pieces $pieces)
    {
        $query = 'INSERT INTO pieces (type, title, genre, cover, rating, description, author) VALUES (:type ,:title, :genre, :cover, :rating, :description, :author)';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            'type' => $pieces->getType(),
            'title' => $pieces->getTitle(),
            'genre' => $pieces->getGenre(),
            'cover' => $pieces->getCover(),
            'rating' => $pieces->getRating(),
            'description' => $pieces->getDescription(),
            'author' => $pieces->getAuthor()
        ]);
        $pieceID = (int) $this->pdo->lastInsertId();

        if ($pieces->getType() === 'manga') {
            $stmt = $this->pdo->prepare('INSERT INTO manga (piece_id) VALUES (:piece_id)');
            $stmt->execute(['piece_id' => $pieceID]);
        } elseif ($pieces->getType() === 'anime') {
            $stmt = $this->pdo->prepare('INSERT INTO anime (piece_id) VALUES (:piece_id)');
            $stmt->execute(['piece_id' => $pieceID]);
        }
    }

    public function PieceExists(string $title): bool
    {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM pieces WHERE title = :title');
        $stmt->execute(['title' => $title]);
        $result = $stmt->fetchColumn();

        return $result > 0;
    }
    //-----------------------------------------
    public function ReadPieces(?string $type = null): array
    {
        $query = "SELECT * FROM pieces";
        $params = [];

        if ($type) {
            $query .= " WHERE type = :type";
            $params['type'] = $type;
        }

        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map([$this, 'mapToModel'], $result);
    }

    public function ReadPiece(int $id): Pieces
    {
        $stmt = $this->pdo->prepare('SELECT * FROM pieces WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $this->mapToModel($result);
    }

    public function ReadLastPiece(): Pieces
    {
        $stmt = $this->pdo->prepare('SELECT * FROM pieces ORDER BY id DESC LIMIT 1');
        $stmt->execute();
        $lastPiece = $stmt->fetch(PDO::FETCH_ASSOC);

        return $this->mapToModel($lastPiece);
    }

    public function updatePiece(Pieces $pieces)
    {
        $query = 'UPDATE pieces SET type = :type, title = :title, genre = :genre, cover = :cover, rating = :rating, description = :description, author = :author WHERE id = :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            'type' => $pieces->getType(),
            'title' => $pieces->getTitle(),
            'genre' => $pieces->getGenre(),
            'cover' => $pieces->getCover(),
            'rating' => $pieces->getRating(),
            'description' => $pieces->getDescription(),
            'author' => $pieces->getAuthor(),
            'id' => $pieces->getId()
        ]);
    }

    public function deletePiece(int $id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM pieces WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }
}
