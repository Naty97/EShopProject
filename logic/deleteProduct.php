<?php
require("../logic/connection.php");
require("../class/product.php");
$conn = Connect();

/**
 * Si el nombre del botón eliminar está bien declarado y es diferente a nulo, lee la variable
 * id y se la pasa por parámetro al método DeleteProduct y si el método está correcto
 * y es igual a verdadero, mostrará una alerta informando que el producto fue eliminado. 
 * Y en caso de que haya algún error con el método Eliminar o en la lectura de la variable,
 * también mostrará una alerta informando que existe un error en algún paso del proceso de 
 * eliminación. Una vez realiza el proceso, cierra la conexión a la base de datos.
 */
if (isset($_POST['deleteData'])) {

    $id = $_REQUEST['delete_id'];

    if (DeleteProduct($id) === TRUE) {
        echo '<script> alert("Product data delete"); </script>';
        header("Location: ../views/indexProduct.php");
    } else {
        echo '<script> alert("Product data not delete"); </script>';
    }
}

$conn->close();
