$(".btnTraerPersona").click(function () {

    var idPersona = $(this).attr("idPersona");
    var datos = new FormData();

    datos.append("idPersona", idPersona);
    datos.append("funcion", "funcion1");

    $.ajax({
        url: "ajax/ajaxBautizo.php",
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


$(".btnTraerPadrino1").click(function () {

    var idPersona = $(this).attr("idPersona");
    var datos = new FormData();

    datos.append("idPersona", idPersona);
    datos.append("funcion", "funcion1");

    $.ajax({
        url: "ajax/ajaxBautizo.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            console.log('respuesta', respuesta)
            $("#intPadrino1").val(respuesta["id"])
            $("#txtNombrePadrino1").val(respuesta["nombres"])
            $("#txtApellidoPadribo1").val(respuesta["apellidos"])


        }
    });
})

$(".btnTraerPadrino2").click(function () {

    var idPersona = $(this).attr("idPersona");
    var datos = new FormData();

    datos.append("idPersona", idPersona);
    datos.append("funcion", "funcion1");

    $.ajax({
        url: "ajax/ajaxBautizo.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            console.log('respuesta', respuesta)
            $("#intPadrino2").val(respuesta["id"])
            $("#txtNombrePadrino2").val(respuesta["nombres"])
            $("#txtApellidoPadribo2").val(respuesta["apellidos"])


        }
    });
})


$(".btnEditarBautizo").click(function () {

    var idPersona = $(this).attr("idPersona");
    var datos = new FormData();

    datos.append("idPersona", idPersona);
    datos.append("funcion", "funcion2");

    $.ajax({
        url: "ajax/ajaxBautizo.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            console.log("respuesta", respuesta);
            
            $("#txtNombreEdit").val(respuesta["nombre_persona"])
            $("#txtApellidoEdit").val(respuesta["apellido_persona"])
            $("#txtUsuarioEdit").val(respuesta["sacerdote"])
            $("#txtTomoEdit").val(respuesta["tomo"])
            $("#txtPaginaEdit").val(respuesta["pagina"])
            $("#txtActaEdit").val(respuesta["acta"])
            $("#txtNota_marginalEdit").val(respuesta["nota_marginal"])
            $("#txtLugarEdit").val(respuesta["lugar"])
            $("#txtFechaEdit").val(respuesta["fecha"])
            $("#intPersonaEdit").val(respuesta["id_persona"])
            $("#intFamiliaEdit").val(respuesta["id_familia"])
            $("#txtNombrePadrino1Edit").val(respuesta["nombre_padrino1"])
            $("#txtApellidoPadrino1Edit").val(respuesta["apellido_padrino1"])
            $("#intPadrino1Edit").val(respuesta["id_padrino_padrino1"])
            $("#txtNombrePadrino2Edit").val(respuesta["nombre_padrino2"])
            $("#txtApellidoPadrino2Edit").val(respuesta["apellido_padrino2"])
            $("#intPadrino2Edit").val(respuesta["id_padrino_padrino2"])
            $("#intBautizo").val(respuesta["id"])
            $("#intPersonaPadrino1Edit").val(respuesta["idPersonaPadrino1"])
            $("#intPersonaPadrino2Edit").val(respuesta["idPersonaPadrino2"])
            
        }
    });
})


//Funciones para editar

$(".btnTraerPersonaEdit").click(function () {

    var idPersona = $(this).attr("idPersona");
    var datos = new FormData();

    datos.append("idPersona", idPersona);
    datos.append("funcion", "funcion1");

    $.ajax({
        url: "ajax/ajaxBautizo.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            console.log('respuesta', respuesta)
            $("#intPersonaEdit").val(respuesta["id"])
            $("#intFamiliaEdit").val(respuesta["CodigoFamilia"])
            $("#txtNombreEdit").val(respuesta["nombres"])
            $("#txtApellidoEdit").val(respuesta["apellidos"])


        }
    });
})

$(".btnTraerPadrino1Edit").click(function () {

    var idPersona = $(this).attr("idPersona");
    var datos = new FormData();

    datos.append("idPersona", idPersona);
    datos.append("funcion", "funcion1");

    $.ajax({
        url: "ajax/ajaxBautizo.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            console.log('respuesta', respuesta)
            $("#intPadrino1Edit").val(respuesta["id"])
            $("#txtNombrePadrino1Edit").val(respuesta["nombres"])
            $("#txtApellidoPadrino1Edit").val(respuesta["apellidos"])


        }
    });
})

$(".btnTraerPadrino2Edit").click(function () {

    var idPersona = $(this).attr("idPersona");
    var datos = new FormData();

    datos.append("idPersona", idPersona);
    datos.append("funcion", "funcion1");

    $.ajax({
        url: "ajax/ajaxBautizo.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            console.log('respuesta', respuesta)
            $("#intPadrino2Edit").val(respuesta["id"])
            $("#txtNombrePadrino2Edit").val(respuesta["nombres"])
            $("#txtApellidoPadrino2Edit").val(respuesta["apellidos"])


        }
    });
})


//Eliminar Bautizo
$(".btnEliminarBautizo").click(function () {

    var idPersona = $(this).attr("idPersona");
    var datos = new FormData();

    datos.append("idPersona", idPersona);
    datos.append("funcion", "funcion3");

    Swal.fire({
        title: 'Está seguro que desea eliminar los datos del Bautizo?',
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
                url: "ajax/ajaxBautizo.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {
                    console.log('respuesta', respuesta)

                    if (respuesta == 1) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Elimando',
                            text: 'Datos Eliminados conexito!',
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function (result) {
                            if (result.value) {
                                window.location = "sacramento-bautizo";
                            }
                        })

                    } else {
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





$(".btnFeBautizo").click(function () {
    var idPersona = $(this).attr("idPersona");
	window.open("extensiones/fpdf/bautizo.php?codigo="+idPersona, "_blank");
})





