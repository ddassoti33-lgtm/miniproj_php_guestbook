<?php
declare(strict_types=1);

$host = 'localhost';
$database = 'guestbook';
$username = 'root';
$password = '';
$charset = 'utf8mb4';

$dsn = "mysql:host={$host};dbname={$database};charset={$charset}";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $exception) {
    throw new RuntimeException(
        'Connexion à la base de données impossible. Vérifiez les paramètres dans config.php et assurez-vous que MySQL est démarré.',
        0,
        $exception
    );
}