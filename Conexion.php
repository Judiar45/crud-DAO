<?php
class Conexion {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "usuarios";
    
    public function conectar() {
        $conexion = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        return $conexion;
    }
}
?>
