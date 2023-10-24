<?php

try {
    $pdo = new PDO("pgsql:host=db;dbname=blog;port=5432", "postgres", "password");
} catch (\Exception $e) {
    die($e->getMessage());
}

echo "<h1>Database loaded successfully !</h1>";
