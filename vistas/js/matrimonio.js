$(".btnTraerMatrimonio").click(function () {

    var idPersona = $(this).attr("idPersona");
    var datos = new FormData();

    datos.append("idPersona", idPersona);
    datos.append("funcion", "funcion1");

    $.ajax({
        url: "ajax/ajaxMatrimonio.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            console.log('respuesta', respuesta)
            $("#intFamilia").val(respuesta["id"])
            $("#txtNombre").val(respuesta["nombres"])


        }
    });
})


$(".btnTraerPadrino1Matrimonio").click(function () {

    var idPersona = $(this).attr("idPersona");
    var datos = new FormData();

    datos.append("idPersona", idPersona);
    datos.append("funcion", "funcion2");

    $.ajax({
        url: "ajax/ajaxMatrimonio.php",
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

$(".btnTraerPadrino2Matrimonio").click(function () {

    var idPersona = $(this).attr("idPersona");
    var datos = new FormData();

    datos.append("idPersona", idPersona);
    datos.append("funcion", "funcion2");

    $.ajax({
        url: "ajax/ajaxMatrimonio.php",
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