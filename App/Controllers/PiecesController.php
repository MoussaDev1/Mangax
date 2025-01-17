<?php

namespace App\Controllers;

use App\Lib\ViewsLib;
use App\Services\PiecesService;

class PiecesController
{
    private PiecesService $piecesService;

    public function __construct(PiecesService $piecesService)
    {
        $this->piecesService = $piecesService;
    }

    public function createPiece(array $postdata)
    {

        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $file = $_FILES['cover']['type'];
            $fileTmpName = $_FILES['cover']['tmp_name'];
            $filename = basename($_FILES['cover']['name']);
            $uploadDir = '../public/uploads/';
            $allowedTypes = ['image/jpeg', 'image/png', 'image/webp', null];
            $filePath = $uploadDir . $filename;

            $postdata = $_POST;
            try {
                if (empty($postdata['title'])) {
                    $errors[] = "Veuillez mettre le nom de l'oeuvre .";
                }
                if (empty($postdata['genre'])) {
                    $errors[] = "Veuillez mettre le genre de l'oeuvre .";
                }
                if (empty($postdata['author'])) {
                    $errors[] = "Veuillez mettre l'auteur de l'oeuvre .";
                }
                if (empty($postdata['description'])) {
                    $postdata['description'] = "La description n'est pas disponible pour le moment modifiez l'oeuvre pour en ajouter une.";
                }
                if (!is_numeric($postdata['rating']) || $postdata['rating'] > 10 || $postdata['rating'] < 0) {
                    $errors[] = "La note doit être entre 1 et 10.";
                }

                if (!in_array($file, $allowedTypes)) {
                    $errors[] = "Veuillez mettre une image valide.";
                }




                if (empty($errors)) {
                    if (move_uploaded_file($fileTmpName, $filePath)) {
                        $postdata['cover'] = $filePath;
                    } else {
                        $errors[] = "Le fichier n'a pas pu être téléchargé.";
                    }
                    $this->piecesService->createPiece($postdata);
                    header('Location: index.php?action=read');
                }
            } catch (\Exception $e) {
                $errors[] = $e->getMessage();
            }
        }
        ViewsLib::render('createPiece', ['errors' => $errors]);
    }

    public function ReadPieces()
    {
        $pieces = $this->piecesService->ReadPieces();
        ViewsLib::render('readPieces', ['pieces' => $pieces]);
    }

    public function ReadPiece()
    {
        $pieceId = (int)$_GET['id'];
        if (!$pieceId || !is_numeric($pieceId)) {
            throw new \InvalidArgumentException("L'oeuvre n'a pas pu être d'identifier.");
        }

        $piece = $this->piecesService->ReadPiece($pieceId);
        if (!$piece) {
            echo 'Aucune oeuvre n\'a été trouvé';
            return;
        }

        ViewsLib::render('readPiece', ['piece' => $piece]);
    }

    public function ReadLastPiece()
    {
        $piece = $this->piecesService->ReadLastPiece();
        ViewsLib::render('homePiece', ['piece' => $piece]);
    }

    public function UpdatePiece(array $postdata)
    {
        $pieceId = (int)$_GET['id'];
        if (!$pieceId || !is_numeric($pieceId)) {
            throw new \InvalidArgumentException("L'ID de la pièce est invalide ou manquant lors du GET.");
        }


        $piece = $this->piecesService->ReadPiece($pieceId);
        if (!$piece) {
            echo '405';
            return;
        }
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $postdata['id'] = $pieceId;
            $file = $_FILES['cover']['type'];
            $fileTmpName = $_FILES['cover']['tmp_name'];
            $filename = basename($_FILES['cover']['name']);
            $uploadDir = '../public/uploads/';
            $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
            $filePath = $uploadDir . $filename;

            if (empty($postdata['title'])) {
                $errors[] = "Veuillez mettre le nom de l'oeuvre .";
            }
            if (empty($postdata['genre'])) {
                $errors[] = "Veuillez mettre le genre de l'oeuvre .";
            }
            if (empty($postdata['author'])) {
                $errors[] = "Veuillez mettre l'auteur de l'oeuvre .";
            }
            if (empty($postdata['description'])) {
                $postdata['description'] = "La description n'est pas disponible pour le moment modifiez l'oeuvre pour en ajouter une.";
            }

            if (!in_array($file, $allowedTypes)) {
                die($errors[] = "Le type de fichier n'est pas autorisé.");
            }

            if (move_uploaded_file($fileTmpName, $filePath)) {
                $postdata['cover'] = $filePath;
            } else {
                $errors[] = "Le fichier n'a pas pu être téléchargé.";
            }

            if (empty($errors)) {
                try {
                    $this->piecesService->UpdatePiece($postdata);
                    header('Location: index.php?action=read');
                } catch (\Exception $e) {
                    $errors[] = $e->getMessage();
                }
            }
        }
        ViewsLib::render('updatePiece', ['errors' => $errors, 'piece' => $piece]);
    }

    public function DeletePiece()
    {
        $pieceId = (int)$_GET['id'];
        if (!$pieceId || !is_numeric($pieceId)) {
            throw new \InvalidArgumentException("L'ID de la pièce est invalide ou manquant lors du GET.");
        }

        $piece = $this->piecesService->ReadPiece($pieceId);
        if (!$piece) {
            echo '405';
            return;
        }

        $this->piecesService->DeletePiece($pieceId);
        header('Location: index.php?action=read');
    }
}
