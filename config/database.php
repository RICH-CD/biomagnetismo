<?php
$host = 'localhost';
$db = 'u527558795_AaronMagnetism';
$user = 'u527558795_AaronMagnetism';
$pass = 'qHQMe]wvY*0';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexión exitosa a la base de datos.";
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>