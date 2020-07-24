<?php
session_start();
require("../logic/connection.php");
require("../class/user.php");
$user = $_SESSION['user'];

/**
 * Si el usuario que intenta loguearse, no cumple con el proceso de autenticación, lo
 * redireccionará a la página del Log in de nuevo.
 */
if (!$user) {
    header("Location: ../views/index.php");
}
?>

<a href="../logic/logout.php">Logout</a>

<?php
/**
 * Si el correo electrónico del usuario logueado es igual a admin@eshop.com, lo direccionará 
 * a la página del administrador donde podrá tener acceso a estadísticas y administración de
 * Categorías, Sub-Categorías y Productos.
 * En caso tal de que el usuario sea un cliente, le dará la bienvenida.
 */
if ($user['email'] === 'admin@eshop.com') {
    header("Location: ../views/indexAdmin.php");
    die();
} else { ?>
    <h1> Welcome <?php echo $user['name'];
                    echo " ";
                    echo $user['lastname'] ?> </h1>
<?php }
?>