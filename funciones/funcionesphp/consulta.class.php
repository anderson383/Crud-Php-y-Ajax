<?php 
include_once 'Conexion.class.php';
class Consulta
{
    private $conexion;
    private $personas;
    function __construct()
    {
        $this->conexion = new Conexion();
    }
    function consultarTabla(){
        try {
        $this->personas =  $this->conexion->conn->query("SELECT `idUsuario`, `nombreUsuario`, `apellidoUsuario`, `telefonoUsuario`, `correoUsuario`, `idScopeUsu`,`idScope`,`nombreScope` FROM `usuarios` INNER JOIN scope ON usuarios.idScopeUsu = scope.idScope ORDER BY idUsuario ASC");
        ?>
        <?php foreach($this->personas as $valor):?>
         <tr>
            <th><?php echo $valor['idUsuario']?></th>
            <td><?php echo $valor['nombreUsuario']?></td>
            <td><?php echo $valor['apellidoUsuario']?></td>
            <td><?php echo $valor['telefonoUsuario']?></td>
            <td><?php echo $valor['correoUsuario']?></td>
            <td><?php echo $valor['nombreScope']?></td>
            <td class="text-center">
                <a href="actualizarRegistro.php?id=<?php echo $valor['idUsuario']?>" class="btn-editar">
                    <i class="fas fa-user-edit"></i>
                </a>
                <button class="btn-eliminar" type="button" usuaeliminar="<?php echo $valor['idUsuario']?>">
                    <i class="fas fa-minus-circle"></i>
                </button>
            </td>
            
        </tr>
        <?php endforeach; ?>
       <?php 
        } catch (\Exception $e) {
            echo 'error';
        }
       
    }
}
$consulta = new Consulta();
$consulta->consultarTabla();



















?>