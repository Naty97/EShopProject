<?php
require_once("../logic/connection.php");
$connection = Connect();

class Category
{
    //Category Properties
    public $categoryName;

    /**
     * Constructor que recibe por parámetro las propiedades de la categoría.
     * Parámetros: nombre de la categoría.
     */
    function __construct($pCategoryName)
    {
        $this->categoryName = $pCategoryName;
    }

    /**
     * Category Insert Method: encargado de conectar con la base de datos, luego crea una variable que 
     * contiene el insert a la tabla categories con las respectivas propiedades de la categoría 
     * declaradas arriba. Una vez hace el insert, comprueba que no hayan errores con la conexión a 
     * la base de datos, si no los tiene cierra la conexión y retorna falso.
     */
    function InsertCategory()
    {
        $connection = Connect();
        $sqlInsert = "INSERT INTO categories (name) VALUES ('$this->categoryName')";
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
 * Category Update Method: encargado de conectar con la base de datos, luego crea una variable que 
 * contiene el update a la tabla categories. Una vez hace el update, comprueba que no hayan errores
 * con la conexión a la base de datos, si no los tiene cierra la conexión y retorna falso.
 * Parámetros: id y nombre de la categoría.
 */
function UpdateCategory($pId, $pName)
{
    $connection = Connect();
    $sqlUpdate = "UPDATE categories SET name = '$pName' WHERE id = '$pId'";
    $connection->query($sqlUpdate);

    if ($connection->connect_errno) {
        $connection->close();
        return false;
    }
    $connection->close();
    return true;
}

/**
 * Category Delete Method: encargado de conectar con la base de datos, luego crea una variable que
 * contiene el delete a la tabla categories. Una vez realiza el delete, comprueba que no hayan errores
 * con la conexión a la base de datos, si no los tiene cierra la conexión y retorna falso.
 * Parámetros: id de la categoría a eliminar.
 */
function DeleteCategory($pId)
{
    $connection = Connect();
    $sqlDelete = "DELETE FROM categories WHERE id = '$pId'";
    $connection->query($sqlDelete);

    if ($connection->connect_errno) {
        $connection->close();
        return false;
    }
    $connection->close();
    return true;
}
