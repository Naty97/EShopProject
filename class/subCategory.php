<?php
require_once("../logic/connection.php");
$connection = Connect();

class SubCategory
{
    //Sub-Category Properties
    public $subCategoryName;
    public $idCategory;

    /**
     * Constructor que recibe por parámetro las propiedades de la sub-categoría.
     * Parámetros: nombre de la sub-categoría y id de la categoría padre.
     */
    function __construct($pSubCategoryName, $pIdCategory)
    {
        $this->subCategoryName = $pSubCategoryName;
        $this->idCategory = $pIdCategory;
    }

    /**
     * Sub-Category Insert Method: encargado de conectar con la base de datos, luego crea una variable que 
     * contiene el insert a la tabla sub_categories con las respectivas propiedades de la categoría 
     * declaradas arriba. Una vez hace el insert, comprueba que no hayan errores con la conexión a 
     * la base de datos, si no los tiene cierra la conexión y retorna falso.
     */
    function InsertSubCategory()
    {
        $connection = Connect();
        $sqlInsert = "INSERT INTO sub_categories (name, id_category) VALUES ('$this->subCategoryName', '$this->idCategory')";
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
 * Sub-Category Update Method: encargado de conectar con la base de datos, luego crea una variable que 
 * contiene el update a la tabla sub-categories. Una vez hace el update, comprueba que no hayan errores
 * con la conexión a la base de datos, si no los tiene cierra la conexión y retorna falso.
 * Parámetros: id, nombre de la sub-categoría y id de la sub-categoría.
 */
function UpdateSubCategory($pId, $pName, $pIdCategory)
{
    $connection = Connect();
    $sqlUpdate = "UPDATE sub_categories SET name = '$pName', id_category = '$pIdCategory' WHERE id = '$pId'";
    $connection->query($sqlUpdate);

    if ($connection->connect_errno) {
        $connection->close();
        return false;
    }
    $connection->close();
    return true;
}

/**
 * Sub-Category Delete Method: encargado de conectar con la base de datos, luego crea una variable que
 * contiene el delete a la tabla sub_categories. Una vez realiza el delete, comprueba que no hayan errores
 * con la conexión a la base de datos, si no los tiene cierra la conexión y retorna falso.
 * Parámetros: id de la sub-categoría a eliminar.
 */
function DeleteSubCategory($pId)
{
    $connection = Connect();
    $sqlDelete = "DELETE FROM sub_categories WHERE id = '$pId'";
    $connection->query($sqlDelete);

    if ($connection->connect_errno) {
        $connection->close();
        return false;
    }
    $connection->close();
    return true;
}
