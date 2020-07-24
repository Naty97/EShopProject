<?php
require_once("../logic/connection.php");
$connection = Connect();

class User
{

    //User Properties
    public $id;
    public $name;
    public $lastname;
    public $phoneNumber;
    public $email;
    public $address;
    public $password;

    /**
     * Constructor que recibe por parámetro las propiedades del usuario, ya sea administrador o cliente.
     * Parámetros: nombre, apellido, número de teléfono, correo eletrónico, dirección y contraseña.
     */
    function __construct($pName, $pLastname, $pPhoneNumber, $pEmail, $pAddress, $pPassword)
    {
        $this->name = $pName;
        $this->lastname = $pLastname;
        $this->phoneNumber = $pPhoneNumber;
        $this->email = $pEmail;
        $this->address = $pAddress;
        $this->password = $pPassword;
    }

    /**
     * User Insert Method: encargado de conectar con la base de datos, luego crea una variable que 
     * contiene el insert a la tabla users con las respectivas propiedades del usuario declaradas 
     * arriba. Una vez hace el insert, comprueba que no hayan errores con la conexión a la 
     * base de datos, si no los tiene cierra la conexión y retorna falso.
     */
    function InsertUser()
    {
        $connection = Connect();
        $sqlInsert = "INSERT INTO users (name, lastname, phone_number, email, address, password) 
            VALUES ('$this->name', '$this->lastname', '$this->phoneNumber', '$this->email', '$this->address', '$this->password');";
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
 * User Update Method: encargado de conectar con la base de datos, luego crea una variable que 
 * contiene el update a la tabla users. Una vez hace el update, comprueba que no hayan errores
 * con la conexión a la base de datos, si no los tiene cierra la conexión y retorna falso.
 * Parámetros: id del usuario, nombre, apellidos, número de teléfono, correo electrónico, dirección y contraseña.
 */
function UpdateUser($pId, $name, $lastname, $phoneNumber, $email, $address, $password)
{
    $connection = Connect();
    $sqlUpdate = "UPDATE users SET name = '$name', lastname = '$lastname', phone_number = '$phoneNumber', email = '$email', address = '$address', password = '$password' WHERE id = '$pId';";
    $connection->query($sqlUpdate);
    if ($connection->connect_errno) {
        $connection->close();
        return false;
    }
    $connection->close();
    return true;
}

/**
 * User Delete Method: encargado de conectar con la base de datos, luego crea una variable que
 * contiene el delete a la tabla users. Una vez realiza el delete, comprueba que no hayan errores
 * con la conexión a la base de datos, si no los tiene cierra la conexión y retorna falso.
 * Parámetros: id del usuario a eliminar.
 */
function DeleteUser($pId)
{
    $connection = Connect();
    $sqlDelete = "DELETE FROM users WHERE id = '$pId';";
    $connection->query($sqlDelete);
    if ($connection->connect_errno) {
        $connection->close();
        return false;
    }
    $connection->close();
    return true;
}

/**
 * Authenticate User Method: encargado de conectar con la base de datos, luego crea una variable que
 * contiene un select a la tabla users, donde selecciona el usuario que tenga el mismo correo electrónico
 * y contraseña que ha digitado el usuario. Una vez realiza la consulta, comprueba que no hayan errores
 * con la conexión a la base de datos, si no los tiene cierra la conexión y retorna falso.
 * Parámetros: correo electrónico y contraseña del usuario.
 */
function AuthenticateUser($email, $password)
{
    $connection = Connect();
    $sqlSelect = "SELECT * FROM users WHERE email = '$email' AND password = '$password';";
    $result = $connection->query($sqlSelect);

    if ($connection->connect_errno) {
        $connection->close();
        return false;
    }
    $connection->close();
    return $result->fetch_array();
}
