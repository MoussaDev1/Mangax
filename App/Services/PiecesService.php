<?php

namespace App\Services;

use App\Directors\PiecesDirector;
use App\Models\DAO\PiecesDAO;

class PiecesService
{
    private PiecesDAO $piecesDAO;
    private PiecesDirector $piecesDirector;

    public function __construct(PiecesDAO $piecesDAO, PiecesDirector $piecesDirector)
    {
        $this->piecesDAO = $piecesDAO;
        $this->piecesDirector = $piecesDirector;
    }

    public function createPiece(array $postdata)
    {
        if ($this->piecesDAO->PieceExists($postdata['title'])) {
            throw new \InvalidArgumentException('Piece already exists');
        }
        $pieces = $this->piecesDirector->CreateManga($postdata);
        $this->piecesDAO->CreatePiece($pieces);
    }

    public function ReadPieces(?string $type = null)
    {
        return $this->piecesDAO->ReadPieces($type);
    }

    public function ReadPiece(int $id)
    {
        return $this->piecesDAO->ReadPiece($id);
    }

    public function ReadLastPiece()
    {
        return $this->piecesDAO->ReadLastPiece();
    }

    public function UpdatePiece(array $postdata)
    {
        $pieces = $this->piecesDirector->UpdateManga($postdata);

        $this->piecesDAO->UpdatePiece($pieces);
    }

    public function DeletePiece(int $id)
    {
        return $this->piecesDAO->DeletePiece($id);
    }
}
