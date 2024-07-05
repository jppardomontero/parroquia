$(".btnEditarPersona").click(function(){

    var idPersona = $(this).attr("idPersona");
    var datos  = new FormData();
    datos.append("idPersona", idPersona);
    datos.append("funcion", "funcion1");

    $.ajax({
        url: "ajax/ajaxPersona.php",
        method: "POST",
        data: datos,
        cache:false,
        contentType: false,
        processData: false,
        dataType:"json",
        success: function(respuesta){
           $("#int_prodId").val(respuesta["id"])
           $("#txt_cedulaModM").val(respuesta["cedula"])
           $("#txt_nombreModM").val(respuesta["nombres"])
           $("#txt_apellidoModM").val(respuesta["apellidos"])
           $("#txt_f_nacimientoModM").val(respuesta["f_nacimiento"])
           $("#cbx_sexoModM").val(respuesta["genero"])
           $("#txt_estado_civilModM").val(respuesta["estado_civil"])
           $("#txt_nacionalidadModM").val(respuesta["nacionalidad"])
           $("#txt_profesionModM").val(respuesta["profesion"])
           $("#txt_lugarNacimientoModM").val(respuesta["lugar_nacimiento"])
           
        }
    });
})

$(".btnEliminarPersona").click(function(){

    var idPersona = $(this).attr("idPersona");
    var datos  = new FormData();
    datos.append("idPersona", idPersona);
    datos.append("funcion", "funcion2");
  
    Swal.fire({
        title: 'Está seguro que desea eliminar los datos de persona?',
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
                url: "ajax/ajaxPersona.php",
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
                            text: 'Datos Eliminados conexito!',
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "personas";
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

