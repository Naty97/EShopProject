<?php
require("../logic/connection.php");
require("../class/user.php");

/**
 * Si la acción de recuperación de datos es correcta, lee las variables de correo electrónico
 * y contraseña. Luego se crea una variable y se le da el valor del método Autenticar y le 
 * pasa las variables por parámetro al método AuthenticateUser y si esa variable usuario es 
 * verdadera, crea una sesión y se la asigna a la misma variable usuario y lo envía al dashboard y
 * cierra la conexión. En caso de que la variable usuario sea falsa, lo envía al Log in de nuevo 
 * y cierra la conexión.
 */
if ($_POST) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    $user = AuthenticateUser($email, $password);

    if ($user) {
        session_start();
        $_SESSION['user'] = $user;
        header('Location: ../logic/dashboard.php');
        die();
    } else {
        header('Location: ../views/index.php?status=login');
        die();
    }
}
