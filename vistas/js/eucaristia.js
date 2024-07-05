$(".btnEditarEucaristia").click(function(){

    var idEucaristia = $(this).attr("idEucaristia");
    var datos  = new FormData();
    datos.append("idEucaristia", idEucaristia);
    datos.append("funcion", "funcion1");

    $.ajax({
        url: "ajax/ajaxEucaristia.php",
        method: "POST",
        data: datos,
        cache:false,
        contentType: false,
        processData: false,
        dataType:"json",
        success: function(respuesta){
           $("#int_prodId").val(respuesta["id"])
           $("#txt_nombreModM").val(respuesta["nombre"])
           $("#txt_fechaModM").val(respuesta["fecha"])
           $("#txt_horaModM").val(respuesta["hora"])
           $("#txt_descripcionModM").val(respuesta["descripcion"])
           console.log(respuesta)
        }
    });
})

$(".btnEliminarEucaristia").click(function(){

    var idEucaristia = $(this).attr("idEucaristia");
    var datos  = new FormData();
    datos.append("idEucaristia", idEucaristia);
    datos.append("funcion", "funcion2");
  
    Swal.fire({
        title: 'Está seguro que desea eliminar los datos de eucaristia?',
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
                url: "ajax/ajaxEucaristia.php",
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
                                window.location= "eucaristia";
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

$(".btnReporteIntension").click(function () {

    var idEucaristia = $(this).attr("idEucaristia");
    var idParroquia = $(this).attr("idParroquia");

    window.open("extensiones/fpdf/intensiones.php?codigo="+idEucaristia, "_blank");

    
})
