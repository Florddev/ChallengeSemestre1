<?php

try {
    $pdo = new PDO("pgsql:host=db;dbname=blog;port=5432", "postgres", "password");
} catch (\Exception $e) {
    // Page de configs du projet
    die($e->getMessage());
}

echo "<h1>Database loaded successfully !</h1>";
