<?php 
include_once 'Conexion.class.php';
class Eliminar{
    
    private $idUsuario;
    private $stmt;
    private $conex;
    function __construct()
    {
        $this->conex = new Conexion();
    }
    function eliminarContacto(){
        $this->idUsuario = filter_var($this->idUsuario,FILTER_SANITIZE_NUMBER_INT);

        try {
            $this->stmt = $this->conex->conn->prepare("DELETE FROM `usuarios` WHERE idUsuario = $this->idUsuario");
            $this->stmt->execute();
            if($this->stmt->rowCount() >= 1){
                $respuesta = array(
                    'respuesta'=>'correcto'
                );
            }
            else{
                $respuesta = array(
                    'error'=>'error'
                );
            }
        } catch (\Exception $th) {
            $respuesta = array(
                'error'=>'error'
            );
        }
        return json_encode($respuesta);
    }
    function getIdUsuario(){
        return $this->idUsuario;
    }
    function setUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }

}
$eliminarUsu = new Eliminar();
$eliminarUsu->setUsuario($_GET['id']);
echo $resul = $eliminarUsu->eliminarContacto();












?>