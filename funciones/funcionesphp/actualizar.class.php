<?php 
include_once 'Conexion.class.php';
class ConsultaCont
{
    private $conexion;
    function __construct()
    {
        $this->conexion = new Conexion();
    }
    function consultarUsuario($id){
        try {
        return $this->conexion->conn->query("SELECT `idUsuario`, `nombreUsuario`, `apellidoUsuario`, `telefonoUsuario`, `correoUsuario`, `idScopeUsu`,`idScope`,`nombreScope` FROM `usuarios` INNER JOIN scope ON usuarios.idScopeUsu = scope.idScope WHERE idUsuario = $id");
        } catch (\Exception $e) {
            echo 'error';
        }
       
    }

}

