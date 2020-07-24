<?php
require("../logic/connection.php");
require("../class/subCategory.php");
$connection = Connect();

/**
 * Si el nombre del botón insertar está bien declarado y es diferente a nulo, lee la variable
 * nombre y se la pasa por parámetro a la clase sub-Category y si el método Insertar está correcto
 * y es igual a verdadero, mostrará una alerta informando que la sub-categoría fue creada. 
 * Y en caso de que haya algún error con el método Insertar o en la lectura de las variables,
 * también mostrará una alerta informando que existe un error en algún paso del proceso de 
 * inserción. Una vez realiza el proceso, cierra la conexión a la base de datos.
 */
if (isset($_POST['insertData'])) {

    $name = $_REQUEST['subCategoryNameCreate'];
    $idCategory = $_REQUEST['categoryIdCreate'];

    $subCategory = new SubCategory($name, $idCategory);

    if ($subCategory->InsertSubCategory() === TRUE) {
        echo '<script> alert("Sub-Category data create"); </script>';
        header("Location: ../views/indexSubCategory.php");
    } else {
        echo '<script> alert("Category data not create"); </script>';
    }
}
$connection->close();
