$(document).ready(function(){
    const formularioContacto = document.querySelector('#frmFormulario');
    
    registros = document.querySelector('tbody');
    if(registros){
        registros.addEventListener('click', eliminarRegistro);
        actulizarTabla();
    }
    if(formularioContacto){
        formularioContacto.addEventListener('submit',validarCampos);
    }
    
    
    




    function validarCampos(e){
        formularioContacto.addEventListener('submit',validarCampos);
        txtNombre = document.querySelector('#txtNombre').value;
        txtApellido = document.querySelector('#txtApellido').value
        txtEmail = document.querySelector('#txtEmail').value
        txtTelefono = document.querySelector('#txtTelefono').value
        selecScope = document.querySelector('#selecScope').value;
        accion = document.querySelector('#accion').value;
        e.preventDefault();
        if(txtNombre==='' || txtApellido==='' || txtEmail===''||txtTelefono===''||selecScope==='0'){
            mostrarNotificacion('Todos los campos son obligatorios','alert-danger');
        }
        else{
            const infoEstudiante = new FormData();
            infoEstudiante.append('nombre',txtNombre);
            infoEstudiante.append('apellido',txtApellido);
            infoEstudiante.append('telefono',txtTelefono);
            infoEstudiante.append('email',txtEmail);
            infoEstudiante.append('scope',selecScope);
            infoEstudiante.append('accion',accion);
            if(accion === 'crear'){
                insertarDb(infoEstudiante);
            }
            else{
                const id = document.querySelector('#id').value;
                infoEstudiante.append('id',id);
                actualizarDb(infoEstudiante);
            }

        }
    }
    function actualizarDb(datos){
        const xhr = new XMLHttpRequest();

        xhr.open('POST','funciones/funcionesphp/añadir.class.php',true)
        xhr.onload = function(){
            const respuesta = JSON.parse(xhr.responseText)
            if(respuesta.respuesta === 'Correcto'){
                mostrarNotificacion('Datos actualizados correctamente','alert-success');
            }else{
                mostrarNotificacion('Error desconocido','alert-danger');
            }
            setInterval(() => {
                window.location.href = 'index.php'
            }, 3000);
        }
        xhr.send(datos);
    }
    function insertarDb(datos){
        const xhr = new XMLHttpRequest();
        xhr.open('POST','funciones/funcionesphp/Añadir.class.php');
        xhr.onload = function(){
            if(this.status === 200){

                const respuesta = JSON.parse(xhr.responseText);
                console.log(respuesta)
                if(respuesta.respuesta ==='Correcto'){
                    mostrarNotificacion('Datos enviados correctamente','alert-success');
                    document.querySelector('form').reset();
                    actulizarTabla();
                }
            }
        }
        xhr.send(datos);
    }

    function eliminarRegistro(e){
        if(e.target.parentElement.classList.contains('btn-eliminar')){
            const id = e.target.parentElement.getAttribute('usuaeliminar');

            let respuesta = confirm('Estas seguro de eliminar el registro?');
            if(respuesta){
                const xhr = new XMLHttpRequest();
                xhr.open('GET',`funciones/funcionesphp/borrar.class.php?id=${id}&accion=borrar`)
                xhr.onload = function(){
                    const respuesta = JSON.parse(xhr.responseText);
                    if(respuesta.respuesta=='correcto'){
                        actulizarTabla();
                        mostrarNotificacion('Se elimino correctamente','alert-success');
                    }
                }
                xhr.send()
            }
        }  
    }
    function actulizarTabla(){
        const xhr = new XMLHttpRequest();
        xhr.open('GET','funciones/funcionesphp/consulta.class.php');
        xhr.onload = function(){
            fila = document.querySelector('#fila');
            fila.innerHTML = xhr.responseText;
        }
        xhr.send();
    }
    //Mostrar notificacion
    function mostrarNotificacion(mensaje,clase){
        alerta =  document.querySelector('#fijado');
        parrafo = document.querySelector('#mensaje');
        $(alerta).removeClass('alert-success');
        $(alerta).removeClass('alert-danger');
        $(alerta).removeClass('d-none');
        parrafo.innerHTML = '';
        setTimeout(() => {
            $(alerta).addClass(clase);
            parrafo.innerHTML = mensaje;
            setTimeout(() => {
                $(alerta).addClass('d-none');
            }, 4000);
        }, 3);
    }

});