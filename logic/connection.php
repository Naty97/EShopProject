<?php

/**
 * Database connection: primero comprueba que dicha función exista, si es así crea una variable
 * con el objeto encargado de realizar dicha conexión, el cual es mysqli. Dentro de este objeto
 * irá la información de la base de datos así como el dominio al que se conecta. Si esta conexión
 * es correcta, retornará la misma. En caso que no sea correcta, mostrará el error y cerrará la 
 * conexión.
 */
if (!function_exists('Connect')) {
    function Connect()
    {
        try {
            $connection = new mysqli("eshop.com", "root", "1234", "eshop_project");
            return $connection;
        } catch (mysqli_sql_exception $e) {
            echo "Error " . $e->getMessage();
            die();
        }
    }
}
