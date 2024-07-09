<?php

$host = "localhost";
$dbname = "bdticket";
$user = "root";
$pass = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $err) {
    die("Erro de conexão com o banco de dados: " . $err->getMessage());
}
