$(".btnEditarUsuario").click(function(){

    var idUsuario = $(this).attr("idUsuario");
    var datos  = new FormData();
    datos.append("idUsuario", idUsuario);
    datos.append("funcion", "funcion1");

    $.ajax({
        url: "ajax/ajaxUsuario.php",
        method: "POST",
        data: datos,
        cache:false,
        contentType: false,
        processData: false,
        dataType:"json",
        success: function(respuesta){
            console.log("respueta", respuesta)
           $("#int_prodId").val(respuesta["id"])
           $("#txtCedulaModificar").val(respuesta["cedula"])
           $("#txtNombresModificar").val(respuesta["nombres_apellidos"])
           $("#txtCorreoModificar").val(respuesta["correo"])
           $("#txtTelefonoModificar").val(respuesta["telefono"])
           $("#cbxEmpleadoModificar").val(respuesta["tipo_empleado"])
           $("#txtUsernameModificar").val(respuesta["username"])
           $("#txtPassModificar").val(respuesta["password"])
           $("#txtResPassModificar").val(respuesta["password"])
           $("#cbxEstadoModificar").val(respuesta["estado"])
           $("#cbxRolModificar").val(respuesta["id_rol"])
           $("#cbxParroquiaModificar").val(respuesta["id_parroquia"])
           $("#cbxRangoModificar").val(respuesta["rango"])
           
        }
    });
})

$(".btnEliminarUsuarios").click(function(){

    var idUsuario = $(this).attr("idUsuario");
    var datos  = new FormData();
    console.log("resuesta", idUsuario);
    datos.append("idUsuario", idUsuario);
    datos.append("funcion", "funcion2");
  
    Swal.fire({
        title: 'Está seguro que desea eliminar los datos del usuario?',
        text: "No podrá recuperar los datos!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminalo!',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "ajax/ajaxUsuario.php",
                method: "POST",
                data: datos,
                cache:false,
                contentType: false,
                processData: false,
                dataType:"json",
                success: function(respuesta){
                    $("#int_prodId").val(respuesta["id"])
                   if (respuesta == 1){
                        Swal.fire({
                            icon: 'success',
                            title: 'Elimando',
                            text: 'Datos Eliminados con exito!',
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "usuarios";
                            }
                        })
                        
                   }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'No se pudo eliminar los datos!',
                        })

                   }
                   
                }
            });

        }
    });    
})