$(".btnEditarNiveles").click(function(){ 

    var idNiveles = $(this).attr("idNiveles");
    var datos  = new FormData();
    datos.append("idNiveles", idNiveles);
    datos.append("funcion", "funcion1");
    $.ajax({
        url: "ajax/ajaxNiveles.php",
        method: "POST",
        data: datos,
        cache:false,
        contentType: false,
        processData: false,
        dataType:"json",
        success: function(respuesta){
           console.log("respuesta", respuesta);
           $("#int_prodId").val(respuesta["id"])
           $("#txt_nombreModM").val(respuesta["nombres"]) 
           $("#txt_requisitosModM").val(respuesta["requisito"])
           $("#txt_descripcionModM").val(respuesta["descripcion"])
        }
    });
})


$(".btnEliminarNiveles").click(function(){

    var idNiveles = $(this).attr("idNiveles");
    var datos  = new FormData();
    datos.append("idNiveles", idNiveles);
    datos.append("funcion", "funcion2");
  
    Swal.fire({
        title: 'Está seguro que desea eliminar los datos de nivel?',
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
                url: "ajax/ajaxNiveles.php",
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
                                window.location= "niveles-catesismo";
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