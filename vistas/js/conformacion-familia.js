$(".btnTraerPersonaconformacionfamilia").click(function () {

    var idPersona = $(this).attr("idPersona");
    var datos = new FormData();

    datos.append("idPersona", idPersona);
    datos.append("funcion", "funcion1");

    console.log('numero', idPersona)

    $.ajax({
        url: "ajax/ajaxConformacion-familia.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            console.log('respuesta', respuesta)
            $("#intPersona").val(respuesta["id"])
            //$("#intFamilia").val(respuesta["CodigoFamilia"])
            $("#txtNombre").val(respuesta["nombres"])
            $("#txtApellido").val(respuesta["apellidos"])


        }
    });
})


$(".btnTraerFamilia").click(function () {

    var idPersona = $(this).attr("idPersona");
    var datos = new FormData();
    console.log(idPersona)

    datos.append("idPersona", idPersona);
    datos.append("funcion", "funcion2");

    $.ajax({
        url: "ajax/ajaxConformacion-familia.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            console.log('repuestafamilia', respuesta)
            $("#intFamilia").val(respuesta["id"])
            $("#txtNombrefamilia").val(respuesta["nombres"])

        }
    });
})

//Eliminar Conformacion Familia
$(".btnEliminarConformacionFamilia").click(function(){

    var idPersona = $(this).attr("idPersona");
    var datos = new FormData();

    datos.append("idPersona", idPersona);
    datos.append("funcion", "funcion3");
  
    Swal.fire({
        title: 'Está seguro que desea eliminar los datos de Conformacion De Familias?',
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
                url: "ajax/ajaxConformacion-familia.php",
                method: "POST",
                data: datos,
                cache:false,
                contentType: false,
                processData: false,
                dataType:"json",
                success: function(respuesta){
                    console.log('respuesta', respuesta) 
               
                    if (respuesta['id']){
                        Swal.fire({
                            icon: 'success',
                            title:'Elimando',
                            text: 'Datos Eliminados conexito!',
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "conformacion-familia";
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