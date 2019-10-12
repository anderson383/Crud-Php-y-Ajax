<?php include_once 'funciones/templeates/header.php' ?>
<h1 class="text-center my-5">Añada una nueva persona</h1>

    <div class="container">

        <?php include_once 'funciones/templeates/formulario.php' ?>
        <div class="row mt-5">
            <div class="col">
                <div class="table-responsive-xl">
                    <table class="table table-dark table-striped table-bordered table-hover ">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>Scope</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="fila">
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php include_once 'funciones/templeates/footer.php' ?>