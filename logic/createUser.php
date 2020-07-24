<?php
require("../logic/connection.php");
require("../class/user.php");
$connection = Connect();

/**
 * Si el nombre del botón insertar está bien declarado y es diferente a nulo, lee la variable
 * nombre, apellido, número de teléfono, correo electrónico, dirección y contraseña y se las 
 * pasa por parámetro a la clase User y si el método Insertar está correcto y es igual a 
 * verdadero, mostrará una alerta informando que el usuario fue creado. 
 * Y en caso de que haya algún error con el método Insertar o en la lectura de las variables,
 * también mostrará una alerta informando que existe un error en algún paso del proceso de 
 * inserción. Una vez realiza el proceso, cierra la conexión a la base de datos.
 */
if ($_POST) {
    $name = $_REQUEST['name'];
    $lastname = $_REQUEST['lastname'];
    $phoneNumber = $_REQUEST['phonenumber'];
    $email = $_REQUEST['email'];
    $address = $_REQUEST['address'];
    $password = $_REQUEST['password'];

    $user = new User($name, $lastname, $phoneNumber, $email, $address, $password);

    if ($user->InsertUser() === TRUE) {
        echo '<script> alert("User data create"); </script>';
        header("Location: ../views/index.php");
    } else {
        echo '<script> alert("User data not create"); </script>';
    }
}

$connection->close();
