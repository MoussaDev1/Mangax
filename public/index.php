<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/js/script.js">
</head>

<body>

</body>

</html>
<?php

use App\Controllers\PiecesController;
use App\Factories\Manga\PiecesFactory;


require_once '../vendor/autoload.php';


$piecesService = PiecesFactory::createPiecesBuilder();
$PiecesController = new PiecesController($piecesService);

$action = $_GET['action'] ?? null;
$method = $_SERVER['REQUEST_METHOD'];

if ($action === 'create') {
    $PiecesController->createPiece($_POST);
} elseif ($action === 'read') {
    $PiecesController->ReadPieces();
} elseif ($action === 'updatePiece' && isset($_GET['id'])) {
    $PiecesController->UpdatePiece($_POST);
} elseif ($action === 'deletePiece' && isset($_GET['id'])) {
    $PiecesController->DeletePiece();
} elseif ($action === 'readPiece' && isset($_GET['id'])) {
    $PiecesController->ReadPiece();
} else {
    $PiecesController->ReadLastPiece();
}
