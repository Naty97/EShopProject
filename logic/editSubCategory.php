<?php
require("../logic/connection.php");
require("../class/subCategory.php");
$connection = Connect();

/**
 * Si el nombre del botón actualizar está bien declarado y es diferente a nulo, lee la variable
 * id y nombre y se las pasa por parámetro al método UpdateSubCategory y si el método está correcto
 * y es igual a verdadero, mostrará una alerta informando que la sub-categoría fue actualizada. 
 * Y en caso de que haya algún error con el método Actualizar o en la lectura de la variable,
 * también mostrará una alerta informando que existe un error en algún paso del proceso de 
 * actualización. Una vez realiza el proceso, cierra la conexión a la base de datos.
 */
if (isset($_POST['updateData'])) {

    $id = $_REQUEST['update_id'];
    $name = $_REQUEST['subCategoryNameEdit'];
    $idCategory = $_REQUEST['categoryIdEdit'];

    if (UpdateSubCategory($id, $name, $idCategory) === TRUE) {
        echo '<script> alert("Sub-Category data update"); </script>';
        header("Location: ../views/indexSubCategory.php");
    } else {
        echo '<script> alert("Sub-Category data not update"); </script>';
    }
}

$connection->close();
