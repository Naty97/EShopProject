<?php
require("../logic/connection.php");
require("../class/product.php");

$conn = Connect();

/**
 * Si el nombre del botón insertar está bien declarado y es diferente a nulo, lee las variables
 * SKU (código), nombre, descripción, imagen, categoría, sub categoría, stock (cantidad) y precio
 * y se la pasa por parámetro a la clase Product y si el método Insertar está correcto
 * y es igual a verdadero, mostrará una alerta informando que el producto fue creado. 
 * Y en caso de que haya algún error con el método Insertar o en la lectura de las variables,
 * también mostrará una alerta informando que existe un error en algún paso del proceso de 
 * inserción. Una vez realiza el proceso, cierra la conexión a la base de datos.
 */
if (isset($_POST['insertData'])) {

    $sku = $_REQUEST['skuCreate'];
    $name = $_REQUEST['nameCreate'];
    $description = $_REQUEST['descriptionCreate'];
    $image = $_FILES['imageCreate']['tmp_name'];
    $image = "data:image/png;base64," . base64_encode(file_get_contents($image));
    $category = $_REQUEST['categoryCreate'];
    $subCategory = $_REQUEST['sub_categoryCreate'];
    $stock = $_REQUEST['stockCreate'];
    $price = $_REQUEST['priceCreate'];

    $product = new Product($sku, $name, $description, $image, $category, $subCategory, $stock, $price);
    if ($product->InsertProduct() === TRUE) {
        echo '<script> alert("Product data create"); </script>';
        header("Location: ../views/indexProduct.php");
    } else {
        echo '<script> alert("Product data not create"); </script>';
    }
}
