$(".btnEditarParroquia").click(function(){

    var idParroquia = $(this).attr("idParroquia");
    var datos  = new FormData();
    datos.append("idParroquia", idParroquia);
    datos.append("funcion", "funcion1");


    $.ajax({
        url: "ajax/ajaxParroquia.php",
        method: "POST",
        data: datos,
        cache:false,
        contentType: false,
        processData: false,
        dataType:"json",
        success: function(respuesta){
            $("#int_prodId").val(respuesta["id"])
            $("#nombre_modificar").val(respuesta["nombre"])
            $("#localidad_modificar").val(respuesta["localidad"])
            $("#parroquia_modificar").val(respuesta["parroquia"])
            $("#aux_logo").val(respuesta["logo"])
            $("#aux_wallpapers").val(respuesta["wallpapers"])
           
        
           
        }
    });
})

$(".btnEliminarParroquia").click(function(){

    var idParroquia = $(this).attr("idParroquia");
    var datos  = new FormData();
    datos.append("idParroquia", idParroquia);
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
                url: "ajax/ajaxParroquia.php",
                method: "POST",
                data: datos,
                cache:false,
                contentType: false,
                processData: false,
                dataType:"json",
                success: function(respuesta){
                    console.log("respuesta", respuesta);
                   if (respuesta['id']){
                        Swal.fire({
                            icon: 'success',
                            title:'Elimando',
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