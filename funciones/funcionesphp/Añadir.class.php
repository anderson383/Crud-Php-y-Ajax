<?php
include_once 'Conexion.class.php';

class Añadir
{
    private $nombreUsuario;
    private $apellidoUsuario;
    private $telefonoUsuario;
    private $correoUsuario;
    private $scopeUsuario;
    private $conexion;

    private $stmt;

    function __construct()
    {
        $this->conexion = new Conexion();
    }
    function añadirUsuario(){
        $this->scopeUsuario = filter_var($this->scopeUsuario,FILTER_SANITIZE_NUMBER_INT);
        try {
            $this->stmt = $this->conexion->conn->prepare("INSERT INTO usuarios(nombreUsuario, apellidoUsuario, telefonoUsuario, correoUsuario, idScopeUsu)
            VALUES ('$this->nombreUsuario','$this->apellidoUsuario','$this->telefonoUsuario','$this->correoUsuario',$this->scopeUsuario)");            
            $this->stmt->execute();
            if($this->stmt->rowCount() >= 1){
                $respuesta = array(
                    'respuesta' => 'Correcto'
                );
            }else{
                $respuesta = array(
                    'error' => 'error'
                );
            }
        } catch (\Exception $e) {
            $respuesta = array(
                'error' => 'error'
            );
        }
        return json_encode($respuesta);
    }
    function actualizarUsuario($id){
        $this->scopeUsuario = filter_var($this->scopeUsuario,FILTER_SANITIZE_NUMBER_INT);
        $id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);
        try {
            $this->stmt = $this->conexion->conn->prepare("UPDATE `usuarios` SET `nombreUsuario`='$this->nombreUsuario',`apellidoUsuario`='$this->apellidoUsuario',`telefonoUsuario`='$this->telefonoUsuario',`correoUsuario`='$this->correoUsuario',`idScopeUsu`= $this->scopeUsuario WHERE idUsuario = $id");            
            $this->stmt->execute();
            if($this->stmt->rowCount() >= 1){
                $respuesta = array(
                    'respuesta' => 'Correcto'
                );
            }else{
                $respuesta = array(
                    'error' => 'error'
                );
            }
        } catch (\Exception $e) {
            $respuesta = array(
                'error' => 'error'
            );
        }
        return json_encode($respuesta);
    }
    function getNombreUsuario(){
        return $this->nombreUsuario;
    }
    function setNombreUsuario($nombreUsuario){
        $this->nombreUsuario = $nombreUsuario;
    }
    function getApellidoUsuario(){
        return $this->apellidoUsuario;
    }
    function setApellidoUsuario($apellidoUsuario){
        $this->apellidoUsuario = $apellidoUsuario;
    }
    function getTelefonoUsuario(){
        return $this->telefonoUsuario;
    }
    function setTelefonoUsuario($telefonoUsuario){
        $this->telefonoUsuario = $telefonoUsuario;
    }
    function getCorreoUsuario(){
        return $this->correoUsuario;
    }
    function setCorreoUsuario($correoUsuario){
        $this->correoUsuario = $correoUsuario;
    }
    function getScopeUsuario(){
        return $this->scopeUsuario;
    }
    function setScopeUsuario($scopeUsuario){
        $this->scopeUsuario = $scopeUsuario;
    }
    function setIdUsuario($id){
        $this->id = $id;
    }
}
$añadir = new Añadir();
$añadir->setNombreUsuario($_POST['nombre']);
$añadir->setApellidoUsuario($_POST['apellido']);
$añadir->setTelefonoUsuario($_POST['telefono']);
$añadir->setCorreoUsuario($_POST['email']);
$añadir->setScopeUsuario($_POST['scope']);
if(isset($_POST['id'])){
    echo $añadir->actualizarUsuario($_POST['id']);
}else{
    echo $añadir->añadirUsuario();
}



?>