<?php
require_once 'Conexion.php';
require_once 'Usuario.php';

class UsuariosDAO {
    private $conexion;
    
    public function __construct() {
        $this->conexion = new Conexion();
    }
    
    public function listar() {
        $query = "SELECT * FROM usuarios";
        $result = mysqli_query($this->conexion->conectar(), $query);
        $usuarios = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $usuario = new Usuario();
            $usuario->setId($row['id']);
            $usuario->setNombre($row['nombre']);
            $usuario->setEmail($row['email']);
            $usuario->setPassword($row['password']);
            $usuarios[] = $usuario;
        }
        return $usuarios;
    }
    
    public function obtenerPorId($id) {
        $query = "SELECT * FROM usuarios WHERE id = $id";
        $result = mysqli_query($this->conexion->conectar(), $query);
        $row = mysqli_fetch_assoc($result);
        $usuario = new Usuario();
        $usuario->setId($row['id']);
        $usuario->setNombre($row['nombre']);
        $usuario->setEmail($row['email']);
        $usuario->setPassword($row['password']);
        return $usuario;
    }
    
    public function agregar($usuario) {
        $id = $usuario->getId();
        $nombre = $usuario->getNombre();
        $email = $usuario->getEmail();
        $password = $usuario->getPassword();
        $query = "INSERT INTO usuarios(id, nombre, email, password) VALUES('$id', '$nombre', '$email', '$password')";
        $result = mysqli_query($this->conexion->conectar(), $query);
        return $result;
    }
    
    public function actualizar($usuario) {
        $id = $usuario->getId();
        $nombre = $usuario->getNombre();
        $email = $usuario->getEmail();
        $password = $usuario->getPassword();
        $query = "UPDATE usuarios SET nombre = '$nombre', email = '$email', password = '$password' WHERE id = $id";
        $result = mysqli_query($this->conexion->conectar(), $query);
        return $result;
    }
    
    public function eliminar($id) {
        $query = "DELETE FROM usuarios WHERE id = $id";
        $result = mysqli_query($this->conexion->conectar(), $query);
        return $result;
    }
}
?>