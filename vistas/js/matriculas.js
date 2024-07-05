$(".btnEditarMatriculas").click(function(){ 

    var idMatriculas = $(this).attr("idMatriculas");
    var datos  = new FormData();
    datos.append("idMatriculas", idMatriculas);
    datos.append("funcion", "funcion1");
    $.ajax({
        url: "ajax/ajaxMatriculas.php",
        method: "POST",
        data: datos,
        cache:false,
        contentType: false,
        processData: false,
        dataType:"json",
        success: function(respuesta){
           console.log("respuesta", respuesta);
           $("#int_prodId").val(respuesta["id"])
           $("#txt_partida_matrimonioModM").val(respuesta["partida_matrimonio"])
           $("#txt_fe_bautismoModM").val(respuesta["fe_bautismo"])
           $("#txt_tarjeta_parroquialModM").val(respuesta["tarjeta_parroquial"])
           $("#txt_estadoModM").val(respuesta["estado"])
        }
    });
})


$(".btnEliminarMatriculas").click(function(){

    var idMatriculas = $(this).attr("idMatriculas");
    var datos  = new FormData();
    datos.append("idMatriculas", idMatriculas);
    datos.append("funcion", "funcion2");
  
    Swal.fire({
        title: 'Está seguro que desea eliminar los datos de matricula?',
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
                url: "ajax/ajaxMatriculas.php",
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
                                window.location= "matriculas-catesismo";
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


$(".btnReporteMatriculaAprobado").click(function () {

    var idMatricula = $(this).attr("idMatricula");
    var estado = 'Aprobado'
    window.open("extensiones/fpdf/matricula.php?codigo="+idMatricula+"&estado="+estado, "_blank");

    
})

$(".btnReporteMatriculaReprobado").click(function () {

    var idMatricula = $(this).attr("idMatricula");
    var estado = 'Reprobado'
    window.open("extensiones/fpdf/matricula.php?codigo="+idMatricula+"&estado="+estado, "_blank");

    
})

