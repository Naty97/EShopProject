<?php

/**
 * Sigue con la sesión y si aún está activa, la destruye y envía al Log in, esto para hacer la
 * función de cerrar sesión.
 */
session_start();
session_destroy();
header("Location: ../views/index.php");
die();
