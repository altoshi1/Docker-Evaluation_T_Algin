<?php
// Récupération des variables d'environnement
$host = getenv('MYSQL_HOST') ?: 'database';
$db   = getenv('MYSQL_DATABASE') ?: 'docker_doc_dev';
$user = getenv('MYSQL_USER') ?: 'db_client';
$pass = getenv('MYSQL_PASSWORD') ?: 'password';

try {
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $pass);

    $query = $pdo->query("SELECT id, title, body FROM article");
    $articles = $query->fetchAll(PDO::FETCH_ASSOC);

    echo "<h1>Liste des articles !</h1>";
    foreach ($articles as $article) {
        echo "<h2>{$article['title']}</h2>";
        echo "<p>{$article['body']}</p>";
        echo "<hr>";
    }

} catch (Exception $e) {
    echo "Erreur: " . $e->getMessage();
}
