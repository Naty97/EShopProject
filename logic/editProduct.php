<?php
require("../logic/connection.php");
require("../class/product.php");
$conn = Connect();

/**
 * Si el nombre del botón actualizar está bien declarado y es diferente a nulo, lee la variable
 * id, SKU (código), nombre, descripción, imagen, categoría, sub-categoría, stock (cantidad) y 
 * precio y se las pasa por parámetro al método UpdateProduct y si el método está correcto
 * y es igual a verdadero, mostrará una alerta informando que el producto fue actualizado. 
 * Y en caso de que haya algún error con el método Actualizar o en la lectura de las variables,
 * también mostrará una alerta informando que existe un error en algún paso del proceso de 
 * actualización. Una vez realiza el proceso, cierra la conexión a la base de datos.
 */
if (isset($_POST['updateData'])) {

    $id = $_REQUEST['update_id'];

    $sku = $_REQUEST['skuEdit'];
    $name = $_REQUEST['nameEdit'];
    $description = $_REQUEST['descriptionEdit'];
    $image = $_FILES['imageEdit']['tmp_name'];
    $image = "data:image/png;base64," . base64_encode(file_get_contents($image));
    $category = $_REQUEST['categoryEdit'];
    $subCategory = $_REQUEST['sub_categoryEdit'];
    $stock = $_REQUEST['stockEdit'];
    $price = $_REQUEST['priceEdit'];

    $methodUpdate = UpdateProduct($id, $sku, $name, $description, $image, $category, $subCategory, $stock, $price);
    if ($methodUpdate === TRUE) {
        echo '<script> alert("Product data update"); </script>';
        header("Location: ../views/indexProduct.php");
    } else {
        echo '<script> alert("Product data not update"); </script>';
    }
}
