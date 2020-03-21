<?php

try {
    $connection = new PDO('mysql:host=localhost;dbname=registration', 'root', '');
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $connection;
} catch (PDOException $e) {
    echo $e->getMessage();
}
