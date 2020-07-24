<?php
require_once("../logic/connection.php");
$connection = Connect();

class Product
{
    //Product Properties
    public $SKU;
    public $name;
    public $description;
    public $image;
    public $category;
    public $subCategory;
    public $stock;
    public $price;

    /**
     * Constructor que recibe por parámetro las propiedades del producto.
     * Parámetros: SKU o código, nombre, descripción, imagen, categoría, nombre de la sub categoría, stock, 
     * el cual es la cantidad que hay en bodega y precio del producto.
     */
    function __construct($pSKU, $pName, $pDescription, $pImage, $pCategory, $pSubCategory, $pStock, $pPrice)
    {
        $this->SKU = $pSKU;
        $this->name = $pName;
        $this->description = $pDescription;
        $this->image = $pImage;
        $this->category = $pCategory;
        $this->subCategory = $pSubCategory;
        $this->stock = $pStock;
        $this->price = $pPrice;
    }

    /**
     * Product Insert Method: encargado de conectar con la base de datos, luego crea una variable que 
     * contiene el insert a la tabla products, con las respectivas propiedades del producto declaradas arriba. 
     * Una vez hace el insert, comprueba que no hayan errores con la conexión a la base de datos, si no los 
     * tiene cierra la conexión y retorna falso.
     */
    function InsertProduct()
    {
        $connection = Connect();
        $sqlInsert = "INSERT INTO products (sku, name, description, image, category, sub_category, stock, price) 
                VALUES ('$this->SKU', '$this->name', '$this->description', '$this->image', '$this->category', '$this->subCategory', '$this->stock', '$this->price');";
        $connection->query($sqlInsert);
        if ($connection->connect_errno) {
            $connection->close();
            return false;
        }
        $connection->close();
        return true;
    }
}

/**
 * Product Update Method: encargado de conectar con la base de datos, luego crea una variable que 
 * contiene el update a la tabla products. Una vez hace el update, comprueba que no hayan errores
 * con la conexión a la base de datos, si no los tiene cierra la conexión y retorna falso.
 * Parámetros: id del producto, SKU o código, nombre, descripción, imagen, categoría y sub categoría asociadas,
 * stock o cantidad y precio del producto.
 */
function UpdateProduct($id, $sku, $name, $description, $image, $category, $subCategory, $stock, $price)
{
    $connection = Connect();
    $sqlUpdate = "UPDATE products SET sku = '$sku', name = '$name', description = '$description', image = '$image, category = '$category', sub_category = '$subCategory', stock = '$stock', price = '$price' WHERE id = '$id'";
    $connection->query($sqlUpdate);
    if ($connection->connect_errno) {
        $connection->close();
        return false;
    }
    $connection->close();
    return true;
}

/**
 * Product Delete Method: encargado de conectar con la base de datos, luego crea una variable que
 * contiene el delete a la tabla products. Una vez realiza el delete, comprueba que no hayan errores
 * con la conexión a la base de datos, si no los tiene cierra la conexión y retorna falso.
 * Parámetros: id del producto a eliminar.
 */
function DeleteProduct($pId)
{
    $connection = Connect();
    $sqlDelete = "DELETE FROM products WHERE id = '$pId';";
    $connection->query($sqlDelete);
    if ($connection->connect_errno) {
        $connection->close();
        return false;
    }
    $connection->close();
    return true;
}
