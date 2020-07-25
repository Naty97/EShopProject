<?php

require("../logic/connection.php");

$username = $argv[1];
$password = $argv[2];
$dbName = $argv[3];
$host = $argv[4];
$table = $argv[5];
$stock = $argv[6];

try {
    $conexion = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}

$products = $conexion->prepare("SELECT sku, name, description FROM '.$table.' products WHERE stock <= " . $stock);
$products->execute();
while ($row = mysqli_fetch_array($products)) {
    $sku = $row['sku'];
    $name = $row['name'];
    $description = $row['description'];

    $message = "Hay productos con nivel de stock muy bajo. La información en el contenido" . $products;

    $message = wordwrap($message, 70, "\r\n");

    $email = "dinata1202@gmail.com";
    $subject = "Productos con bajo stock";
    if (mail($email, $subject, $message)) {
        echo "¡Correo electrónico enviado!";
    } else {
        echo "¡Error al enviar el correo!";
    }
}
