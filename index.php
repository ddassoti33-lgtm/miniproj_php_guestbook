<?php require 'config.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css">
    <title>Livre d'or</title>
</head>
<body>
    <div class="container">
    <h1><i class="fa-solid fa-book-open"></i> Livre d'or</h1>
       
        <form action="ajouter.php" method="POST" >
            <p>votre nom : </p>
            <input type="text" placeholder="votre nom ..." name="nom" id="nom" class="nom" required>
            <p>votre message : </p>
            <textarea type="text" placeholder="écrivez votre message ici ..." name="msg" id="msg" class="msg" required></textarea><br/>
            <input type="submit" value="Envoyer" id="btn" class="btn">
        </form>
    <hr><hr>
        <div class="messages">
            <h6>Messages récents</h6>
            <?php
            $stmt = $pdo->prepare('SELECT * FROM messages ORDER BY created_at DESC LIMIT 10');
            $stmt->execute();
            $messages = $stmt->fetchAll();
            ?>
            <?php foreach ($messages as $message): ?>
                <div class="message">
                    <h2><?= htmlspecialchars($message['nom']) ?></h2> <br/>
                    <p><?= htmlspecialchars($message['message']) ?></p>
                </div><br/>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>