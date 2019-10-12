<form action="" id="frmFormulario" class="mt-3">
    <div class="row mb-3">
        <div class="col-sm-12 col-md-6">
            <label for="txtNombre">Digite el nombre del estudiante</label>
            <input type="text" name="" id="txtNombre"  class="form-control"
            value="<?php if(isset($contacto['nombreUsuario'])){
                echo $contacto['nombreUsuario'];
            } ?>">
            <label for="txtNombre">Digite el apellido del estudiante</label>
            <input type="text" name="" id="txtApellido" class="form-control"
            value="<?php if(isset($contacto['apellidoUsuario'])){
                echo $contacto['apellidoUsuario'];
            } ?>">
            <label for="txtNombre">Digite el correo del estudiante</label>
            <input type="email" name="" id="txtEmail" class="form-control"
            value="<?php if(isset($contacto['correoUsuario'])){
                echo $contacto['correoUsuario'];
            } ?>">
            
        </div>
        <div class="col-sm-12 col-md-6">
            <label for="">Define que scope tendrá el estudiante</label>
            <select name="" id="selecScope" class="form-control">
                <option value="0" >Scope</option>
                <option value="1" <?php if(isset($contacto['idScopeUsu'])){
                    if($contacto['idScopeUsu']=='1'){
                    echo 'selected="true"';
                    }
                }?>>Instructor</option>
                <option value="2" <?php if(isset($contacto['idScopeUsu'])){
                    if($contacto['idScopeUsu']=='2'){
                    echo 'selected="true"';
                    }
                } ?>>Vocero</option>
                <option value="3" <?php if(isset($contacto['idScopeUsu'])){
                    if($contacto['idScopeUsu']=='3'){
                    echo 'selected="true"';
                    }
                } ?>>Aprendíz</option>
            </select>
            <label for="txtTelefono">Digite el telefono</label>
            <input type="number" name="" id="txtTelefono" class="form-control"
            value="<?php if(isset($contacto['telefonoUsuario'])){
                echo $contacto['telefonoUsuario'];
            } ?>">
            <label for="" class="d-block">Envia tus datos</label>
            <input type="hidden" name="" id="accion" value="<?php if(isset($contacto['idScopeUsu'])){
                echo 'editar';
            }else{
                echo 'crear';
            }?>">
            <?php if(isset($contacto['idScopeUsu'])){ ?>
                <input type="hidden" id="id" value="<?php echo $contacto['idUsuario']?>">
            <?php } ?>
            <input type="submit" value="<?php if(isset($contacto['idScopeUsu'])){
                echo 'Guardar';
            }else{
                echo 'Enviar';
            }?>" id="btnEnviar" class="btn btn-outline-danger btn-md btn-block">
        </div>
    </div>
</form>