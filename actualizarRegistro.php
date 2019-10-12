<?php include_once 'funciones/templeates/header.php' ?>
    <div class="container">
        <h1 class="text-center">Actualizar Registro</h1>
        <?php include_once 'funciones/funcionesphp/actualizar.class.php'?>
            <?php 
                $usuarios = new ConsultaCont();
                $usuario = $usuarios->consultarUsuario($_GET['id']);
                $contacto = $usuario->fetch(PDO::FETCH_ASSOC);
            ?>
        <?php include_once 'funciones/templeates/formulario.php'?>
        
    </div>
<?php include_once 'funciones/templeates/footer.php' ?>
