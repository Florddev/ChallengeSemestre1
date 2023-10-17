<?php

try {
    $pdo = new PDO("pgsql:host=db;dbname=blog;port=5432", "root", "password");
} catch (\Exception $e) {
    die($e->getMessage());
}
