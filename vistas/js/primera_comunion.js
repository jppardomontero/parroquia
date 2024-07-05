$(".btnTraerPersonaPrimeraComunion").click(function () {

    var idPersona = $(this).attr("idPersona");
    var datos = new FormData();

    datos.append("idPersona", idPersona);
    datos.append("funcion", "funcion1");

    $.ajax({
        url: "ajax/ajaxPrimeraComunion.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            console.log('respuesta', respuesta)
            $("#intPersona").val(respuesta["id"])
            $("#intFamilia").val(respuesta["CodigoFamilia"])
            $("#txtNombre").val(respuesta["nombres"])
            $("#txtApellido").val(respuesta["apellidos"])






        }
    });
})



$(".btnPrimeraComunion").click(function () {
    var idPersona = $(this).attr("idPersona");
	window.open("extensiones/fpdf/primera-comunion.php?codigo="+idPersona, "_blank");
})



$(".btnTraerPersonaModificarPrimeraComunion").click(function () {

    var idPersona = $(this).attr("idPersona");
    var datos = new FormData();

    datos.append("idPersona", idPersona);
    datos.append("funcion", "funcion1");

    $.ajax({
        url: "ajax/ajaxPrimeraComunion.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            console.log('respuesta', respuesta)
            $("#intPersonaModificar").val(respuesta["id"])
            $("#intFamiliaModificar").val(respuesta["CodigoFamilia"])
            $("#txtNombreModificar").val(respuesta["nombres"])
            $("#txtApellidoModificar").val(respuesta["apellidos"])

        }
    });
})


$(".btnEditarPrimeraComunion").click(function () {

    var idPersona = $(this).attr("idPersona");
    var datos = new FormData();

    datos.append("idPersona", idPersona);
    datos.append("funcion", "funcion2");

    $.ajax({
        url: "ajax/ajaxPrimeraComunion.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            console.log('respuesta', respuesta)
            $("#intPersonaModificar").val(respuesta["id_persona"])
            $("#intFamiliaModificar").val(respuesta["id_familia"])
            $("#txtNombreModificar").val(respuesta["nombres"])
            $("#txtApellidoModificar").val(respuesta["apellidos"])
            $("#txtLugarModificar").val(respuesta["lugar"])
            $("#txtFechaModificar").val(respuesta["fecha"])
            $("#txtSacerdoteModificar").val(respuesta["sacerdote"])
            $("#codigo").val(respuesta["id"])





        }
    });
})

$(".btnEliminarPrimeraComunion").click(function(){

    var idPersona = $(this).attr("idPersona");
    var datos  = new FormData();
    datos.append("idPersona", idPersona);
    datos.append("funcion", "funcion3");
  
    Swal.fire({
        title: 'Está seguro que desea eliminar los datos de primera comunion?',
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
                url: "ajax/ajaxPrimeraComunion.php",
                method: "POST",
                data: datos,
                cache:false,
                contentType: false,
                processData: false,
                dataType:"json",
                success: function(respuesta){
                    console.log('respuesta', respuesta)
                   if (respuesta == 1){
                        Swal.fire({
                            icon: 'success',
                            title: 'Elimando',
                            text: 'Datos Eliminados conexito!',
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "sacramento-primera-comunion";
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


