<?php require 'config.php' ;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom'] ?? '');
    $msg = trim($_POST['msg'] ?? '');
    
    if (!empty ($nom) && !empty($msg)) {
        $stmt = $pdo->prepare('INSERT INTO messages (nom, message) VALUES (:nom, :message)');
        $stmt->execute(['nom' => $nom, 'message' => $msg]);
    } 
}

header('Location: index.php');
exit;
?>
