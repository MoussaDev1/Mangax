<?php

namespace App\Lib;

use PDO;
use PDOException;
use Dotenv\Dotenv;

class DatabaseSingleton
{
    private static ?PDO $instance = null;

    private function __construct() {}

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            try {
                // Charger les variables d'environnement
                $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
                $dotenv->safeLoad(); // safeLoad = pas d'erreur si .env manquant (utile en prod)

                $host = $_ENV['DB_HOST'] ?? 'your_host';
                $dbname = $_ENV['DB_NAME'] ?? 'your_db_name';
                $user = $_ENV['DB_USER'] ?? 'your_user';
                $pass = $_ENV['DB_PASS'] ?? 'your_password';


                self::$instance = new PDO(
                    "mysql:host=$host;dbname=$dbname;charset=utf8",
                    $user,
                    $pass,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
            } catch (PDOException $e) {
                die('Erreur de connexion à la base de données : ' . $e->getMessage());
            }
        }

        return self::$instance;
    }
}
